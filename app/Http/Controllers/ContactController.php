<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    const NOTETYPE = 'CN';
    const PAGESIZE = 20;
    const BUYER = 'B';
    const SELLER = 'S';
    const BOTHREQUEST = 'T';

    /**
     * Adds a new contact and all details.
     *
     * @return JSON response of success.
     */
    public function addContact(Request $request)
    {
       $validator = $this->getFormValidator($request);

        // If validation failes return the errors.
        if($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                 'errors' => $validator->getMessageBag()->toArray()
            ), 422);
        }

        // Get all form data.
        $formData = $request->all();

        // Set the current date and time.
        $now = new \DateTime();

        // Insert contact details.
        $contactDetails = [
            'user_id'        =>  Auth::id(),
            'firstname'      =>  $formData['fname'],
            'lastname'       =>  $formData['lname'],
            'mobile_phone'   =>  $formData['mphone'],
            'home_phone'     =>  $formData['hphone'],
            'alt_phone'      =>  $formData['aphone'],
            'email'          =>  $formData['email'],
            'company'        =>  $formData['company'],
            'title'          =>  $formData['title'],
            'referred_by'    =>  $formData['refby'],
            'contact_method' => $formData['conmethod'],
            'contact_time'   => $formData['contime'],
            'created_at'     => $now,
            'updated_at'     => $now,
        ];

        $contactId = DB::table('contacts')->insertGetId($contactDetails);

        // Prepare address details.
        $addressDetails = [
            'address1'       => $formData['address1'],
            'address2'       => $formData['address2'],
            'city'           => $formData['city'],
            'state_province' => $formData['prov'],
            'country'        => $formData['country'],
            'zip_postal'     => preg_replace('/-|\s+/', '', $formData['postal']), // Remove whitespace and hyphens
        ];

        // Add address if entered.
        if(array_filter($addressDetails))
        {
            // Add the times to insert.
            $addressDetails['created_at'] = $now;
            $addressDetails['updated_at'] = $now;

            $addressId = DB::table('addresses')->insertGetId($addressDetails);

            // Create the cross reference.
            DB::table('address_contact')->insert(['contact_id' => $contactId, 'address_id' => $addressId]);
        }

        // Add buyer request if entered.
        if($formData['status'] == self::BUYER)
        {
            $requestDetails = [
                'motive'       => $formData['motivation'],
                'home_type'    => $formData['hometype'],
                'home_age'     => $formData['homeage'],
                'sq_feet'      => $formData['feet'],
                'bedrooms'     => $formData['bedrooms'] ?: NULL,
                'bathrooms'    => $formData['bathrooms'] ?: NULL,
                'location'     => $formData['location'],
                'max_price'    => $formData['maxprice'],
                'pre_approved' => $formData['preapprove'],
                'startdate'    => $formData['sdate'],
                'enddate'      => $formData['edate'],
            ];

            $features = $formData['features'];

            if(array_filter($requestDetails) || $features)
            {
                $requestId = DB::table('buy_requests')->insertGetId($requestDetails);

                // Create cross reference
                DB::table('contact_buy_request')->insert(['contacts_id' => $contactId, 'buy_request_id' => $requestId]);

                // Insert the features.
                if($features)
                {
                    foreach($features as $feature)
                    {
                        DB::table('buy_request_feature')->insert(['request_id' => $requestId, 'feature' => $feature]);
                    }
                }
            }
        }

        // Add seller request if entered.
        if($formData['status'] == self::SELLER)
        {
            $requestDetails = [
                'motive'         =>  $formData['motivation'],
                'min_price'    => $formData['minprice'],
                'startdate'    =>  $formData['sdate'],
                'enddate'      =>  $formData['edate'],
            ];

            if(array_filter($requestDetails))
            {
                $requestId = DB::table('seller_requests')->insertGetId($requestDetails);

                // Create cross reference
                DB::table('contact_seller_request')->insert(['contacts_id' => $contactId, 'seller_request_id' => $requestId]);
            }
        }

        // Add contact notes.
        if($formData['notes'])
        {
            $noteDetails = [
                'note_type'     => self::NOTETYPE,
                'associated_id' => $contactId,
                'note'          => $formData['notes'],
            ];

            DB::table('notes')->insert($noteDetails);
        }
           
        return response()->json(array(
            'success' => true,
            'errors' => '',
        ));
    }

    /**
     * Returns the contact form validator.
     * @param  Request $request contact form request
     * @return Validator instance
     */
    private function getFormValidator(Request $request)
    {
         // Create validation rules.
        $rules = [  
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'mphone' => 'nullable|string|max:11',
            'hphone' => 'nullable|string|max:11',
            'aphone' => 'nullable|string|max:11',
            'email' => 'nullable|email|max:255',
            'company' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'address1' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'prov' => 'nullable|string|max:3',
            'country' => 'nullable|string|max:3',
            'postal' => 'nullable|string|max:10',
            'status' => 'nullable|string|max:1',
            'motivation' => 'nullable|string|max:2',
            'refby' => 'nullable|string|max:255',
            'conmethod' => 'nullable|string|max:2',
            'contime' => 'nullable|string|max:2',
            'hometype' => 'nullable|string|max:2',
            'homeage' => 'nullable|string|max:2',
            'feet' => 'nullable|integer',
            'bedrooms' => 'nullable|numeric|max:255',
            'bathrooms' => 'nullable|numeric|max:255',
            'location' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'maxprice' => 'nullable|integer',
            'preapprove' => 'nullable|string|max:1',
            'notes' => 'nullable|string|max:1000',
            'minprice' => 'nullable|integer',
        ];

        // Customize the validation messages.
        $messages = [
            'required' => 'This field is required.',
            'max' => 'This field cannot be more than :max characters.',
            'string' => 'This field must be a string.',
            'integer' => 'This field must be a number',
            'numeric' => 'This field must be a number',
            'email' => 'This field must be a valid email',
        ];

        // Create validator instance.
        $validator = \Validator::make($request->all(), $rules, $messages);

        return $validator;
    }

    /**
     * Returns list of contacts offest by the page.
     * @param  Request $request 
     * @return JSON array of contacts
     */
    public function getContactListing(Request $request)
    {
        // Calculate the offset for paging.
        $page = $request->input('page', 1);
        $offset = ($page - 1) * self::PAGESIZE;

        $columns = ['contacts.id as contact_id', 'firstname', 'lastname', 'mobile_phone', 'home_phone', 'alt_phone', 'email', 
                    'buy_requests.id as buy_request_id', 'seller_requests.id as sell_request_id'];

        $contacts = DB::table('contacts')
                        ->select($columns)
                        ->leftJoin('contact_buy_request', 'contacts.id', '=', 'contact_buy_request.contacts_id')
                        ->leftJoin('buy_requests', 'contact_buy_request.buy_request_id', '=', 'buy_requests.id')
                        ->leftJoin('contact_seller_request', 'contacts.id', '=', 'contact_seller_request.contacts_id')
                        ->leftJoin('seller_requests', 'contact_seller_request.seller_request_id', '=', 'seller_requests.id')
                        ->where('user_id', Auth::id())
                        ->limit(self::PAGESIZE)
                        ->offset($offset)
                        ->orderBy('lastname')->get();
        $contacts = $contacts->toArray();

        $totalCount = DB::table('contacts')
                        ->where('user_id', Auth::id())
                        ->count();

        $response = [
            'total' => $totalCount,
            'contacts' => $contacts
        ];

        return response()->json($response);
    }

    /**
     * Returns a single contact.
     * @param  Request $request   
     * @param  Integer  $contactId 
     * @return JSON contact
     */
    public function getContact(Request $request, $contactId) 
    {
        $columns = ['firstname', 'lastname', 'mobile_phone', 'home_phone', 'alt_phone', 'email', 'company', 'title',
                    'referred_by', 'contact_method', 'contact_time', 'address1', 'address2', 'city', 'state_province', 
                    'country', 'zip_postal', 'buy_requests.home_type as buy_home_type', 'buy_requests.motive as buy_motive', 'seller_requests.motive as sell_motive',
                    'buy_requests.home_age as buy_home_age', 'buy_requests.sq_feet as buy_sq_feet', 'buy_requests.bedrooms as buy_bedrooms',
                    'buy_requests.bathrooms as buy_bathrooms', 'buy_requests.location as buy_location', 'buy_requests.max_price as buy_max_price',
                    'buy_requests.pre_approved as buy_pre_approved', 'buy_requests.startdate as buy_startdate', 'buy_requests.enddate as buy_enddate',
                    'buy_requests.id as buy_request_id', 'seller_requests.id as sell_request_id', 'seller_requests.min_price as sell_min_price',
                ];

        $contact = DB::table('contacts')
                        ->leftJoin('address_contact', 'contacts.id', '=', 'address_contact.contact_id')
                        ->leftJoin('addresses', 'address_contact.address_id', '=', 'addresses.id')
                        ->leftJoin('contact_buy_request', 'contacts.id', '=', 'contact_buy_request.contacts_id')
                        ->leftJoin('buy_requests', 'contact_buy_request.buy_request_id', '=', 'buy_requests.id')
                        ->leftJoin('contact_seller_request', 'contacts.id', '=', 'contact_seller_request.contacts_id')
                        ->leftJoin('seller_requests', 'contact_seller_request.seller_request_id', '=', 'seller_requests.id')
                        ->select($columns)
                        ->where('contacts.id', $contactId)->first();

        $features = DB::table('buy_request_feature')
                            ->join('contact_buy_request', 'buy_request_feature.request_id', '=', 'contact_buy_request.buy_request_id')
                            ->select('feature')
                            ->where('contact_buy_request.contacts_id', $contactId)->get();
        $features = $features->toArray();

        $contact->features = $features;

        return response()->json($contact);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    const NOTETYPE = 'CN';

    /**
     * Adds a new contact and all details.
     *
     * @return JSON response of success.
     */
    public function addContact(Request $request)
    {
       $validator = $this->getFormValidator($request);

        // If validation failes return the errors.
        if ($validator->fails())
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
            'status'         =>  $formData['status'],
            'startdate'      =>  $formData['sdate'],
            'enddate'        =>  $formData['edate'],
            'motive'         =>  $formData['motivation'],
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
            'zip_postal'     => $formData['postal'],
        ];

        // Add address if entered.
        if(array_filter($addressDetails))
        {
            // Add the times the insert.
            $addressDetails['created_at'] = $now;
            $addressDetails['updated_at'] = $now;

            $addressId = DB::table('addresses')->insertGetId($addressDetails);

            // Create the cross reference.
            DB::table('address_contact')->insert(['contact_id' => $contactId, 'address_id' => $addressId]);
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
            'features' => 'nullable|array|max:2',
            'maxprice' => 'nullable|integer',
            'preapprove' => 'nullable|string|max:1',
            'notes' => 'nullable|string|max:1000'
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

}
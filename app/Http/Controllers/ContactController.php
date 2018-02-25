<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Adds a new contact and all details.
     *
     * @return JSON response of success.
     */
    public function addContactDetails(Request $request)
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

        // Add the forms here

        return response()->json(array(
            'success' => true,
            'errors' => ''
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
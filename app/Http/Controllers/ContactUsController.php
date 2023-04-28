<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Auth;
use Hash;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerification;
use App\Mail\ContactUsMail;
use App\ContactUsForm;

class ContactUsController extends Controller
{
	public function index()
	{
		return view('site.contact-us-view');
	}

	public function post(Request $request)
	{
        $ContactUsForm = new ContactUsForm();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_date' 	=> date('Y-m-d'),
            'created_time' 	=> date('H:i:s'),
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
        ]);

        $attributeNames = [
            'name'     => 'Name',
            'email'    => 'Email',
            'subject'  => 'Subject',
            'message'  => 'Message',
        ];

        $messages = [
            // 'text.unique_with' => 'This Company Already Exist!',
        ];

        $rules = [
            'name'     => 'required|max:30',
            'email'    => 'required|max:30|email',
            'subject'  => 'required|max:100',
            'message'  => 'required|max:500',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
        else
        {
        	// dd($request->all());
            $ContactUsForm = $ContactUsForm::create($request->all());
            
            Mail::to($ContactUsForm->email)->send(new ContactUsMail($ContactUsForm));

            return response()->json([
                'success'   => true,
                'message'   => 'We received your email, will contact you within 24hr',
                'type'      => 'success',
            ]);

        }
    }

}

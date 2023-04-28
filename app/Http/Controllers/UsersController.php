<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use Hash;
use App\User;
use App\UserActivation;
use App\Profile;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users-view');
    }

    public function store(Request $request)
    {
        $UserActivation = new UserActivation;
        $Profile = new Profile;
        $User = new User();
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by' 	=> $getUser->id,
            'created_date' 	=> date('Y-m-d'),
            'created_time' 	=> date('H:i:s'),
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
        ]);

        $attributeNames = [
            'email'             => 'Email',
            'password'          => 'Password',
            'confirm_password'  => 'Confirm Password',
        ];

        $rules = [
            'email'             => 'required|max:100|email|unique_with:users',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ];

        $messages = [
            'email.unique_with' => 'Email Already Exist!',
        ];

        $Validator = Validator::make(Input::all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if ($Validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $Validator->errors(),
            ]);
        } 
        else 
        {
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
            $User = User::create($request->all());

            // USER ACTIVATION
            $UserActivation->user_id = $User->id;
            $UserActivation->completed = 1;
            $UserActivation->completed_at = date('Y-m-d');
            $UserActivation->code = str_replace('/', '', Hash::make(uniqid()));
            $UserActivation->save();

            // PROFILE
            $Profile->user_id = $User->id;
            $Profile->status = $request->status;
            $Profile->save();

            return response()->json([
                'success' => true,
                'message' => 'User Created Successfully!',
            ]);
        }
    }

    public function all()
    {
        $User = new User();
        return $User->where('type','!=','normal')->where('user_type',null)->with('Profile')->paginate(20);
    }

    public function activeAll()
    {
        $User = new User();
        return $User->where('type','!=','normal')->where('user_type',null)->with('Profile')->get();
    }

    public function search(Request $request)
    {
        $User = new User();
        return $User->where('email', 'like', '%'.$request->name.'%')->paginate(20);
    }

    public function find($User)
    {
        return User::where('id', $User)->with('Profile')->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
        ]);

        $attributeNames = [
            'email'             => 'Email',
            'password'          => 'Password',
            'confirm_password'  => 'Confirm Password',
        ];

        $rules = [
            'email'             => 'required|max:100|email|unique_with:users,'.$request->id,
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ];

        $messages = [
            'email.unique_with' => 'Email Already Exist!',
        ];

        $Validator = Validator::make(Input::all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if ($Validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $Validator->errors(),
            ]);
        } 
        else 
        {
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
            $User = User::find($request->id);
            $User->update($request->all());

            // PROFILE
            $Profile = Profile::where('user_id', $User->id)->first();
            $Profile->status = $request->status;
            $Profile->update();

            return response()->json([
                'success' => true,
                'message' => 'User Updated Successfully!',
            ]);
        }
    }

    public function delete(User $User)
    {
        $User->delete();
        Profile::where('user_id', $User->id)->first()->delete();
        UserActivation::where('user_id', $User->id)->first()->delete();
        return response()->json([
            'success' => true, 
            'message' => 'User Deleted Successfully!',
        ]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Auth;
use Hash;
use DB;
use App\Setting;
use App\UserActivation;
use App\Profile;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerification;
use App\Mail\PasswordReset;
use App\UserPasswordReset;
use App\ImageReady;
use App\Social;

class AuthenticationController extends Controller
{
    public function MyProfile()
    {
        return view('admin.my-profile');
    }

    public function MyProfileGet()
    {
        return Profile::where('id', Auth::user()->id)->with(['User','Socials'])->first();
    }

    public function MyProfileUpdate(Request $request)
    {
        $getUser = Auth::user();
        $Profile = new Profile();
        $User = new User();
        $ImageReady = new ImageReady();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by'    => $getUser->id,
            'created_date'  => date('Y-m-d'),
            'created_time'  => date('H:i:s'),
            'updated_by'    => $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
        ]);

        $attributeNames = [
            'first_name'    => 'First Name',
            'last_name'     => 'Last Name',
            'mobile'        => 'Mobile',
            'email'         => 'Email',
        ];

        $rules = [
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'mobile'        => 'required|max:20',
            'email'         => 'required|email|unique_with:users,email,'.$User->find($getUser->id)->id,
        ];

        $messages = [
            // 
        ];

        $Validator = Validator::make($request->all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if($Validator->fails()){
            return response()->json([
                'success'   => false,
                'errors'    => $Validator->errors(),
            ]);
        }
        else
        {
            $User = $User->find($getUser->id);
            $User->email = $request->email;
            $User->update();

            $Profile = $Profile::where('user_id', $getUser->id)->first();
            $Profile->update($request->all());

            if($request->mySocials != null){
                Social::where('profile_id', $Profile->id)->delete();
                foreach($request->mySocials as $item){
                    $Social = new Social();
                    $Social->socialsetup_id = $item['socialsetup_id'];
                    $Social->name           = $item['name'];
                    $Social->icon           = $item['icon'];
                    $Social->social_link    = $item['social_link'];

                    $Social->user_id        = $User->id;
                    $Social->profile_id     = $Profile->id;
                    $Social->status         = $request->status;

                    $Social->created_by     = $request->created_by;
                    $Social->created_date   = $request->created_date;
                    $Social->created_time   = $request->created_time;
                    $Social->updated_by     = $request->updated_by;
                    $Social->updated_date   = $request->updated_date;
                    $Social->updated_time   = $request->updated_time;
                    $Social->save();
                }
            }

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $ImageReady->imageReadyExtension($Profile->id, uniqid(), $avatar, '/uploads/profiles/', 200, 200, 400, 400, 400, 300);

                $Profile->avatar = $ImageReady->imageReadyExtension($Profile->id, uniqid(), $avatar, '/uploads/profiles/', 200, 200, 400, 400, 400, 300);
            }

            $Profile->update();

            return response()->json([
                'success'   => true,
                'message'   => 'Profile Updated Successfully',
            ]);
        }

    }

    public function MyProfileAvatarUpdate(Request $request)
    {
        $getUser = Auth::user();
        $Profile = new Profile();
        $User = new User();
        $ImageReady = new ImageReady();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by'    => $getUser->id,
            'created_date'  => date('Y-m-d'),
            'created_time'  => date('H:i:s'),
            'updated_by'    => $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
        ]);

        $attributeNames = [
            'avatar'    => 'Image',
        ];

        $rules = [
            'avatar'    => 'max:2000kb|mimes:jpeg,jpg,png', // |dimensions:max_width=400,min_width=150,max_height=400,min_height=150
        ];

        $messages = [
            // 
        ];

        $Validator = Validator::make($request->all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if($Validator->fails()){
            return response()->json([
                'success'   => false,
                'errors'    => $Validator->errors(),
            ]);
        }
        else
        {
            $Profile = $Profile::where('user_id', $getUser->id)->first();
            $Profile->update($request->all());

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $name = preg_replace("/[^a-zA-Z]/", "-", $Profile->first_name) .'-'. preg_replace("/[^a-zA-Z]/", "-", $Profile->last_name);

                $Profile->avatar = $ImageReady->imageReadyExtension($Profile->id, $name, $avatar, '/uploads/profiles/', 200, 200, 400, 400, 400, 300);
            }

            $Profile->update();

            return response()->json([
                'success'   => true,
                'message'   => 'Image Updated Successfully',
            ]);
        }

    }

	public function Login()
	{
        if(Auth::check()){
            return redirect(url('/').'/my-profile');
        }
        else
        {
    		return view('admin.login');
        }
	}

    public function LoginPost(Request $request)
    {
        $UserActivation = new UserActivation;
        $attributeNames = [
            'email' => 'Email',
            'password' => 'Password',
        ];

        $messages = [
            // 'text.unique_with' => 'This Company Already Exist!',
        ];

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            // $validator->getMessageBag()->add('message', 'Fields are required');
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->add('message', 'Fields are required'),
            ]);
        }
        else
        {
            $Credentials = [
                'email'     => $request->email,
                'password'  => $request->password,
            ];

            // $valid = Auth::validate($Credentials);

            if(Auth::attempt($Credentials)){
                $User = User::where('email', $request->email)->first();
                if($User->UserActivation->completed != 1) {
                    return response()->json([
                        'success' => false,
                        'errors' => ['message' => ['0' => 'Your account is not active yet, Kindly check your email']],
                        'type' => 'danger',
                    ]);
                }
                elseif($User->Profile->status != 1) {
                    return response()->json([
                        'success' => false,
                        'errors' => ['message' => ['0' => 'Your account is disabled, Please contact to admin']],
                        'type' => 'danger',
                    ]);
                }
                else 
                {
                    return response()->json([
                        "message" =>"Login Successfully!",
                        'type' => 'success',
                        'url' => $User->type == 'normal'? 'my-bookings':'dashboard',
                    ]);
                }
            }
            else
            {
                return response()->json([
                    'success' => false,
                    'errors' => ['message' => ['0' => 'Invalid Login Credentials']],
                    'type' => 'danger',
                ]);
            }
        }

    }

	public function Register()
	{
		return view('admin.register');
	}

	public function RegisterPost(Request $request)
	{
        $UserActivation = new UserActivation;
        $Profile = new Profile;

        $attributeNames = [
            'email'             => 'Email',
            'password'          => 'Password',
            'confirm_password'  => 'Confirm Password',
        ];

        $messages = [
            // 'text.unique_with' => 'This Company Already Exist!',
        ];

        $rules = [
            'email'             => 'required|unique:users|max:100|email',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
            // 'g-recaptcha-response' => 'required|captcha',
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
            $request->request->add([
                'type' => 'normal',
                'password' => Hash::make($request->password),
            ]);
            $User = User::create($request->all());

            // USER ACTIVATION
            $UserActivation->user_id = $User->id;
            $UserActivation->code = str_replace('/', '', Hash::make(uniqid()));
            if(Setting::find(1)->user_verification_by == 'email') { // USER VERIFICATION VIA EMAIL
                $UserActivation->completed = 0;
            }
            elseif(Setting::find(1)->user_verification_by == 'admin') { // USER VERIFICATION VIA ADMIN
                $UserActivation->completed = 0;
            }
            else { // USER VERIFICATION BY FORCE
                $UserActivation->completed = 1;
                $UserActivation->completed_at = date('Y-m-d');
            }
            $UserActivation->save();

            // PROFILE
            $Profile->user_id = $User->id;
            $Profile->status = 1;
            $Profile->save();
            
            if(Setting::find(1)->user_verification_by == 'email'){ // SENDING EMAIL FOR VERIFICATION
                Mail::to($User->email)->send(new UserVerification($User));
                return response()->json([
                    "message" =>"We sent you an activation code. Check your email.",
                    'type' => 'success',
                ]);
            }
            elseif(Setting::find(1)->user_verification_by == 'admin') { // USER VERIFICATION VIA ADMIN
                return response()->json([
                    "message" =>"You have been registered successfully but in moderation.",
                    'type' => 'success',
                ]);
            }
            else { // USER VERIFICATION BY FORCE
                return response()->json([
                    "message" =>"You have been registered successfully.",
                    'type' => 'success',
                ]);
            }

        }
    }

    public function UserActivation($user, $code)
    {
        $Check = UserActivation::where('user_id', $user)->where('code', $code);
        if($Check->where('completed', 0)->count() > 0){
            if($Check->count() > 0){
                $UserActivation = $Check->first();
                $UserActivation->completed = 1;
                $UserActivation->completed_at = date('Y-m-d');
                $UserActivation->update();
                return redirect()->back()->with(['success' => 'Activated Successfully!!!']);
            }
        }
        else
        {
            return redirect()->back()->with(['error' => 'Invalid Code!!!']);
        }
    }

	public function PasswordReset()
	{
		return view('admin.password-reset');
	}

    public function PasswordResetPost(Request $request)
    {
        $attributeNames = [
            'email' => 'Email',
        ];

        $rules = array(
            'email' => 'required|email',
        );

        $validator = Validator::make(Input::all(), $rules);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return response()->json([
                'success'   => false,
                'errors'    => $validator->errors(),
            ]);
        }
        else
        {
            if(User::where('email', $request->email)->count() > 0){

                    $User = User::find(User::where('email', $request->email)->first()->id);

                    $request->request->add([
                        'user_id'   => $User->id,
                        'email'     => $User->email,
                        'token'     => Hash::make(uniqid()),
                    ]);

                    $request->request->add([
                        'token'     => str_replace('/', '', $request->token),
                    ]);

                    $UserPasswordReset = UserPasswordReset::create($request->all());

                    Mail::to($User->email)->send(new PasswordReset($User, $UserPasswordReset));

                    return response()->json([
                        'success'   => true,
                        'message'   => 'We sent you an reset password link! Check your email.',
                        'type'      => 'success',
                    ]);
            }
            else
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => ['message' => ['0' => 'Email not Found!']],
                    'type'      => 'danger',
                ]);   
            }
        }
    }

    public function resetPasswordForm($user_id, $token)
    {
        if(!Auth::check()){
            return view('admin.password-reset-form')
            ->with('user_id', $user_id)
            ->with('token', json_encode($token));
        }
        else
        {
            return redirect(url('/'));
        }
    }

    public function resetPasswordFormPost(Request $request)
    {
        $attributeNames = [
            'password'          => 'Password',
            'confirm_password'  => 'Confirm Password',
        ];

        $messages = [
            // 'password'          => 'Password',
            // 'confirm_password'  => 'Confirm Password',
        ];

        $rules = array(
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return response()->json([
                'success'       => false,
                'errors'        => $validator->errors(),
            ]);
        }
        else
        {
            $User = User::find($request->user_id);
            // dd($request->all());
            if ($User->count() > 0)
            {
                $UserData = UserPasswordReset::where('user_id', $User->id)->where('token', $request->token)->get();

                if($UserData->count() > 0){
                    $UserData = $UserData->first();
                    $UserData->delete();

                    $request->request->add([
                        'password' => Hash::make($request->password),
                    ]);
                    $User->password = $request->password;
                    $User->update();

                    return response()->json([
                        'success'   => true,
                        "message"   => "Password Reset Successfully!",
                        "type"      => "success",
                    ]);

                }
                else
                {
                    return response()->json([
                        'success'   => false,
                        'errors'   => ['message' => ['0' => 'Invalid token number!']],
                        'type'      => 'danger',
                    ]);
                }
            }
            else
            {
                return redirect("/")
                ->withErrors('Invalid or expired activation code.!');
            }
        }
        
    }

    public function changePassword()
    {
        return view('admin.change-password-view');
    }

    public function changePasswordPost(Request $request)
    {
        $attributeNames = [
            'password'          => 'Password',
            'confirm_password'  => 'Confirm Password',
        ];

        $messages = [
            // 'text.unique_with' => 'This Company Already Exist!',
        ];

        $rules = [
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
            // 'grecaptcharesponse' => 'required|captcha',
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
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
            try {
                DB::transaction(function() use ($request) {

                    $User = Auth::user();
                    $User->password = $request->password;
                    $User->update();

                });
            } catch (\Exception $e) {
                return false;
            }
            return response()->json([
                "message" =>"Password Changed Successfully.",
                'type' => 'success',
            ]);

        }
    }

    public function Logout()
    {
       Auth::logout();
       return redirect('/login');
    }
}

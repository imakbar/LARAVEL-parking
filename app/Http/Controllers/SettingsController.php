<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\ImageReady;
use DB;

use App\Setting;
use App\SettingSocial;

class SettingsController extends Controller
{
	public function index()
	{
        if(Auth::user()->user_type == 'super_admin'){
            return view('admin.settings-view');
        }
        else
        {
            return view('404');
        }
	}

	public function ourSettings()
	{
		return Setting::find(1);
	}

	public function ourSettingsSocial()
	{
		return SettingSocial::all();
	}

    public function update(Request $request)
    {
        $getUser = Auth::user();
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
            'title'         => 'Title',
            'slogan'    	=> 'Slogan',
            'phone'     	=> 'Phone',
            'email'        	=> 'Email',
            'office_timing' => 'Office Timing',
            'address' 		=> 'Address',
            'copy_rights' 	=> 'Copy Rights',
        ];

        $rules = [
            'title'         => 'required|max:100',
            'slogan'    	=> 'required|max:100',
            'phone'     	=> 'required|max:100',
            'email'        	=> 'required|max:60',
            'office_timing' => 'required|max:100',
            'address' 		=> 'required|max:200',
            'copy_rights' 	=> 'required|max:200',
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
            // dd($request->all());
            $Setting = Setting::find(1);
            $Setting->update($request->all());

            if($request->ourSocials != null){
                if(SettingSocial::all()->count() > 0){
	                DB::table('setting_socials')->delete();
                }
                foreach($request->ourSocials as $item){
                    $Social = new SettingSocial();
                    $Social->socialsetup_id = $item['socialsetup_id'];
                    $Social->name           = $item['name'];
                    $Social->icon           = $item['icon'];
                    $Social->social_link    = $item['social_link'];

                    $Social->status         = 1;

                    $Social->created_by     = $request->created_by;
                    $Social->created_date   = $request->created_date;
                    $Social->created_time   = $request->created_time;
                    $Social->updated_by     = $request->updated_by;
                    $Social->updated_date   = $request->updated_date;
                    $Social->updated_time   = $request->updated_time;
                    $Social->save();
                }
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Settings Updated Successfully',
            ]);
        }

    }

    public function updateLogos(Request $request)
    {
        $getUser = Auth::user();
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
            $Setting = Setting::find(1);

            if($request->hasFile('logo_light')){
                $logo_light = $request->file('logo_light');

                $ImageReady->imageReadyExtension('logo', 'light', $logo_light, '/uploads/settings/', 200, 200, 400, 400, 400, 300);

                $Setting->logo_light = $ImageReady->imageReadyExtension('logo', 'light', $logo_light, '/uploads/settings/', 200, 200, 400, 400, 400, 300);
            }

            if($request->hasFile('logo_dark')){
                $logo_dark = $request->file('logo_dark');

                $ImageReady->imageReadyExtension('logo', 'dark', $logo_dark, '/uploads/settings/', 200, 200, 400, 400, 400, 300);

                $Setting->logo_dark = $ImageReady->imageReadyExtension('logo', 'dark', $logo_dark, '/uploads/settings/', 200, 200, 400, 400, 400, 300);
            }

            $Setting->update();

            return response()->json([
                'success'   => true,
                'message'   => 'Logo Updated Successfully',
            ]);
        }

    }
}

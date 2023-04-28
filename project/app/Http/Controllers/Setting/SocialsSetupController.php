<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Setting\SocialSetup;

class SocialsSetupController extends Controller
{
    public function index()
    {
        return view('setting.social-setup-view');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $SocialSetup = new SocialSetup();
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
            'name'    => 'Name',
            'icon'    => 'Icon',
        ];

        $rules = [
            'icon' => 'required',
            'name' => 'required|max:100|unique_with:social_setups,name',
        ];

        $messages = [
            'name.unique_with' => 'Social Already Exist!',
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
            $request->request->add(['icon' => $request->icon['name']]);
            SocialSetup::create($request->all());
            // $SocialSetup->name          = $request->name;
            // $SocialSetup->icon          = $request->icon['name'];
            // $SocialSetup->status        = $request->status;
            // $SocialSetup->created_by    = $request->created_by;
            // $SocialSetup->created_date  = $request->created_date;
            // $SocialSetup->created_time  = $request->created_time;
            // $SocialSetup->updated_by    = $request->updated_by;
            // $SocialSetup->updated_date  = $request->updated_date;
            // $SocialSetup->updated_time  = $request->updated_time;
            // $SocialSetup->save();
            return response()->json([
                'success' => true,
                'message' => "Social Saved!",
            ]);
        }
    }

    public function all()
    {
        $SocialSetup = new SocialSetup();
        return $SocialSetup->get();
    }

    public function activeAll()
    {
        $SocialSetup = new SocialSetup();
        return $SocialSetup->where('status', 1)->get();
    }

    public function find($SocialSetup)
    {
        return SocialSetup::where('id', $SocialSetup)->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' => $getUser->id,
            'updated_date' => date('Y-m-d'),
            'updated_time' => date('H:i:s'),
        ]);

        $attributeNames = [
            'name'    => 'Name',
            'icon'    => 'Icon',
        ];

        $rules = [
            'icon' => 'required',
            'name' => 'required|max:100|unique_with:social_setups,name,'.$request->id,
        ];

        $messages = [
            'name.unique_with' => 'Social Already Exist!',
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
            $SocialSetup = SocialSetup::find($request->id);
            if($SocialSetup->icon != $request->icon){
                $request->request->add(['icon' => $request->icon['name']]);
            }
            $SocialSetup->update($request->all());
            return response()->json([
                'success' => true,
                'message' => "Social Updated!",
            ]);
        }
    }

    public function delete(SocialSetup $SocialSetup)
    {
        $SocialSetup->delete();
        return response()->json([
            'success' => true, 
            'message' => "Social Deleted!",
        ]);
    }
}
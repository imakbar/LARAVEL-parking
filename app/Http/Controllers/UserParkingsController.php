<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\UserParking;

class UserParkingsController extends Controller
{
    public function index()
    {
        return view('admin.user-parkings-view');
    }

    public function store(Request $request)
    {
        $UserParking = new UserParking();
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
            'user_id'		=> 'User',
            'parking_id'	=> 'Parking',
        ];

        $rules = [
            'user_id'		=> 'required',
            'parking_id'	=> 'required|unique_with:user_parkings,user_id,parking_id',
        ];

        $messages = [
            'parking_id.unique_with' => 'Parking Already Exist with this Email!',
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
            UserParking::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Category Saved!',
            ]);
        }
    }

    public function all()
    {
        $UserParking = new UserParking();
        return $UserParking->with(['Parking','User'])->paginate(20);
    }

    public function activeAll()
    {
        $UserParking = new UserParking();
        return $UserParking->where('status',1)->with(['Parking','User'])->get();
    }

    public function search(Request $request)
    {
        $UserParking = new UserParking();
        return $UserParking->where('title', 'like', '%'.$request->name.'%')->with(['Parking','User'])->paginate(20);
    }

    public function find($UserParking)
    {
        return UserParking::where('id', $UserParking)->with(['Parking','User'])->first();
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
            'user_id'		=> 'User',
            'parking_id'	=> 'Parking',
        ];

        $rules = [
            'user_id'		=> 'required',
            'parking_id'	=> 'required|unique_with:user_parkings,user_id,parking_id,'.$request->id,
        ];

        $messages = [
            'parking_id.unique_with' => 'Parking Already Exist with this Email!',
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
            $UserParking = UserParking::find($request->id);
            $UserParking->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'User Updated!',
            ]);
        }
    }

    public function delete(UserParking $UserParking)
    {
        $UserParking->delete();
        return response()->json([
            'success' => true, 
            'message' => 'User Deleted!',
        ]);
    }
}
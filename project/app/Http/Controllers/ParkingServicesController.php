<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\ImageReady;
use App\ParkingService;

class ParkingServicesController extends Controller
{
    public function index()
    {
        return view('admin.parking-services-view');
    }

    public function store(Request $request)
    {
        $ParkingService = new ParkingService();
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by' 	=> $getUser->id,
            'created_date' 	=> date('Y-m-d'),
            'created_time' 	=> date('H:i:s'),
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'title'    			=> 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:parking_services,title',
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Parking Service Already Exist!',
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
            $ParkingService = ParkingService::create($request->all());
            $ParkingService->sort_order = $ParkingService->id;
            $ParkingService->update();

            return response()->json([
                'success' => true,
                'message' => 'Parking Service Saved!',
                'id'      => $ParkingService->id,
            ]);
        }
    }

    public function all()
    {
        $ParkingService = new ParkingService();
        return $ParkingService->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $ParkingService = new ParkingService();
        return $ParkingService->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $ParkingService = new ParkingService();
        return $ParkingService->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($ParkingService)
    {
        return ParkingService::where('id', $ParkingService)->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:parking_services,title,'.$request->id,
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Parking Service Already Exist!',
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
            $ParkingService = ParkingService::find($request->id);
            $ParkingService->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Parking Service Updated!',
            ]);
        }
    }

    public function updateAvatar(Request $request)
    {
        $getUser = Auth::user();
        $ImageReady = new ImageReady();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' => $getUser->id,
            'updated_date' => date('Y-m-d'),
            'updated_time' => date('H:i:s'),
        ]);

        $attributeNames = [
            'avatar' => 'Icon Image',
        ];

        $rules = [
            'avatar' => 'max:2000kb|mimes:jpeg,jpg,png', // dimensions:max_width=400,min_width=150,max_height=400,min_height=150
        ];

        $messages = [
            // 'avatar.unique_with' => 'Post Already Exist!',
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
            $ParkingService = ParkingService::find($request->id);
            File::delete('uploads/parking-services/'.$ParkingService->avatar);
            File::delete('uploads/parking-services/xs-'.$ParkingService->avatar);
            File::delete('uploads/parking-services/sm-'.$ParkingService->avatar);
            File::delete('uploads/parking-services/md-'.$ParkingService->avatar);

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $ParkingService->avatar = $ImageReady->imageReadyExtension($ParkingService->id, uniqid(), $avatar, '/uploads/parking-services/', 200, 200, 400, 400, 400, 300);
            }

            $ParkingService->update();

            return response()->json([
                'success' => true,
                'message' => 'Image Saved!',
            ]);
        }
    }

    public function sorting(Request $request)
    {
        foreach (ParkingService::all() as $ParkService) {
            $ID = $ParkService->id;
            foreach($request->all() as $req){
                if($req['id'] == $ID){
                    $ParkService->update(['sort_order' => $req['sort_order']]);
                }
            }
        }
    }

    public function delete(ParkingService $ParkingService)
    {
        $ParkingService->delete();
        File::delete('uploads/parking-services/'.$ParkingService->avatar);
        File::delete('uploads/parking-services/xs-'.$ParkingService->avatar);
        File::delete('uploads/parking-services/sm-'.$ParkingService->avatar);
        File::delete('uploads/parking-services/md-'.$ParkingService->avatar);
        return response()->json([
            'success' => true, 
            'message' => 'Parking Service Deleted!',
        ]);
    }
}
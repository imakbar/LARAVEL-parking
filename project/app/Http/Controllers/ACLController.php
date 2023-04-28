<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class ACLController extends Controller
{
    public function index(){
        if(Auth::user()->user_type == 'super_admin'){
            return view("acl.acl");
        }
        else
        {
            return redirect(url('/').'/404');
        }
    }

    public function all(){
        return config("acl.modules");
    }

    public function saveUserPermission(Request $request){
        $user = User::find($request->user_id);
        $permissions = implode(',', $request->actions);
        $user->permissions = $permissions;
        $user->update();
    }

    public static function hasRole($permission){
        $permissions = \Auth::user()->permissions;
        $permissions = explode(',', $permissions);
        if(in_array($permission, $permissions)){
            return true;
        }else{
            return false;
        }
    }

    public function getUsers(){
        return User::where('type', 'admin')->get();
    }

    public function test(){
        dd(ACLController::hasRole("admission-save"));

        // ACLController::hasRole("")
    }

    public function getUserRights(User $user){
        return explode(',', $user->permissions);
    }
    
}

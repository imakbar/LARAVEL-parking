<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rolegroup;

class ACLGroupController extends Controller
{
    public function index(){
        return view('acl.group');
    }

    public function all(){
        return Rolegroup::all();
    }

    public function save(Request $request){
        Rolegroup::forceCreate([
            'name' => $request->name,
            'permissions' => implode(',', $request->actions)
        ]);
    }

    public function find(Rolegroup $rolegroup){
        return [
            'id' => $rolegroup->id,
            'name' => $rolegroup->name,
            'actions' => explode(',', $rolegroup->permissions)
        ];
        
    }

    public function update(Request $request){
        $rolegroup = Rolegroup::find($request->id);
        $rolegroup->name = $request->name;
        $rolegroup->permissions = implode(',', $request->actions);
        $rolegroup->update();
    }
}

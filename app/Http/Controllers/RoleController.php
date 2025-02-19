<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){

    }
       public function create(){
        $permission=Permission::orderBy('name','ASC')->get();
        return view('Roles.create',compact('permission'));
       }
    public function store(Request $req){
        $req->validate([
            'name'=>'required|unique:permissions'
        ]);
        Role::create([
            'name'=>$req->name
        ]);
        return redirect()->route('permission.index')->with('success','Permission Added Successfully');
    }

}

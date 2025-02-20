<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $role=Role::orderBy('name','DESC')->simplePaginate(5);

    return view('Roles.index',compact('role'));
    }
       public function create(){
        $permission=Permission::orderBy('name','ASC')->get();
        return view('Roles.create',compact('permission'));
       }
    public function store(Request $req){
        // dd($req->permission);
        $req->validate([
            'name'=>'required|unique:roles'
        ]);
        $role=Role::create([
            'name'=>$req->name
        ]);
        if(!empty($req->permission)){
            foreach ($req->permission as $name) {
               $role->givePermissionTo($name);
            }
        }
        return redirect()->route('Role.index')->with('success','Roles Added Successfully');
    }
    public function edit(string $id){
        $role=Role::findOrFail($id);
        $haspermission=$role->permissions->pluck('name');
        $permission=Permission::orderBy('name','ASC')->get();
        return view('Roles.update',compact(['role','haspermission','permission']));
    }
    public function update( Request $req,string $id){
        $role=Role::findOrFail($id);

           // dd($req->permission);
           $req->validate([
            'name'=>'required'
        ]);
      $role->update([
            'name'=>$req->name
        ]);
        if(!empty($req->permission)){
            $role->syncPermissions($req->permission);
        }else{
            $role->syncPermissions([]);

        }
        return redirect()->route('Role.index')->with('success','Roles Updated Successfully');
    }
    public function Destroy(string $id){

        $destroy=Role::find($id);
        $destroy->delete();
        return redirect()->route('Role.index')->with('success','Role Deleted Successfully');


    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   public function index(){
    $permission=Permission::orderBy('created_at','DESC')->simplePaginate(10);
    return view('permission.index',compact('permission'));
   }
   public function create(){
       return view('permission.create');
   }
   public function store(Request $req){

    $req->validate([
        'name'=>'required|unique:permissions'
    ]);
    Permission::create([
        'name'=>$req->name
    ]);
    return redirect()->route('permission.index')->with('success','Permission Added Successfully');
   }

   public function edit(string $id){
    $edit=Permission::findOrFail($id);
    return view('permission.update',compact('edit'));

   }
   public function update(string $id,Request $req){
    $update=Permission::findOrFail($id);

    $req->validate([
        'name'=>'required'
    ]);
    $update->update([
        'name'=>$req->name
    ]);
    return redirect()->route('permission.index')->with('success','Permission Updated Successfully');

   }
   public function Destroy(string $id){
    $destroy=Permission::find($id);
    $destroy->delete();
    return redirect()->route('permission.index')->with('success','Permission Deleted Successfully');


   }
}

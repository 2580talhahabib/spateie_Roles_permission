<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::orderBy('id')->simplePaginate(1);
        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role=Role::orderBy('name')->get();
        $edit=User::find($id);
        $hasrole=$edit->roles->pluck('id');
        return view('User.update',compact(['edit','role','hasrole']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $Update=User::find($id);
        $req->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $Update->update([
            'name'=>$req->name,
            'email'=>$req->email,
        ]);
        $Update->syncRoles($req->role);
        return redirect()->route('users.index')->with('success','User created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

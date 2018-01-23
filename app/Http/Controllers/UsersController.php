<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', ['users'=> $users, 'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.create', ['users'=> $users, 'roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user->id);
        $roles = Role::all();
        //$user_roles = $user->roles->perms()->pluck('id','id')->toArray();
        $user_roles = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->toArray();
        return view('admin.users.edit', ['user'=> $user, 'user_roles'=> $user_roles, 'roles'=> $roles]);
        //return view('admin.users.edit', ['user'=> $user, 'roles'=> $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        $roles = $request->roles;
        DB::table('role_user')->where('user_id', $user->id)->delete();
        foreach ($roles as $role){
            $user->attachRole($role);
        }
        return redirect()->route('users.index')->withMessage('User Updated.');
        //return back()->withMessage('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        
    }


}

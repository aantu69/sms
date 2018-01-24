<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    function __construct()
    {
        $view = 'role-view'; $create = 'role-create'; $edit = 'role-edit';

        $this->middleware('permission:'.$view, ['only' => ['index']]);
        $this->middleware('permission:'.$create, ['only' => ['create', 'store']]);
        $this->middleware('permission:'.$edit, ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', ['permissions'=> $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->except(['permission','_token']));
        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }
        return redirect()->route('roles.index')->withMessage('Role Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        $permissions = Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();
        return view('admin.roles.edit', ['role'=> $role, 'role_permissions'=> $role_permissions, 'permissions'=> $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role = Role::find($role->id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        DB::table('permission_role')->where('role_id',$role->id)->delete();
        if(is_array($request->permission)){
            foreach ($request->permission as $key=>$value){
                $role->attachPermission($value);
            }
        }
        
        return redirect()->route('roles.index')->with('success','Role Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::table("roles")->where('id',$role->id)->delete();
        return back()->withMessage('Role Deleted.');
    }
}

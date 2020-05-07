<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorizePermissions('see_roles');
    $roles = Role::all();
    return view('admin.roles.index', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->authorizePermissions('add_role');

    if ( Role::create(['name' => strtolower($request->name)]) ) {
      return redirect()->route('admin.role.index')->with('alert', [
        'type' => 'success',
        'message' => 'Role has successfully added.'
      ]);
    }
      return redirect()->route('admin.role.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to add role, something went wrong.'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Role $role)
  {
    $this->authorizePermissions('see_role_permissions');

    $permissions = $role->permissions()->get();
    return view('admin.roles.permission', compact('role', 'permissions'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Role $role)
  {
    $this->authorizePermissions('manage_role_permissions');

    $permissions = Permission::select([
      '*',
      'isCurrentPermission' => DB::table('role_has_permissions')
        ->select('id')
        ->where('role_id', $role->id)
        ->whereColumn('permission_id', 'permissions.id')
    ])
    ->orderBy(DB::raw('CASE WHEN isCurrentPermission > 0 THEN 1 ELSE 0 END'), 'desc')
    ->get();

    $currentPermissions = $permissions->filter(function($permission) {
      return $permission->isCurrentPermission;
    })->pluck('name');

    return view('admin.roles.edit_permissions', compact('role', 'permissions', 'currentPermissions'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Role $role)
  {
    $this->authorizePermissions('edit_role');

    if ( $role->update(['name' => strtolower($request->name)]) ) {
      return redirect()->route('admin.role.index')->with('alert', [
        'type' => 'success',
        'message' => 'Role name has successfully changed.'
      ]);
    }

    return redirect()->route('admin.role.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to change role name, something went wrong.'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Role $role)
  {
    $this->authorizePermissions('delete_role');

    if ( $role->delete() ) {
      return redirect()->route('admin.role.index')->with('alert', [
        'type' => 'success',
        'message' => 'Role has successfully deleted.'
      ]);
    }

    return redirect()->route('admin.role.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to delete role, something went wrong.'
    ]);
  }

  public function setPermissions(Request $request, Role $role ) {
    $this->authorizePermissions('manage_role_permissions');

    $role->syncPermissions(json_decode($request->permissions));
    return redirect(route('admin.role.show', $role))->with('alert', [
      'type' => 'success',
      'message' => 'Role permissions have successfully managed.'
    ]);
  }
}

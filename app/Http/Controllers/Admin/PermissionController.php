<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
  public function index()
  {
    $permissions = Permission::all();
    return view('admin.permissions.index', compact('permissions'));
  }

  public function store(Request $request)
  {
    $this->authorizePermissions('add_permission');

    if (Permission::create(['name' => strtolower($request->name)])) {
      return redirect()->route('admin.permissions.index')->with('alert', [
        'type' => 'success',
        'message' => 'Permission has successfully added.'
      ]);
    }
    return redirect()->route('admin.permissions.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to add permission, something went wrong.'
    ]);
  }

  public function destroy(Permission $permission)
  {
    $this->authorizePermissions('delete_permission');
    $permission->delete();
    
    return redirect()->route('admin.permissions.index')->with('alert', [
      'type' => 'success',
      'message' => 'Permission has successfully deleted.'
    ]);
  }
}

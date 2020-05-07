<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $this->authorizePermissions('see_dashboard');
    $totalAdmin = User::role('super admin')->count();
    return view('admin.dashboard.index',\compact(['totalAdmin','totalUser']));
  }
}

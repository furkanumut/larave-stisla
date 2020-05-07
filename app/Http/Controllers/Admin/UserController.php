<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\ChangeProfileRequest;
use App\Http\Requests\User\profileImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Model\Role;
use App\Model\User;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorizePermissions('see_users');

    $users = User::all();
    return view('admin.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorizePermissions('add_user');
    $roles = Role::all()->pluck('name');
    return view('admin.users.create', compact('roles'));
  }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(AddRequest $request)
  {
    $this->authorizePermissions('add_user');

    $data = $request->all();
    $data['password'] = Hash::make($data['password']);

    if ( $user = User::create($data) ) {
      $user->assignRole($request->role);
      
      return redirect()->route('admin.user.index')->with('alert', [
        'type' => 'success',
        'message' => 'User has successfully added.'
      ]);
    }

    return redirect()->route('admin.user.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to delete user, something went wrong.'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    $this->authorizePermissions('see_user');

    return view('admin.users.show', compact('user'));
  }
  
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $this->authorizePermissions('edit_user');
    
    $roles = Role::all()->pluck('name');
    return view('admin.users.edit', compact('user', 'roles'));
  }
  
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EditRequest $request, $id)
  {
    $this->authorizePermissions('edit_user');

    if ( User::where('id', $id)->update($request->except(['_method', '_token', 'role'])) ) {
      User::find($id)->syncRoles($request->role);
      return redirect()->route('admin.user.index')->with('alert', [
        'type' => 'success',
        'message' => 'User data has successfully updated.'
      ]);
    }

    return redirect()->route('admin.user.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to edit user, something went wrong.'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $this->authorizePermissions('delete_user');

    if ( $user->delete() ) {
      return redirect()->route('admin.user.index')->with('alert', [
        'type' => 'success',
        'message' => 'User has successfully deleted.'
      ]);
    }

    return redirect()->route('admin.user.index')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to delete user, something went wrong.'
    ]);
  }

  public function profile() {
    $user = auth()->user();
    return view('admin.users.profile', compact('user'));
  }

  public function changeProfile(ChangeProfileRequest $request) {
    $id = auth()->user()->id;

    if ( User::where('id', $id)->update($request->only('name', 'email')) ) {
      return redirect()->route('admin.profile')->with('alert', [
        'type' => 'success',
        'message' => 'Profile successfully updated.'
      ]);
    } 

    return redirect()->route('admin.profile')->with('alert', [
      'type' => 'danger',
      'message' => 'Failed to update profile, something went wrong.'
    ]);
  }

  public function changeProfileImage(profileImage $request) {
    $image = $request->file('image');
    
      $user = auth()->user();
      $imageTypes = ['jpg', 'png', 'jpeg'];
      $extension = $image->extension();



      if ( $user->image != '/uploads/images/profile/default.png' ) {
        File::delete(public_path().$user->image);
      }

      $imageLocation =  '/uploads/images/profile/'.$user->name ."_". time() . '.' . $extension;
      $invertentionImage = Image::make($image->getRealPath());
      
      if ( $invertentionImage->width() > 500 ) {
        $invertentionImage->resize(500, null);
      }

      if ( $invertentionImage->height() > 500 ) {
        $invertentionImage->resize(null, 500);
      }

      $result = $invertentionImage->save(public_path().$imageLocation);

      
      if ( $result && User::where('id', auth()->user()->id)->update(['image' => $imageLocation]) ) {
        return redirect()->route('admin.profile')->with('alert', [
          'type' => 'success',
          'message' => 'Successfully change profile image.'
        ]);
      }
  }

  public function changePassword(ChangePasswordRequest $request) {
    $id = auth()->user()->id;
    $user = User::find($id);

    dd($request->user());
    
    if ( Hash::check($request->oldPassword, $user->password) ) {
      if ( User::where('id', $id)->update(['password' => Hash::make($request->password)]) ) {
        return redirect()->route('admin.profile')->with('alert', [
          'type' => 'success',
          'message' => 'Password successfully changed.'
        ]);
      }
    }

    return redirect()->route('admin.profile')->with('error', 'Old password wrong.');
  }
}

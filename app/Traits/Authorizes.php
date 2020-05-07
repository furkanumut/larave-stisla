<?php

namespace App\Traits;

trait Authorizes {
  /**
   * Automatically abort 403 when user not authorized the giving permissions, permission usage same with 'can' method.
   * @param string|array $permissions
   * @return void
   */
  public function authorizePermissions($permissions, Int $errno = 403) {
    if ( !auth()->user()->can($permissions) ) {
      abort($errno);
    }
  } 

  /**
   * Automatically abort 403 when user not authorized the giving roles.
   * @param string|array $roles
   * @return void
   */
  public function authorizeRoles($roles, Int $errno = 403) {
    if ( !auth()->user()->hasRoles($roles) ) {
      abort($errno);
    }
  } 
}
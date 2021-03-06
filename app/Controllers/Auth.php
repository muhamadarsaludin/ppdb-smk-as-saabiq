<?php

namespace App\Controllers;

class Auth extends \Myth\Auth\Controllers\AuthController
{
  public function login()
  {
    // No need to show a login form if the user
    // is already logged in.
    if ($this->auth->check()) {
      // helper('info');
      // if (info_user() == 'admin') {
      //   $redirectURL = session('redirect_url') ?? '/admin/dashboard';
      // }
      $redirectURL = session('redirect_url') ?? '/siswa/dashboard';
      unset($_SESSION['redirect_url']);

      return redirect()->to($redirectURL);
    }

    // Set a return URL if none is specified
    $_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? '/';
    $data = [
      'config' => $this->config,
      'title' => 'Sign In'
    ];
    return view('auth/login', $data);
  }

  public function register()
  {
    $data = [
      'title' => 'Register'
    ];
    return view('auth/register', $data);
  }

  public function logout()
  {
    // $info = info_user();
    if ($this->auth->check()) {
      $this->auth->logout();
    }
    // if ($info->role_name = 'admin') {
    //   return redirect()->to(site_url('/siswa/dashboard'));
    // } else {
    // }
    return redirect()->to(site_url('/siswa/dashboard'));
  }
}

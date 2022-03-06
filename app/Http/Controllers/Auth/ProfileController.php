<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RolesController;
use App\Providers\RouteServiceProvider;
use App\Models\Menu;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index () {
      $menus = Menu::all();
      $userdata = auth()->user();
      $role = new RolesController;
      $roles = ($role->checkRoles());
       $user = ($role->getUsers());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      //dd($user);
      return view('page.profile',compact('menus','roles','user','currentPath','userdata'));
    }

     public function updatename (Request $request) {
      $menus = Menu::all();
      $userdata = auth()->user();
      $role = new RolesController;
      $roles = ($role->checkRoles());
      $user = ($role->getUsers());
      $currentPath = Route::getFacadeRoot()->current()->uri();
       DB::table('users')
            ->where('id', $request->id)
            ->update(array( 'name' => $request->name));
      return view('page.profile',compact('menus','roles','user','currentPath','userdata'));
    }

}



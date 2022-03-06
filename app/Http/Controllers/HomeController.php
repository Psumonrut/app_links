<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhotoVendors;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductClass;
use App\Models\Menu;
use App\Models\Link;
use App\Http\Controllers\RolesController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;


class HomeController extends Controller
{
    use AuthenticatesUsers;

    public function indexhome () {
      $menus = Menu::where('status',1)->get();  
      $role = new RolesController;  
      $roles = ($role->checkRoles());
      $users = auth()->user();
      $user = ($role->getUsers());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      if($roles == 1 ){
         $link = Link::all();
         $linkdata = Link::all()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }else{
         $link = Link::where('createby_userID',$users->id)->get();
         $linkdata = Link::where('createby_userID',$users->id)->get()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }

      return view('home',compact('roles','user','menus','currentPath','link','linkdata','username'));   
       
    }

    public function indexhomepage () {
      $menus = Menu::where('role_code',0)->get();  
      $role = new RolesController;  
      $roles = ($role->checkRoles());
      $user = ($role->getUsers());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      return view('auth.login',compact('roles','user','menus','currentPath'));   
       
    }

    public function getDataLink ($id) {
      $menus = Menu::where('status',1)->get();  
      $role = new RolesController;  
      $roles = ($role->checkRoles());
      $user = ($role->getUsers());
      $users = auth()->user();
      $currentPath = Route::getFacadeRoot()->current()->uri();
      if($roles == 1 ){
       $link = Link::where('createby_userID',$users->id)->get();
         $linkdata = Link::where('createby_userID',$users->id)->get()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }else{
         $link = Link::where('createby_userID',$users->id)->get();
         $linkdata = Link::where('createby_userID',$users->id)->get()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }

      return view('home',compact('roles','user','menus','currentPath','link','linkdata','username'));  
    }
}

?>

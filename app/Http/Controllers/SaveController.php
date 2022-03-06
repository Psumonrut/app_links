<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Controllers\RolesController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class SaveController extends Controller
{
      public function save (Request $request) {
      $menus = Menu::all();
      $users = auth()->user();
      $role = new RolesController;
      $user = ($role->getUsers());
      $roles = ($role->checkRoles());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      if($roles == 1 ){
         $link = Link::all();
         $linkdata = Link::all()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }else {
         $link = Link::where('createby_userID',$users->id)->get();
         $linkdata = Link::where('createby_userID',$users->id)->get()->first();
         $username = User::where('id',$linkdata->createby_userID)->get()->first();
      }
      DB::table('links')
            ->where('id', $request->id)
            ->update(array('title' => $request->title ?  $request->title :  null,
                            'link_name' => $request->link_name
                            ));
      return view('home',compact('menus','roles','user','currentPath','link','linkdata','username'));
    }

     public function edit ($id) {
      $menus = Menu::all();
      $users = auth()->user();
      $role = new RolesController;
      $user = ($role->getUsers());
      $roles = ($role->checkRoles());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      $link = Link::where('id',$id)->get()->first();
      return view('page.save',compact('menus','roles','user','currentPath','link'));
    }

}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Controllers\RolesController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class CreateController extends Controller
{
    public function index () {
      $menus = Menu::all();
      $user = auth()->user();
      $role = new RolesController;
      $user = ($role->getUsers());
      $roles = ($role->checkRoles());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      return view('page.create',compact('menus','roles','user','currentPath'));
    }

      public function create (Request $request) {
      $menus = Menu::all();
      $users = auth()->user();
      $role = new RolesController;
      $roles = ($role->checkRoles());
      $currentPath = Route::getFacadeRoot()->current()->uri();
      $dt = Carbon::parse($request->ShootDateTime)->timezone('Asia/Bangkok');
      $link = new Link();
      $role = new RolesController;  
      $roles = ($role->checkRoles());
      $user = ($role->getUsers());
      $random = Str::random(6);
      $long_urls = $request->longURL;
      $source = $request->Source;
      $medium = $request->Medium;
      $campaign = $request->Campaign;
      $created_at =$dt->format('Y-m-d H:i:s');
      $link->link_name = "bit.ly".$random;
      $link->long_urls = $long_urls ?  $long_urls : null;
      $link->createBy_userID = $users->id;
      $link->source = $source ?  $source : null;
      $link->medium = $medium ?  $medium : null;
      $link->campaign = $campaign ?  $campaign : null;
      $link->created_at = $created_at;
      $link->save();
      return view('page.save',compact('link','menus','roles','user','currentPath'));
    }

}

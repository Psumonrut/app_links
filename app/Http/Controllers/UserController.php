<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsers(){
         
       //$users =  User::get();  //ข้อมูลจะได้ออกมาเป็น Array
       //$user = User::where('email','ploy@gmail.com')->first(); //query where
       $user = User::find(1); //query id = 1
       return  view('user',compact('user'));
    }


}

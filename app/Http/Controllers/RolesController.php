<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{

      public function checkRoles(){

      if (auth()->user() == null){
          return $roles = 0;
      }else {
        $roles = auth()->user()->role;
         return  $roles;
      }
        
      }


      public function getUsers(){
        if (auth()->user() == null){
           return $users = '';
        }else {
            $users = auth()->user()->name;
            return $users;
        }
      }


}

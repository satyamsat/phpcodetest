<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index($id)
    {
    	//finding user
		$user = User::find($id);
		
		if($user){
			return view('users.show',['user' => $user]);
		}else{
			return response()->json('No such user ('.$id.')',404);
		}
		
	}
}

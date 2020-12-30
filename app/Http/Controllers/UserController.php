<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

	public function update($id,Request $request)
	{
		$input = $request->all();
		
		//validating request
		$validator = Validator::make($input, [
			'comments' => 'required',
			'password' => 'required|min:5',
		]);

		if($validator->fails()){
			$key = implode(' ',$validator->errors()->keys());
			//custom message for validator
		    return response()->json('Missing key value for '.$key, 422);
		}
    
        //finding User
		$user = User::find($id);

		if($user){
	        if($input['password'] == $user->password){
	        	$existingComments = $user->comments;
                $user->comments = $existingComments.'\n'.$input['comments'];
                $user->save();
                return response()->json('OK', 200);
            }else{
            	return response()->json('Invalid password', 401);
            }
		}else{
			return response()->json('No such user ('.$id.')',404);
		}

        

	}


}

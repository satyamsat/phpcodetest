<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function index($id)
    {
    	//finding user
		$user = User::find($id);
		
		if($user){
			return view('users.show',['user' => $user]);
		}else{
			return response()->json('No such user (1)',404);
		}
		
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$receivedJson = json_decode($request->getContent());
		//input in json
		if ($receivedJson !== null && is_object($receivedJson)) {
			$input = get_object_vars($receivedJson);
		//input in form
		}elseif($request->getContent() == ""){
			$input = $request->all();
		}else{
			return response()->json('Invalid POST JSON', 422);
		}
			
		//validating request
		$validator = Validator::make($input, [
			'comments' => 'required',
			'password' => 'required|min:5',
			'id' => 'required',
		]);

		if($validator->fails()){
			$key = implode(' ',$validator->errors()->keys());
			//custom message for validator
		    return response()->json('Missing key value for '.$key, 422);
		}

		$id = $input['id'];

		if (!is_int($id)){
			return response()->json('Invalid id', 422);
		}
    
        //finding User
		$user = User::find($id);

		if($user){
			//password check
	        if($input['password'] == $user->password){
	        	try {
		        	$user->comments .= "\n".$input['comments'];
	                $user->save();	        		
	        	} catch (\Exception $e) {
	        		return response()->json('Could not update database: '.$e, 500);
	        	}
				return response()->json('OK', 200);
            }else{
            	return response()->json('Invalid password', 401);
            }
		}else{
			return response()->json('No such user (1)',404);
		}
			
    }

}

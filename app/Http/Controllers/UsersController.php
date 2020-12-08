<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
      
        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);
    }  

    public function sayHello(){
        return "Hello";
    }

    public function user($id)
    {
        return User::findOrFail($id);
    }
    
    public function get_user(Request $request){
        $data = $request->all();
        $user = User::where('email',$data['email'])->get()->first();
        return $user;
    }

    public function get_all_users(){
        $user = User::get();
        return $user;
    }

    function get_curr_user(Request $request){
        $user = $request->user();
        return $user->toArray();
    }

    public function update(Request $request){
        $input = $request->all();
        $user = User::find($input['id']);
        foreach ($input as $field => $value){
            $user[$field] = $value;
        }
        $user->save();
        return $user->toArray();
    }

}
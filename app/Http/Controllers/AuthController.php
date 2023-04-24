<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use \stdClass;
use Hash;

class AuthController extends Controller
{
   public function register(Request $request)
   {
    $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors());
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()
        ->json(['data' => $user,'access_token' =>$token,'token_type'=>'Bearer']);


   }

   public function login(Request $request){

    $user = User::where('email', $request['email'])->first();
     
    if(!Hash::check($request->password,$user->password)){
        return response()
        ->json(['messague'=>'Desautorizado'],401);

    }
    Auth::login($user);

    if(Auth::check()){
        
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()
        ->json([
            'message' => 'Ingreso Correctamente',
            'user' => $user,
            'access_token' =>$token,
            'token_type'=>'Bearer']);
    
       }
    }


    public function logout(){

        auth()->user()->tokens()->delete();

        return ['message' => 'has salido del sistema tokens borrados '];

    }
   
}

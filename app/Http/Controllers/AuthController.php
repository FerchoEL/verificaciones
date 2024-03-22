<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = json_decode($request->getContent());
        $user = User::where('email', $data->email)->first();
        if ($user){
            if (Hash::check($data->password,$user->password)){
                $token = $user->createToken('user-token');
                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;
            }else{
                $response["msg"] = "Contraseña Incorrecta";
            }
        }else{
            $response["msg"] = "Credenciales Incorrectas";
        }
        return response()->json($response);
    }

}

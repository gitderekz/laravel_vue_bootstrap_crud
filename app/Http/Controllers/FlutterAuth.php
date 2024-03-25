<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FlutterAuth extends Controller
{  
    //
    public function register(Request $request)
    {
        //valdiate
        $rules = [
            'firstname' => 'required|string',
            'email' => 'required|string|unique:clients',
            'password' => 'required|string|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //create new client in clients table
        $client = Client::create([
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $client->createToken('Personal Access Token')->plainTextToken;
        $response = ['client' => $client, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        // validate inputs
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $request->validate($rules);
        // find client email in clients table
        $client = Client::where('email', $request->email)->first();
        // if client email found and password is correct
        if ($client && Hash::check($request->password, $client->password)) {
            $token = $client->createToken('Personal Access Token')->plainTextToken;
            $response = ['client' => $client, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
}

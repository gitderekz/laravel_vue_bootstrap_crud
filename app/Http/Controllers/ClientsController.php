<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();     
        return response()->json(['clients'=>$clients]);      
    }
    public function store(Request $request)
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
        $client = Client::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $client->createToken('Personal Access Token')->plainTextToken;
        $response = ['message' =>'client created!', 'token' => $token];
        return response()->json($response);
    }
    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }
    public function update($id, Request $request)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return response()->json('client updated!');
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json('client deleted!');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Product;
use  App\Models\Favorite;
use  App\Models\JunctionAdresses;

class JunctionAddressesController extends Controller
{
    public function JunctionAdressesRegister(Request $request)
    {    
        $this->validate($request, [
            'AddressId' => 'required|string',
        ]);

        try {
                
                $user = Auth::user();  

                $JunctionAdresses = new JunctionAdresses;
                $JunctionAdresses->clientId = $user->id;
                $JunctionAdresses->AddressId = $request->input('AddressId');
                $JunctionAdresses->save();

                return response()->json(['JunctionAdresses' => $JunctionAdresses, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'JunctionAdresses Registration Failed!'.$e], 409);
        }
    }      
}


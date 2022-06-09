<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Product;
use  App\Models\Favorite;
use  App\Models\AcquireProduct;

class AcquireProducts extends Controller
{
    public function AcquireProductRegister(Request $request)
    {    
        $this->validate($request, [
            'productId' => 'required|string',
            'date' => 'required|date',
        ]);

        try {
                
                $user = Auth::user();  

                $AcquireProcuct = new AcquireProcuct;
                $AcquireProcuct->clientId = $user->id;
                $AcquireProcuct->productId = $request->input('productId');
                $AcquireProcuct->save();

                return response()->json(['AcquireProcuct' => $AcquireProcuct, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'AcquireProcuct Registration Failed!'.$e], 409);
        }
    }      
}


<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Product;
use  App\Models\Favorite;

class FavoritesController extends Controller
{
    //  /**
    //  * Instantiate a new UserController instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function favoriteRegister(Request $request)
    {    
        $this->validate($request, [
            'productId' => 'required|string',
        ]);

        try {
                $user = Auth::user();  
                $Favorite = new Favorite;
                $Favorite->clientId = $user->id;
                $Favorite->productId = $request->input('productId');
                $Favorite->save();

                return response()->json(['favorite' => $Favorite, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'favorite Registration Failed!'.$e], 409);
        }
    }



    
    // /**
    //  * Get all Products.
    //  *
    //  * @return Response
    //  */
    // public function GetAllAdresses()
    // {
    //     $address = Auth::address();

    //     $address = Address::where('address', $address->address) ->get();

    //     return response()->json(['address' =>  Address::all()], 200);
    // } 

    // /**
    //  * Get all Products.
    //  *
    //  * @return Response
    //  */
    // public function allAdresses()
    // {
    //      return response()->json(['adress' =>  Adress::all()], 200);
    // }       
}


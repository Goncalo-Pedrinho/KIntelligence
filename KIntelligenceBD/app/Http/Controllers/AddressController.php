<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addressRegister(Request $request)
    {    
        $this->validate($request, [
            
            'postalcod' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'district' => 'required|string',
            'country'=> 'required|string',
            'extra'=> 'required|string'
            ]);

        try {
                $address = new address;
                $address->postalcod = $request->input('postalcod');
                $address->street = $request->input('street');
                $address->number = $request->input('number');
                $address->district = $request->input('district');
                $address->country = $request->input('country');
                $address->extra = $request->input('extra');
                $address->save();

                return response()->json(['adress' => $address, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Address Registration Failed!'.$e], 409);
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


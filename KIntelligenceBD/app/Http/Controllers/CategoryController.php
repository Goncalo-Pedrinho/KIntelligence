<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Category;

class CategoryController extends Controller
{


    public function CategoryRegister(Request $request)
    {    
        $this->validate($request, [
            'name' => 'required|string',
            ]);

        try {
                $category = new category;
                $category->name = $request->input('name');
                $category->save();

                return response()->json(['category' => $category, 'message' => 'CREATED'.$e], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'category Registration Failed!'.$e], 409);
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


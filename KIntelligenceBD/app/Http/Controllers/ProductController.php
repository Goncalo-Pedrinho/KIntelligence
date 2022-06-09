<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Product;

class ProductController extends Controller
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

    public function productRegister(Request $request)
    {    
        $this->validate($request, [
            
            'price' => 'required|int',
            'description' => 'required|string',
            'model' => 'required|string',
            'merch' => 'required|string',
            'subdescription'=> 'required|string',
            'stock'=> 'required|int'
            ]);

        try {
                $product = new product;
                $product->price = $request->input('price');
                $product->description = $request->input('description');
                $product->model = $request->input('model');
                $product->merch = $request->input('merch');
                $product->subdescription = $request->input('subdescription');
                $product->stock = $request->input('stock');
                $product->categoryid = $request->input('categoryid');
                $product->save();

                return response()->json(['product' => $product, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Product Registration Failed!'.$e], 409);
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


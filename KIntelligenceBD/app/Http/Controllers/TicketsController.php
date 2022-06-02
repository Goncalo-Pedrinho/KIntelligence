<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use  App\Models\Address;
use  App\Models\Product;
use  App\Models\Favorite;
use  App\Models\Ticket;

class TicketsController extends Controller
{

    public function ticketRegister(Request $request)
    {    
        $this->validate($request, [
            'email' => 'required|string',
            'description' => 'required|string',
            'title' => 'required|string',
            'category' => 'required|string',
        ]);

        try {
                $user = Auth::user();  

                $var = $user->accType;

                if( $var == 'client'){

                    $Ticket = new Ticket;
                    $Ticket->userid = $user->id;
                    $Ticket->email = $request->input('email');
                    $Ticket->email = $request->input('description');
                    $Ticket->email = $request->input('title');
                    $Ticket->email = $request->input('category');
                    $Ticket->save();
               
                return response()->json(['Ticket' => $Ticket, 'message' => 'CREATED'], 201);

                } elseif($var == 'employee'){
                    return response()->json(['Employees cannot create tickets'], 201);

                }
                

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


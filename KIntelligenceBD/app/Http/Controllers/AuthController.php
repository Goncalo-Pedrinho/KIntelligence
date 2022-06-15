<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

//import auth facades
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function userregister(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'accType' => 'required|string',
        ]); 

        $acctype = $request->accType;

        if($acctype == 'client'){
            
            $this->validate($request, [
                'name' => 'string',
                'email' => 'required|email|unique:users',
                'phonenumber' => 'string|unique:users',
                'nif' => 'string|unique:users',
                'password'=> 'required',
            ]);

            try {
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->phonenumber = $request->input('phonenumber');
                $user->nif = $request->input('nif');
                $user->accType = $acctype;
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                $user->save();
                //return successful response
                return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
           
            } catch (\Exception $e) {
                //return error message

                return response()->json(['message' => 'User Registration Failed!'.$e], 409);
            }
        } else if($acctype == 'employee'){
            
            $this->validate($request, [ 
                'name' => 'string',
                'birth' => 'required|date',
                'email' => 'string|unique:users',
                'address' => 'required|string',
                'nif' => 'string|unique:users',
                'phoneNumber'=> 'required|string|unique:users',
                'cc' => 'required|string|unique:users',
                'civilState' => 'required|string',
                'nib' => 'required|string|unique:users',
                'nss'=> 'required|string|unique:users',
                'dependents' => 'required|string',
                'category' => 'required|string',
                'password' => 'required|string',
                'state'=> 'required|string',
            ]);

            try {
                
                $user = new User;
                $user->name = $request->input('name');
                $user->birth = $request->input('birth');
                $user->email = $request->input('email');
                $user->address = $request->input('address');
                $user->nif = $request->input('nif');
                $user->phoneNumber = $request->input('phoneNumber');
                $user->cc = $request->input('cc');
                $user->civilState = $request->input('civilState');
                $user->nib = $request->input('nib');
                $user->nss = $request->input('nss');
                $user->dependents = $request->input('dependents');
                $user->category = $request->input('category');         
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                $user->state = $request->input('state');
                $user->accType= $acctype;
               
                $user->save();
                //return successful response
                return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
           
        } catch (\Exception $e) {
            //return error message
            //return response()->json(['message' => 'user Registration Failed!'], 409);
            return ($e);
        }

        }

    }


    /**
     * Get a JWT via given credentials.
     *
     * LOGIN
     * 
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * 
     * Editor de Utilizadores
     * 
     */
    public function usereditor(Request $request){

        $this->validate($request, [
            'name' => 'string',
            'email' => 'email',
            'phonenumber' => 'string',
            'nif' => 'string',
            'password'=> 'string',
        ]);

        try {
         
            $user = Auth::user();  

            if($user->accType == 'client'){
                
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->phonenumber = $request->input('phonenumber');
                $user->nif = $request->input('nif');
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                
                $user->save();
                //return successful response
                return response()->json(['user' => $user, 'Foi Editado' => 'EDITADO'], 201);

            } else if($user->accType == 'employee'){

                $user->name = $request->input('name');
                $user->birth = $request->input('birth');
                $user->email = $request->input('email');
                $user->address = $request->input('address');
                $user->nif = $request->input('nif');
                $user->phoneNumber = $request->input('phoneNumber');
                $user->cc = $request->input('cc');
                $user->civilState = $request->input('civilState');
                $user->nib = $request->input('nib');
                $user->nss = $request->input('nss');
                $user->dependents = $request->input('dependents');
                $user->category = $request->input('category');         
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                $user->state = $request->input('state');
                //return successful response
                return response()->json(['user' => $user, 'Foi Editado' => 'EDITADO'], 201);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User Editor Failed!'], 409);
        }
        
    }

    /**
     * 
     * Get One User By name
     * 
     */
    public function getOneUserByName(Request $request){

        $this->validate($request,[
            'name'=>'string|required',
        ]);

        $var = $request->name;

        $users = kintelligence::table('users')
            ->where('name', '=', '%', $var, '%')
            ->get();

      
    }
}
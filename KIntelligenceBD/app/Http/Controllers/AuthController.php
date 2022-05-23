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

        if($acctype = 'client'){

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
                $user->accType = $request->input('accType');
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                $user->save();
                //return successful response
                return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
           
        } catch (\Exception $e) {
            //return error message

            return response()->json(['message' => 'User Registration Failed!'.$e], 409);
        }


        } else if($acctype = 'employee'){
            $this->validate($request, [ 
                'name' => 'string',
                'birth' => 'required|date',
                'email' => 'string|unique:employee',
                'address' => 'required|string',
                'nif' => 'string|unique:employee',
                'phoneNumber'=> 'required|string|unique:employee',
                'cc' => 'required|string|unique:employee',
                'civilState' => 'required|string',
                'nib' => 'required|string|unique:employee',
                'nss'=> 'required|string|unique:employee',
                'dependents' => 'required|string',
                'category' => 'required|string',
                'password' => 'required|string',
                'state'=> 'required|string',
            ]);

            try {
                $employee = new Employee;
                $employee->name = $request->input('name');
                $employee->birth = $request->input('birth');
                $employee->email = $request->input('email');
                $employee->address = $request->input('address');
                $employee->nif = $request->input('nif');
                $employee->phoneNumber = $request->input('phoneNumber');
                $employee->cc = $request->input('cc');
                $employee->civilState = $request->input('civilState');
                $employee->nib = $request->input('nib');
                $employee->nss = $request->input('nss');
                $employee->dependents = $request->input('dependents');
                $employee->category = $request->input('category');         
                $plainPassword = $request->input('password');
                $employee->password = app('hash')->make($plainPassword);
                $employee->state = $request->input('state');
                $employee->save();
                //return successful response
                return response()->json(['employee' => $employee, 'message' => 'CREATED'], 201);
           
        } catch (\Exception $e) {
            //return error message
            //return response()->json(['message' => 'employee Registration Failed!'], 409);
            return ($e);
        }

        }

        try {
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->phonenumber = $request->input('phonenumber');
                $user->nif = $request->input('nif');
                $plainPassword = $request->input('password');
                $user->password = app('hash')->make($plainPassword);
                $user->save();
                //return successful response
                return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
           
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }


    /**
     * Get a JWT via given credentials.
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

    

    /////////////////////////EXERCÍCIOS////////////////////////////////
    public function excercise1(Request $request){

        $this->validate($request, [
            'palavra' => 'required|string',
        ]);
    
        
        $palavra = $request->palavra;
        
        return $palavra;
    } 

    public function excercise2(Request $request){

        $this->validate($request, [
            'numero1' => 'required|int',
            'numero2' => 'required|int',
        ]);
    
        // $numero1 = $request -> numero1;
        // $numero2 = $request -> numero2;
        // $total = $numero1 + $numero2;
        //return $total;

        return $request -> numero1 + $request -> numero2;
        
    } 

    public function excercise3(Request $request){

        $this->validate($request, [
            'numero1' => 'required|int',
        ]);
        
        $numero = $request->numero1;

        if($numero % 2 == 0){
            return "par";
        } else{
            return "impar";
        };
        
    } 

    public function excercise4(Request $request){

        $this->validate($request, [
            'Valor' => 'required|int',
            'Conversao' => 'required',
        ]);

        $convert = $request->Conversao;
        $var = $request->Valor;

        if($convert == 'DollarParaEuro'){

            $var = $request->Valor*1.05;
        
        } else if ($convert == 'EuroParaDollar'){
        
            $var = $request->Valor*0.95;
        
        }

        return $var;
    }

    public function excercise5(Request $request){

        $this->validate($request, [
            'String' => 'required',
        ]);

        $str = $request -> String;
        $var = (explode(" ",$str));
        $total = 0;
        foreach ($var as $value) {
            
            $total += (int)$value;
        }

        return $total;
    }
}
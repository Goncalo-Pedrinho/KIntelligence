<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Employee;


//import auth facades
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Store a new employee.
     *
     * @param  Request  $request
     * @return Response
     */
    public function employeeregister(Request $request)
    {
        //validate incoming request 
        

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
}
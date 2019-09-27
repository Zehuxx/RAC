<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
* @OA\Info(title="Api RAC", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/

class userController extends Controller
{
/**
    * @OA\Post(
    *     path="api/Signup",
    *     summary="SignUp usuarios",
    *     @OA\Parameter(
    *         name="email",
    *         in="query",
    *         description="Correo electronico",
    *         required=true,        
    *     ),
    *     @OA\Parameter(
    *         name="password",
    *         in="query",
    *         description="Contraseña",
    *         required=true,        
    *     ),
    *     @OA\Parameter(
    *         name="name",
    *         in="query",
    *         description="Nombre de pila",
    *         required=true,        
    *     ),
    *     @OA\Parameter(
    *         name="last_name",
    *         in="query",
    *         description="Apellido",
    *         required=true,        
    *     ),
        *     @OA\Parameter(
    *         name="birth_date",
    *         in="query",
    *         description="Fecha de nacimiento formato: YYYY-MM-DD",
    *         required=true,        
    *     ),
        *     @OA\Parameter(
    *         name="phone",
    *         in="query",
    *         description="Numero de telefono formato: NNNNN-NNNNN",
    *         required=true,        
    *     ),
        *     @OA\Parameter(
    *         name="identification_card",
    *         in="query",
    *         description="Tarjeta de identidad. Formato: NNNN-NNNN-NNNNN",
    *         required=true,        
    *     ),
        *     @OA\Parameter(
    *         name="gender",
    *         in="query",
    *         description="Genero",
    *         required=true,        
    *     ),
        *     @OA\Parameter(
    *         name="rol",
    *         in="query",
    *         description="Rol",
    *         required=true,        
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Registro de usuarios"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

    public function signup(Request $request)
    {
        $request->validate([
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string',
            'name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'identification_card' => 'required|unique:persons',
            'gender' => 'required',
            'rol' => 'required|exists:roles,id',
        ]);
        $person = new Person([
            'name'    => $request->name,
            'last_name' => $request->last_name,
            'birth_date'    => $request->birth_date,
            'phone'    => $request->phone,
            'identification_card'    => $request->identification_card,
            'gender'    => $request->gender,
        ]);
        $person->save();

        $employee = new Employee([
            'id'    => $person->id,
        ]);        
        $employee->save();

        $user = new User([
            'id'=> $person->id,
            'role_id' => $request->rol,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }


/**
    * @OA\POST(
    *     path="api/login",
    *     summary="Login usuarios",
    *     @OA\Parameter(
    *         name="Email",
    *         in="query",
    *         description="Correo electronico",
    *         required=true,        
    *     ),
    *     @OA\Parameter(
    *         name="Password",
    *         in="query",
    *         description="Contraseña",
    *         required=true,        
    *     ),
    *     @OA\Parameter(
    *         name="remember_me",
    *         in="query",
    *         description="Recordarme",
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Ok"
    *     ),
    *     @OA\Response(
    *         response="401",
    *         description="No autorizado"
    *     )
    * )
    */

    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }else{
            $id=Auth::user()->id;
        }
        $user=User::find($id);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString()
        ], 200);
    }

       /**
         * @OA\GET(
         *     path="api/logout",
         *     summary="Logout usuarios",
         *     @OA\Response(
         *         response=200,
         *         description="Ok"
         *     )
         * )
         */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

        /**
    * @OA\GET(
    *     path="api/user",
    *     summary="User",
    *     @OA\Response(
    *         response=200,
    *         description="Ok"
    *     )
    * )
    */

    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }
}
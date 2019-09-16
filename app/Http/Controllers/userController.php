<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
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

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }
}
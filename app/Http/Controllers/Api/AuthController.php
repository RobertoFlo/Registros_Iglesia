<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequestRegister;
use App\Models\Persona;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function login():JsonResponse
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', request()->email)->first();
        if($user &&  Hash::check(request()->password, $user->password)){
            return response()->json([
                'user' => $user,
                'Bearer' => $user->createToken($user->name)->plainTextToken,
            ]);
        }else{
            return response()->json(['message' => "Datos incorrectos"]);
        }

    }
    public function register(StorePostRequestRegister $request):JsonResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($user->save()){
            //cuando haga login hare que verifique su correo primero
            //$user->sendEmailVerificationNotification();
            $persona = Persona::create([
                'primer_nombre' => $request->primer_nombre,
                'segundo_nombre' => $request->segundo_nombre,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'domicilio' => $request->domicilio,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'departamento_id' => $request->departamento_id,
                'distrito_id' => $request->distrito_id,
                'municipio_id' => $request->municipio_id,
                'user_id' => $user->id,
                'uuid' => Str::uuid(),
                'nombre_madre' => $request->nombre_madre,
                'nombre_padre' => $request->nombre_padre,

            ]);
            //event(new Registered($user));
        return response()->json(['user' => $user]);

       }else{
        return response()->json(['message' => 'Error al registrar usuario'], 500);

       }

    }
    public function logout(Request $request): JsonResponse
    {
        $request?->user()?->currentAccessToken()?->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }





}

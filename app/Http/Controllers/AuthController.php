<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    //funcion para poder iniciar sesion en la pagina
    public function login(Request $request)
    {Log::info('Contraseña recibida:', ['password' => $request->password]);
        // Validar el correo electrónico y la contraseña
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
       
        // Buscar el usuario por correo electrónico
        $usuario = Usuario::where('email', $request->email)->first();
    
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {

            $isPasswordCorrect = Hash::check($request->password, $usuario->password);

           // Log::info('¿La contraseña coincide?: ' . ($isPasswordCorrect ? 'Sí' : 'No'));
       
            return response()->json([
                'success' => false,
                'message' => 'Credenciales inválidas.',
                'debug' => [
                    'password_enviado' => $request->password,
                     'password_correcto' => $usuario->password ?? 'Usuario no encontrado',
            ],
            ], 401);
        }

        // Generar el token
        $token = $usuario->createToken('auth_token')->plainTextToken;
       
        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'data' => [
                'usuario' => $usuario->only(['id', 'email', 'nombre']),
                'token' => $token,
            ],
        ], 200);
    }
    
    public function index()
    {
        $usuarios = Usuario::all()->makeVisible('password');

        return response()->json($usuarios);



        
    }

    /**
     * Store a newly created user in storage.
     * 
     */

     //
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->password= bcrypt($request->password);  // Asegúrate de encriptar la contraseña
        
        $usuario->save();
        $usuario->makeVisible('password');
        return response()->json(['message' => 'Usuario creado correctamente', 'usuario' => $usuario], 201);
    }

   
    


    /**
     * Display a specific user.
     */
    
    public function show($id)
    {
        // Buscar el usuario por ID
        $usuario = Usuario::find($id);
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        // Hacer visible 'contrasena'
        $usuario->makeVisible('password');
    
        return response()->json($usuario);
    }


}






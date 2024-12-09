<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{ //funcion para poder mostrar todos los   usuarios 
    public function index()
    {
        $usuarios = Usuario::all()->makeVisible('password');

        return response()->json($usuarios);



        
    }

     //funcion para poder crear  usuarios
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

   
 //funcion para poder mostrar un usuario especifico por el id
    
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



     //funcion para poder actualizar los usuarios por el id
    public function update(Request $request, $id)
{


    
    $usuario = Usuario::find($id);

    if (!$usuario) {
        return response()->json(['message' => 'Registro no encontrado'], 404);
    }

    $data = $request->only(['nombre', 'apellido', 'email']);
    if ($request->has('password')) {
        $data['password'] = bcrypt($request->contrasena);
    }

    $usuario->update($data);

    // Hacer visible 'contrasena' antes de devolver la respuesta
    $usuario->makeVisible('password');
    

    return response()->json(['message' => 'Registro actualizado correctamente', 'usuario' => $usuario], 200);
}
   //funcion para poder eliminar los usuarios por el id
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
            
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }

   





}

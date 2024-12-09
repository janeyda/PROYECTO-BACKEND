<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    ////funcion para poder visualizar todos los perfiles
    public function index()
    {
       
        return Perfil::all();
       
    
    }
//funcion para poder crear un nuevo perfil 
    public function store(Request $request)
    {   
        $perfil = new Perfil();
        $perfil->estado = $request->estado;
        $perfil->usuarios_id = $request->usuarios_id; // Relación con la tabla 'usuarios'
        $perfil->rol_id = $request->rol_id; // Relación con la tabla 'rol'
        $perfil->save();

        return response()->json(['message' => 'Perfil creado exitosamente', 'perfil' => $perfil], 201);
    }
//funcion para poder visualizar los perfiles por el id
    public function show($id)
    {
        return Perfil::find($id);
    }
//funcion para poder actualizar los perfiles por el id
    public function update(Request $request, $id)
    {
        $perfil = Perfil::find($id); // Buscar el rol por ID
      
    
        if (!$perfil) {
            return response()->json(['message' => 'perfil no encontrado'], 404);
        }
        $perfil->estado = $request->estado;
        $perfil->save();
    }
//funcion para poder eliminar  los perfiles por el id
    public function destroy($id)
    {
        $perfil = Perfil::find($id);

        if (!$perfil) {
            return response()->json(['message' => 'Perfil no encontrado'], 404);
        }

        $perfil->delete();

        return response()->json(['message' => 'Perfil eliminado correctamente'], 200);
    }

}



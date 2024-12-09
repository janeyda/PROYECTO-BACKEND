<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{ ////funcion para poder visualizar todos los roles
    public function index()
    {
        //
        return Rol::all();

    }
//funcion para poder crear un nuevo rol
    
    public function store(Request $request)
    {
        
        $rol = new Rol();
        $rol->nombre_rol = $request->nombre_rol;
        $rol->save();

    }
//funcion para poder visualizar los roles por el id
    
    public function show($id)
    {
        // Buscar el rol por ID
       return Rol::find($id);

       
    }

  //funcion para poder actualizar los roles por el id
    public function update(Request $request, $id)
    {
        $rol = Rol::find($id); // Buscar el rol por ID
      
    
        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }
        $rol->nombre_rol = $request->nombre_rol;
        $rol->save();
        // Retornar los datos enviados en la solicitud
        return response()->json(['message' => 'Rol actualizado correctamente', 'datos_recibidos' => $request->all()], 200);
    }
    //funcion para poder eliminar los roles por el id
    public function destroy($id)
    
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['message' => 'Rol eliminado correctamente'], 200);
    }
}

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
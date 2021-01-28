<?php

namespace App\Http\Controllers;

use App\Usuario;

use Illuminate\Http\Request;
use Validator;

class UsuarioController extends Controller {
    
    /* Registro de usuarios */
    public function registrar(Request $request) {
        $validador = Validator::make($request->all(), [
            'usuario' => 'required',
            'password' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'direccion' => 'required'
        ]);
        if($validador->fails()){
            return response()->json(['error' => strval($validador->errors())], 200);
        }

        /* Validaciones */
        try {
            if (Usuario::where('usuario', $request->usuario)->count() == 0) {
                if (Usuario::where('correo', $request->correo)->count() == 0) {
                    if (Usuario::where('curp', $request->curp)->count() == 0) {
                        if (Usuario::where('rfc', $request->rfc)->count() == 0) {
                            /* Crear usario */
                            Usuario::create([
                                'usuario' => $request->usuario, 
                                'password' => bcrypt($request->password),
                                'nombre' => $request->nombre, 
                                'curp' => $request->curp, 
                                'rfc' => $request->rfc, 
                                'direccion' => $request->direccion,
                                'correo' => $request->correo
                            ]);
                            return response()->json(['success' => 'Usuario registrado correctamente, Ingrese con su nueva cuenta'], 200);
                        } else {
                            return response()->json(['error' => 'RFC no disponible'], 200);
                        }
                    } else {
                        return response()->json(['error' => 'CURP no disponible'], 200);
                    }
                } else {
                    return response()->json(['error' => 'Correo electronico no disponible'], 200);
                }
            } else {
                return response()->json(['error' => 'Nombre de usuario no disponible'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Servidor no disponible'], 200);
        }
    }
}

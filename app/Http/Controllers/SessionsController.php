<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Correo o contraseña incorrectas, inténtelo de nuevo', 
            ]);
        }
        else {
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.index');
            }else{
                return redirect()->to('/');
            }

        }
    }
    public function updatePhoto(Request $request)
{
    $user = auth()->user();

    // Verificar si hay una foto enviada
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        // Elimina la foto anterior si existe (opcional)
        if ($user->photo) {


            // Elimina la foto anterior del sistema de archivos
            $previousPhotoPath = public_path('uploads') . '/' . $user->photo;
            if (file_exists($previousPhotoPath)) {
                unlink($previousPhotoPath);
            }
        }

        // Actualiza el nombre de la foto en la base de datos
        $user->photo = $fileName;
        $user->save();

        return redirect()->back()->with('success', '¡La foto de perfil se ha actualizado correctamente!');
    }

    return redirect()->back()->with('error', '¡Por favor seleccione una imagen!');
}


    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}

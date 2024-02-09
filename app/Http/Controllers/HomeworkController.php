<?php

namespace App\Http\Controllers;

use App\Models\Homeworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeworkController extends Controller
{
    public function getHomework(){
        $homeworks = Homeworks::where('id_usuario', '=', auth()->user()->id)->simplePaginate(5);
        return view('home', compact('homeworks'));
    }

    public function addHomework(Request $request, Redirect $redirect ){
        $request->validate([
            'titulo' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'fecha_vencimiento' => ['required']
        ]);

        $homeworks = new Homeworks();
        $homeworks->titulo=$request->titulo;
        $homeworks->descripcion=$request->descripcion;
        $homeworks->fecha_vencimiento=$request->fecha_vencimiento;
        $homeworks->id_usuario=auth()->user()->id;
        $homeworks->completado=0;

        $homeworks->save();

        return $redirect->to('/home');

    }
}

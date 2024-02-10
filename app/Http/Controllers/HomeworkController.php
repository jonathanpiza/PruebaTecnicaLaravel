<?php

namespace App\Http\Controllers;

use App\Mail\CorreoMailable;
use App\Models\Homeworks;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

class HomeworkController extends Controller
{
    public function getHomework(){
        $homeworks = Homeworks::where('id_usuario', '=', auth()->user()->id)->simplePaginate(5);
        return view('home', compact('homeworks'));
    }

    public function addHomework(Request $request, Redirector $redirect ){
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
        Mail::to(auth()->user()->email)->send(new CorreoMailable($request->titulo, $request->descripcion, $request->fecha_vencimiento));

        return $redirect->to('/home');

    }

    public function setHomework($id, Redirector $redirect ){
        $homework = Homeworks::find($id);
        $homework->completado=1;
        $homework->save();
        return $redirect->to('/home');
    }
}

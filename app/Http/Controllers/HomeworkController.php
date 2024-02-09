<?php

namespace App\Http\Controllers;

use App\Models\Homeworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeworkController extends Controller
{
    public function getHomework(){
        $homeworks = Homeworks::where('id_usuario', '=', auth()->user()->id)->simplePaginate(5);
        return view('home', compact('homeworks'));
    }

    public function addHomework(Request $request, Redirect $redirect ){
        
    }
}

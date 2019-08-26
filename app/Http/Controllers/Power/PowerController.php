<?php

namespace App\Http\Controllers\Power;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PowerController extends Controller
{
    //
    public function power(){
        $name=userid();
        return view('power.power',['name'=>$name]);
    }
}

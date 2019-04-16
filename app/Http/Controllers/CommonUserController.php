<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonUserController extends Controller
{
    public function redirecionaEdicaoExtraInfos(){
        return view('common.editExtraInfos');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function success(){

        
        return view('user.house.success');
    }

}

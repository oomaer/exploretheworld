<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class HomeController extends Controller
{

    public function index(){

        $popular = DB::select('select * from locations order by popularity desc limit 5');
        // dd($popular);

        return view('home', ["popular" => $popular]);

    }


}

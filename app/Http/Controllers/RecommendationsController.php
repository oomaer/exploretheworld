<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;

class RecommendationsController extends Controller
{
    public function index($filter){

        if($filter == 'ourpicks'){
            $result = DB::select('select * from locations limit 10');
            return view('recommendations', ['result' => $result, 'filter' => 'Our Picks']);
        }
        else if($filter == 'toprated'){
            $result = DB::select('
             select * from locations t1,
             (select avg(rating) avg_rating, location_id from reviews group by location_id) t2
             where t1.id = t2.location_id order by avg_rating desc limit 10'
            );
            // dd($result);
            return view('recommendations', ['result' => $result, 'filter' => 'Our Picks']);
        }
        else if($filter == 'popular'){
            $result = DB::select('select * from locations order by popularity desc limit 10');
            return view('recommendations', ['result' => $result, 'filter' => 'Our Picks']);
        }

        try{
            $popular = DB::select('select * from locations order by popularity desc limit 5');

            return view('home', ["popular" => $popular], ['ourpicks' => $popular]);
        }

        catch(Exception $e) {
            abort(404);
        }



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class LocationController extends Controller
{
    //
    public function addLocation(){

        return view('location.addlocation');

    }

    public function updateLocation($id){
        // dd($id);
        $result = DB::select('select * from locations where id = ?',[$id]);
        if(empty($result)){
            abort(404);
        }
        else{
            // dd($result);
            return view('location.updatelocation', ["data" => $result[0], 'id' => $id]);
        }

    }


    public function viewLocation($id){

        $result = DB::select('select * from locations where id = ?',[$id]);
        // dd($result);
        if(empty($result)){
            abort(404);
        }
        else{
            $events = DB::select('select * from events where location_id = ?',[$id]);
            $reviews = DB::select('select t1.rating, t1.comment, t1.review_date, t1.user_id, u.name
                                    from (select * from reviews where location_id = ?) as t1, users as u
                                    where t1.user_id = u.id', [$id]);

            $currUserReview = [];
            if(auth()->user()){
                $currUserReview = DB::select('select id, rating, comment, review_date
                                            from reviews where user_id = ? and location_id = ?', [auth()->user()->id, $id]);
            }
            // dd($currUserReview);
            return view('location.viewlocation', ["location" => $result[0], 'id' => $id, "events" => $events, "reviews" => $reviews, "currUserReview" => $currUserReview]);
        }

    }



    public function store(Request $request){

        // dd($request->only('name', 'country', 'overview', 'discription', 'cover_imageurl', 'imageurl'));

        $this->validate($request, [
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'overview' => 'required|max:1000',
            'discription' => 'required|max:3000',
            'cover_imageurl' => 'required|max:1000',
            'imageurl' => 'required|max:1000',
            'popularity' => 'required|max:10',
        ]);


        try{
            DB::table('locations')->insert([
                'name' => $request->name,
                'country' => $request->country,
                'overview' => $request->overview,
                'discription' => $request->discription,
                'cover_imageurl' => $request->cover_imageurl,
                'imageurl' => $request->imageurl,
                'popularity' => $request->popularity,
            ]);

            return back()->with('message', 'Location Added Successfully');
        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Adding Location')->withInput();
        }

    }



    public function update(Request $request, $id){

        // dd($request->only('name', 'country', 'overview', 'discription', 'cover_imageurl', 'imageurl'));

        $this->validate($request, [
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'overview' => 'required|max:1000',
            'discription' => 'required|max:3000',
            'cover_imageurl' => 'required|max:1000',
            'imageurl' => 'required|max:1000',
            'popularity' => 'required|max:10'
        ]);


        try{

            DB::table('locations')
              ->where('id', $id)
              ->update(
                [
                    'name' => $request->name,
                    'country' => $request->country,
                    'overview' => $request->overview,
                    'discription' => $request->discription,
                    'cover_imageurl' => $request->cover_imageurl,
                    'imageurl' => $request->imageurl,
                    'popularity' => $request->popularity,
                ]);

                return back()->with('message', 'Location Updated Successfully');

        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Updating Location')->withInput();
        }


    }


    public function delete($id){

        // dd($id);
        try{

            DB::table('locations')
              ->where('id', $id)
              ->delete();

            return redirect('/')->with('message', 'Location Deleted Successfully');

        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Deleting Location');
        }


    }

    public function searchlocation($input){
        // dd('called');
        // dd($input);
        $searchresults = DB::select('select id, name from locations where name like ?',[$input."%"]);
        // dd($searchresults);
        echo json_encode($searchresults);
    }


}

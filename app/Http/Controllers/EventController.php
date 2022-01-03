<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;


class EventController extends Controller
{


    public function addEvent(){

        return view('events.addevent');

    }

    public function updateEvent($id){
        // dd($id);
        $result = DB::select('select * from events where id = ?',[$id]);
        if(empty($result)){
            abort(404);
        }
        else{
            // dd($result);
            $locationquery = DB::select('select name, id from locations where id = ?', [$result[0]->location_id]);
            $location = $locationquery[0]->name." (".$locationquery[0]->id.")";
            return view('events.updateevent', ["event" => $result[0], 'id' => $id, "location" => $location]);
        }

    }


    public function store(Request $request){

        // dd($request->only('name', 'discription', 'imageurl', 'location'));

        $this->validate($request, [
            'name' => 'required|max:255',
            'discription' => 'required|max:3000',
            'imageurl' => 'required|max:1000',
            'location' => 'required',
            'date' => 'required',
        ]);

        $location = $request->location;

        $start  = strpos($location, '(');
        if($start == false){
            return back()->with('message', 'This Location was not found in database')->withInput();
        }

        $end    = strpos($location, ')', $start + 1);
        if($end == false){
            return back()->with('message', 'This Location was not found in database')->withInput();
        }

        $length = $end - $start;
        $location_id = substr($location, $start + 1, $length - 1);

        try{
            DB::table('events')->insert([
                'name' => $request->name,
                'discription' => $request->discription,
                'imageurl' => $request->imageurl,
                'location_id' => $location_id,
                'event_date' =>  $request->date,
            ]);

            return back()->with('message', 'Event Added Successfully');
        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Adding Event')->withInput();
        }

    }



    public function update(Request $request, $id){

        // dd($id);
        // dd($request->only('name', 'country', 'overview', 'discription', 'cover_imageurl', 'imageurl'));

        $this->validate($request, [
            'name' => 'required|max:255',
            'discription' => 'required|max:3000',
            'imageurl' => 'required|max:1000',
            'location' => 'required',
            'date' => 'required',
        ]);


        $location = $request->location;

        $start  = strpos($location, '(');
        if($start == false){
            return back()->with('message', 'This Location was not found in database')->withInput();
        }

        $end    = strpos($location, ')', $start + 1);
        if($end == false){
            return back()->with('message', 'This Location was not found in database')->withInput();
        }

        $length = $end - $start;
        $location_id = substr($location, $start + 1, $length - 1);

        $check_loc_id = DB::select('select * from locations where id = ?', [$location_id]);
        if(empty($check_loc_id)){
            return back()->with('message', 'This Location was not found in database')->withInput();
        }


        try{

            DB::table('events')
              ->where('id', $id)
              ->update(
                [
                    'name' => $request->name,
                    'discription' => $request->discription,
                    'imageurl' => $request->imageurl,
                    'location_id' => $location_id,
                    'event_date' =>  $request->date,
                ]);

                return back()->with('message', 'Event Updated Successfully')->withInput();

        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Updating Event')->withInput();
        }


    }


    public function delete($id){

        // dd($id);
        try{

            DB::table('events')
              ->where('id', $id)
              ->delete();

            return redirect('/')->with('message', 'Event Deleted Successfully');

        }

        catch(Exception $e) {
            dd($e->getMessage());
            return back()->with('message', 'Error Deleting Event');
        }


    }


}

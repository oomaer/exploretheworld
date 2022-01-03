<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;

class ReviewController extends Controller
{

    public function store(Request $request, $location_id){

        // dd($request->only('review_form_rating', 'review_form_comment'));
        // dd(auth()->user()->id);
        // dd($location_id);

        $this->validate($request, [
            'review_form_rating' => 'required|digits_between:0,11',
            'review_form_comment' => 'required|max:1000',
        ]);


        // dd(Carbon::now()->format('d/m/Y'));

        try{
            DB::table('reviews')->insert([
                'rating' => $request->review_form_rating,
                'comment' => $request->review_form_comment,
                'user_id' => auth()->user()->id,
                'location_id' => $location_id,
                'review_date' => Carbon::now()->format('d-m-Y'),
            ]);

            return back()->with('message', 'Review Posted! You can now edit or delete it');
        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Posting Review')->withInput();
        }

    }


    public function update(Request $request, $id){

        $this->validate($request, [
            'update_review_form_rating' => 'required|digits_between:0,11',
            'update_review_form_comment' => 'required|max:1000',
        ]);


        // dd(Carbon::now()->format('d/m/Y'));

        try{
            DB::table('reviews')
            ->where('id', $id)
            ->update(
              [
                'rating' => $request->update_review_form_rating,
                'comment' => $request->update_review_form_comment,
                'review_date' => Carbon::now()->format('d-m-Y'),
              ]);

            return back()->with('message', 'Review Updated');
        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Updating Review')->withInput();
        }
    }

    public function delete($id){

        // dd($id);

        try{

            DB::table('reviews')
              ->where('id', $id)
              ->delete();

            return back()->with('message', 'Review Deleted Successfully');

        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Deleting Review');
        }


    }

}

<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;


class TestSubmit extends Controller
{
    public function index(){
        // $slidesData = News::find(66);

        // dd($slidesData);
        $slidesData = [
            ['title' => 'Slide 1', 'description' => 'Description for Slide 1'],
            ['title' => 'Slide 2', 'description' => 'Description for Slide 2'],
            ['title' => 'Slide 3', 'description' => 'Description for Slide 3'],
            // Add more slide data as needed
        ];

        return view('submitForm', ['slidesData' => $slidesData]);
    }

    public function submit(Request $request){

        dd($request->add_permission);
        return view('submitForm');
    }
}

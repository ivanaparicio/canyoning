<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Question;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index(){

        $services = Service::where('status', 1)->get();

        $map = Company::first()->maps;

        $questions = Question::all();

        $banners = Banner::orderBy('order', 'ASC')->get();

        $reviews = Review::latest()->get();

        return view('welcome', compact('services', 'questions', 'map', 'banners', 'reviews'));
    }

}

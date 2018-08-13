<?php

namespace App\Http\Controllers;

use App\EducationalClass;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function apiClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        $query = EducationalClass::with('teacher');

        if($request->skip) {
            $query = $query->skip($request->skip);
        } else {
            $query = $query->skip(0);
        }

        if ($request->limit) {
            $query = $query->limit($request->limit);
        } else {
            $query = $query->limit(1000);
        }

        return [
            'classes' => $query->get(),
        ];
    }
}

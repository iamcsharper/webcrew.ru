<?php

namespace App\Http\Controllers;

use App\EducationalClass;
use App\User;
use Illuminate\Database\Query\Builder;
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

    private function addSkipLimit($query, Request $request) {
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

        /** @var Builder $query */
        return $query;
    }

    public function apiMyJobClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        $query = EducationalClass::getClassesWithActiveUser(auth()->id());

        return [
            'classes' => $this->addSkipLimit($query, $request)
                ->where('teacher_id', auth()->id())
                ->get(),
        ];
    }

    public function apiMyClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        $user = auth()->user();

        return [
            'classes' => $this->addSkipLimit($user->student_classes(), $request)->get()
        ];
    }

    public function apiClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        $query = EducationalClass::getClassesWithActiveUser(auth()->id());

        return [
            'classes' => $this->addSkipLimit($query, $request)
                ->get(),
        ];
    }
}

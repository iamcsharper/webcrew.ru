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

    private function classesBuilder(Request $request) {
        $query = EducationalClass::with([
            'teacher:id,name',
        ])->withCount([
            'students' => function ($query) {
                $query->select('students_subscriptions.student_id')->where(['students_subscriptions.student_id' => auth()->id(), 'students_subscriptions.deleted_at' => null]);
            }
        ]);

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

        return $query;
    }

    public function apiMyJobClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        return [
            'classes' => $this->classesBuilder($request)
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

        return [
            'classes' => $this->classesBuilder($request)
                ->where('teacher_id', auth()->id())
                ->get(),
        ];
    }

    public function apiClasses(Request $request)
    {
        if (!$request->ajax()) {
            return [
                'error' => 'non_ajax_query'
            ];
        }

        return [
            'classes' => $this->classesBuilder($request)
                ->get(),
        ];
    }
}

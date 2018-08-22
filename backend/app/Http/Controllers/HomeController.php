<?php

namespace App\Http\Controllers;

use App\EducationalClass;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('role:teacher')->only(['apiJobMyClasses']);
        $this->middleware('is_ajax')->only(['apiJobMyClasses', 'apiMyClasses', 'apiClasses']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function listClasses(Request $request)
    {
        return view('home', [
            'params' => $this->apiClasses($request)
        ]);
    }

    public function myCourses(Request $request)
    {
        if (Auth::user()->roles->toArray()[0]['name'] === 'teacher')
            return view('home', [
                'params' => $this->apiMyJobClasses($request)
            ]);

        return view('home', [
            'params' => $this->apiMyClasses($request)
        ]);
    }

    private function addExtras($query, Request $request)
    {
        if ($request->query('skip')) {
            $query = $query->skip($request->query('skip'));
        } else {
            $query = $query->skip(0);
        }

        if ($request->query('limit')) {
            $query = $query->limit($request->query('limit'));
        } else {
            $query = $query->limit(5);
        }

        if ($request->query('sort')) {
            $query = $query->orderBy($request->query('sort'),
                is_null($request->query('order')) ? 'ASC' : $request->query('order'));
        }

        /** @var Builder $query */
        return $query;
    }

    public function apiMyJobClasses(Request $request)
    {
        $query = EducationalClass::getClassesWithActiveUser(auth()->id());

        return [
            'classes' => $this->addExtras($query, $request)
                ->where('teacher_id', auth()->id())
                ->get(),
        ];
    }

    public function apiMyClasses(Request $request)
    {
        $user = auth()->user();

        return [
            'classes' => $this->addExtras($user->student_classes(), $request)->get()
        ];
    }

    public function apiClasses(Request $request)
    {
        $query = EducationalClass::getClassesWithActiveUser(auth()->id());

        $classes = $this->addExtras($query, $request)->get();

        return [
            'classes' => $classes,
        ];
    }
}

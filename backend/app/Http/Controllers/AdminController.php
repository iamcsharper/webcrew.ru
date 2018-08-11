<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function show() {
        return response()->json([
            'success' => true,
            'users' => User::all(),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $user = \App\User::findOrFail($id);

        if (is_null($user)) {
            return response()->json([
                'success' => false,
                'errors' => ['user_not_found']
            ]);
        }

        $user->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}

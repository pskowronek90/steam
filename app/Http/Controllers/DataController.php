<?php namespace App\Http\Controllers;

use App\User;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show(User $user)
    {
        $user = $user->getUserById(auth()->id());

        return view('account')->with(compact('user'));
    }

    public function getUserJsonById(User $user, $id)
    {
        return response()->json($user->getUserById($id), 200);
    }
}

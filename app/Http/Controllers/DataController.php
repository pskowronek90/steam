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
        $user = $user->getByUserIdOrSteamId(auth()->id());

        return view('account')->with(compact('user'));
    }
}

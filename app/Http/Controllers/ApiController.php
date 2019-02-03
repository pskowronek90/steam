<?php namespace App\Http\Controllers;

use App\User;

class ApiController extends Controller
{
    /** @var User */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserByIdOrSteamId($id)
    {
        return response()->json($this->user->getByUserIdOrSteamId($id), 200);
    }
}

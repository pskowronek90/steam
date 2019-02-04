<?php namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;

class AuthController extends Controller
{
    const DEFAULT_POINTS = 0;

    /** @var SteamAuth */
    protected $steam;

    /** @param SteamAuth $steam */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /** @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /** @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);
                auth()->login($user, true);

                return redirect()->route('data.index');
            }
        }

        return $this->redirectToSteam();
    }

    /**
     * @param $info
     * @return User
     */
    protected function findOrNewUser($info)
    {
        $user = User::where('steam_id', $info->steamID64)->first();

        if (!is_null($user)) {
            return $user;
        }

        return User::create([
            'username' => $info->personaname,
            'avatar' => $info->avatarfull,
            'steam_id' => $info->steamID64,
            'points' => 0,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use  Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function loggedOut(Request $request)
    {

        return redirect()->route('user.main.index');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('yandex')->user();


        $loginUser = User::where('email', $user->email)->first();

        if (!$loginUser) {
            $loginUser = User::create([
                'name' => $user->nickname,
                'email' => $user->email,
                'password' => bcrypt('123456'),
            ]);

            Character::create([
                'user_id' => $loginUser->id,
                'name' => $loginUser->name,
            ]);
        }

        Auth::login($loginUser, true);

        return redirect('/home');
    }
}

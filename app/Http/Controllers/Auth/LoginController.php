<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use File;

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
    protected $redirectTo = '/';

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();

        $fileContents = file_get_contents( $user->getAvatar());
        
        File::put(public_path().'/storage/userprofile/'.$user->getId().'.jpg' , $fileContents);

        $finduser = User::where('email',$user->email)->first();
        if ($finduser) {
            Auth::login($finduser);
            return redirect('/');
        } else {
            $newuser = new User;
            $newuser->profile = $user->getId().'.jpg';
            $newuser->name = $user->name;
            $newuser->email = $user->email;
            $newuser->password = bcrypt(123456);
            $newuser->save();
            Auth::login($newuser);
            return redirect('/');

        }
        return $user->name;
    }

}

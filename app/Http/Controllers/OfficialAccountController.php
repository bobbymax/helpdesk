<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Auth;

class OfficialAccountController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::with('azure')->redirect();
    }

    public function getProviderRedirect()
    {
        return Socialite::with('graph')->redirect();
        //return redirect('https://graph.microsoft.com/v1.0/me/people/');
    }

    public function handleProviderCallback()
    {
		try {
			$user = Socialite::driver('azure')->user();
		} catch (Exception $e) {
			return redirect()->route('login');
		}

        //dd($user);

		$authUser = $this->findOrCreateUser($user);

		$this->signin($authUser, true);
		return redirect()->route('user.dashboard');
    }

    public function handleGraphCallback()
    {
        $users = Socialite::driver('graph')->user();
        
        dd($users);
    }

    protected function signin($user, $status=false)
    {
        return Auth::login($user, $status);
    }

    protected function findOrCreateUser($official_user)
    {
    	$user = User::where('email', $official_user->email)->first();

    	if ($user) {
    		return $user;
    	} else {
    		$user = User::create([
    			'name' => $official_user->name,
    			'email' => $official_user->email,
    			'password' => Hash::make('Password1'),
    		]);

    		return $user;
    	}

    }
}

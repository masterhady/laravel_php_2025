<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class GithubController extends Controller
{
    //

    public function redirectToGithub(){
         return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
         $githubUser = Socialite::driver('github')->user();
        //  dd($githubUser);
         $user = User::where('email', $githubUser->getEmail())->first();
       

        if(!$user){
            $user = User::create([
                'name' =>  $githubUser->getName() ?? $githubUser->getNickname(),
                'email' => $githubUser->getEmail(), 
                'password' => bcrypt(Str::random(24)),
                'github_id' => $githubUser->getId()
            ]);
        }

        Auth::login($user);
        return redirect('/departments');
    }

}

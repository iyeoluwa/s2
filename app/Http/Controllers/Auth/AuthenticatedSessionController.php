<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // to find what this can do simply go to '../Auth/LoginRequest.php'
        $request->authenticate();

        // to be sincere i have not sat down to study how this code works
        $request->session()->regenerate();

        //this if statement helps us get if the user is an admin
        if (auth()->user()->can('create articles')){

            // get the full url of the website
            $url  = url()->full();

            // seperate each part of the site into arrays then you'll get 'http://{domain}'
            $getDomain = explode('.',$url);

            //now we extract the subdomain e.g 'http://' and '{domain}'
            $getSubdomain = explode('//',$getDomain[0]);

            //now we use the sub domain to help us redirect the user how we see fit
            $subdomain = $getSubdomain[1];

            //this is where the actual logic begins
            if($subdomain == 'admin'){
                  return redirect()->intended(RouteServiceProvider::HOME);
            }else if($subdomain == 'blog'){
                return redirect()->route('blog.home');

            }else if ($subdomain == 'podcast'){
                return redirect()->route('podcast.home');
            }

        }else{
            return redirect()->route('blog.home');
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

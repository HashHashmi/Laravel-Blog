<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        // dd($newsletter);
        request()->validate(['email' => 'required|email']); 

        try{
            $newsletter->subscribe(request()->input("email"));
        } catch (\Exception $e){
            throw ValidationException::withMessages([
              'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
    
        return redirect('/')->with('success', 'you are now signed up for our newsletter!');
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TraitsFolder\BladeDirectives;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Models\User;
 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function() {
              $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
              ]);

              return new MailchimpNewsletter($client); 
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard(); 

        Gate::define('admin', function (User $user){
            return $user->username === 'buckey';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });

    }
}

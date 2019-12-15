<?php

namespace App\Providers;


use App\Question;
use App\Policies\QuestionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Question::class => QuestionPolicy::class
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Below Method is using Gate
         */

        // \Gate::define('update-question', function ($user, $question) {
        //     return $user->id === $question->user_id;
        // });

        // \Gate::define('delete-question', function ($user, $question) {
        //     return $user->id === $question->user_id;
        // });
    }
}

<?php

namespace OrgTabajara\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'OrgTabajara\Model' => 'OrgTabajara\Policies\ModelPolicy',
        'OrgTabajara\Funcionario' => 'OrgTabajara\Policies\FuncionarioPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

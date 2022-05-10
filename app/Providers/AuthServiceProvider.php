<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Diagnosis' => 'App\Policies\DiagnosesPolicy',
        'App\Models\Department' => 'App\Policies\DepartmentPolicy',
        'App\Models\Doctor' => 'App\Policies\DoctorPolicy',
        'App\Models\Invoice' => 'App\Policies\InvoicePolicy',
        'App\Models\PaymentGateway' => 'App\Policies\PaymentGatewayPolicy',
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

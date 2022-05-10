<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\Invoices;
use App\Nova\Metrics\TotalDoctors;
use App\Nova\Metrics\TotalUsers;
use  App\Nova\Metrics\UsersPerDay;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalUsers(),
            new UsersPerDay(),
            new TotalDoctors(),
            new Invoices(),
        ];
    }
}

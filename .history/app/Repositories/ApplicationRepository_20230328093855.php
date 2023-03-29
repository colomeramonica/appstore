<?php

namespace App\Repositories;

use App\Interfaces\ApplicationRepositoryInterface;
use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function __construct(
        Application $application
    )
    {

    }
    public function getAllApps()
    {
        return Application;
    }
}

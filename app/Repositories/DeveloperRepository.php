<?php

namespace App\Repositories;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Models\Developer;

class DeveloperRepository implements DeveloperRepositoryInterface
{
    public function getDeveloper($id)
    {
        $developer = Developer::find($id);

        return $developer;
    }

    public function getAllDevelopers()
    {
        $developers = Developer::all();

        return $developers;
    }
}
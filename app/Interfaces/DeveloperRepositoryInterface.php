<?php

namespace App\Interfaces;

interface DeveloperRepositoryInterface
{
    public function getDeveloper($id);
    public function getAllDevelopers();
}

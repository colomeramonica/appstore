<?php

namespace App\Interfaces;

interface AppRepositoryInterface
{
    public function getAllApps();
    public function getAppById($appId);
    public function getAppByCategory($categoryId);
    public function getAppByDev($devId);
    public function deleteApp($appId);
    public function store($appData);
    public function updateApp($appId, $appData);
}

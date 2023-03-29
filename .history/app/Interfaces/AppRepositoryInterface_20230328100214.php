<?php

namespace App\Interfaces;

use App\Models\App;

interface AppRepositoryInterface
{
    public function getAllApps();
    public function getAppById($appId);
    public function getAppByCategory($categoryId);
    public function getAppByPartner($partnerId);
    public function deleteApp($appId);
    public function createApp($appData);
    public function updateApp($appId, $appData);
}

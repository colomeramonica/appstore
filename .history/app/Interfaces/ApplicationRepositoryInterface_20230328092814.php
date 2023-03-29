<?php

namespace App\Interfaces;

use App\Models\Application;

interface ApplicationRepositoryInterface
{
    public function getAllApps();
    public function getAppById($appId);
    public function getAppByCategory($categoryId);
    public function getAppByPartner($partnerId);
    public function deleteApp($appId);
    public function createApp(Application $appData);
    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders();
}

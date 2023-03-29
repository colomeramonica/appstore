<?php

namespace App\Interfaces;

interface ApplicationRepositoryInterface
{
    public function getAllApps();
    public function getAppById($appId);
    public function getAppByCategory($categoryId);
    public function getAppByPartner($partnerId);
    public function deleteOrder($orderId);
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders();
}

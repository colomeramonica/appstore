<?php

namespace App\Interfaces;

use App\Models\Category;

interface ApplicationRepositoryInterface
{
    public function getAllCategories();
    public function getAppById($appId);
    public function getAppByCategory($categoryId);
    public function getAppByPartner($partnerId);
    public function deleteApp($appId);
    public function createApp(Category $appData);
    public function updateApp($appId, Category $appData);
}

<?php

namespace App\Repositories;

use App\Interfaces\appRepositoryInterface;
use App\Models\App;

class AppRepository implements AppRepositoryInterface
{
    /**
     * @param app $app
     */
    public function __construct(
        App $app
    )
    {
        $this->app = $app;
    }

    public function getAllApps()
    {
        return $this->app->getAllApps();
    }

    public function getAppById($appId)
    {
        return $this->app->getAppById($appId);
    }

    public function getAppByCategory($categoryId)
    {
        return $this->app->getAppByCategory($categoryId);
    }

    public function getAppByPartner($partnerId)
    {
        return $this->app->getAppByPartner($partnerId);
    }

    public function createApp($app)
    {
        return $this->app->createApp($app);
    }

    public function updateApp($appId, $data)
    {
        return $this->app->updateApp($appId, $data);
    }

    public function deleteApp($appId)
    {
        return $this->app->deleteApp($appId);
    }
}

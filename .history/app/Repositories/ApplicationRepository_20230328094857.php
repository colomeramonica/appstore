<?php

namespace App\Repositories;

use App\Interfaces\ApplicationRepositoryInterface;
use App\Models\App;

class AppRepository implements ApplicationRepositoryInterface
{
    /**
     * @param Application $application
     */
    public function __construct(
        App $application
    )
    {
        $this->application = $application;
    }

    public function getAllApps()
    {
        return $this->application->getAllApps();
    }

    public function getAppById($appId)
    {
        return $this->application->getAppById($appId);
    }

    public function getAppByCategory($categoryId)
    {
        return $this->application->getAppByCategory($categoryId);
    }

    public function getAppByPartner($partnerId)
    {
        return $this->application->getAppByPartner($partnerId);
    }

    public function createApp($app)
    {
        return $this->application->createApp($app);
    }

    public function updateApp($appId, $data)
    {
        return $this->application->updateApp($appId, $data);
    }

    public function deleteApp($appId)
    {
        return $this->application->deleteApp($appId);
    }
}

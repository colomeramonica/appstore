<?php

namespace App\Repositories;

use App\Interfaces\appRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\PartnerRepositoryInterface;
use Illuminate\Http\Request;

class AppRepository implements AppRepositoryInterface
{
    /**
     * @param app $app
     */
    public function __construct(
        App $app,
        AppRepositoryInterface $appRepository,
        CategoryRepositoryInterface $categoryRepository,
        PartnerRepositoryInterface $partnerRepository
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

    public function filter(Request $request)
    {
        $applications = (new App())
            ->orderBy('id');

        $where = $this->applyFilter($request->all());

        return $applications->get();
    }

    private function applyFilter(array $param) : array
    {
        $conditions = [
            'name' =>  fn($param) => ['name', 'like', '%'.$param.'%'],
            'status' => fn($param) => ['status', '=', $param],
            'display_options' => fn($param) => ['display_options', '=', $param],
            'category' => fn($param) => ['category', '=', $param],
            'partner' => fn($param) => ['partner', '=', $param],
            'price' => fn($param) => ['price', '=', $param],
            //'highlights' => $this->getHighlights($param)
        ];

        $params = array_filter($param, fn($conditions) => !empty($conditions));

        $filters = [];
        foreach($params as $key => $data) {
            if(array_key_exists($key, $conditions)) {
                $filters[] = $conditions[$key]($data);
            }
        }

        return $filters;
    }

}

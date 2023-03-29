<?php

namespace App\Repositories;

use App\Interfaces\appRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\PartnerRepositoryInterface;
use App\Models\App;
use Illuminate\Http\Request;

class AppRepository implements AppRepositoryInterface
{
    /**
     *
     */
    public function __construct(
        AppRepositoryInterface $appRepository,
        CategoryRepositoryInterface $categoryRepository,
        PartnerRepositoryInterface $partnerRepository
    )
    {
        $this->appRepository = $appRepository;
        $this->categoryRepository = $categoryRepository;
        $this->partnerRepository = $partnerRepository;
    }

    public function getAllApps()
    {
        return $this->appRepository->getAllApps();
    }

    public function getAppById($appId)
    {
        return $this->appRepository->getAppById($appId);
    }

    public function getAppByCategory($categoryId)
    {
        return $this->appRepository->getAppByCategory($categoryId);
    }

    public function getAppByPartner($partnerId)
    {
        return $this->appRepository->getAppByPartner($partnerId);
    }

    public function createApp($app)
    {
        return $this->appRepository->createApp($app);
    }

    public function updateApp($appId, $data)
    {
        return $this->appRepository->updateApp($appId, $data);
    }

    public function deleteApp($appId)
    {
        return $this->appRepository->deleteApp($appId);
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

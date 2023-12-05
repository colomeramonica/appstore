<?php

namespace App\Repositories;

use App\Interfaces\AppRepositoryInterface;
use App\Models\App;
use Illuminate\Http\Request;

class AppRepository implements AppRepositoryInterface
{
    public function getAllApps()
    {
        return App::all();
    }

    public function getAppById($appId)
    {
        $app = App::find($appId);

        return $app;
    }

    public function getAppByCategory($categoryId)
    {
       $app = App::where('status', 1)
            ->join('app_category', 'app_category.category_id', '=', $categoryId)
            ->join('category', 'category.id', '=', 'app_category.id')
            ->get();

        return $app;
    }

    public function getAppByDev($devId)
    {
        $app = App::where([
            'status' => 1,
            'dev_id' => $devId
        ])->get();

        return $app;
    }

    public function store($data)
    {
        $app = new App;

        $app->name = $data['name'];
        $app->description = $data['description'];
        $app->price = $data['price'];
        $app->dev_id = $data['dev_id'];

        $app->save();

        return $app;

    }

    public function updateApp($appId, $data)
    {
        $app = App::find($appId);

        $app->description = $data['description'];
        $app->price = $data['price'];
        $app->rating = $data['rating'];

        $app->save();

        return $app;
    }

    public function deleteApp($appId)
    {
        //
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

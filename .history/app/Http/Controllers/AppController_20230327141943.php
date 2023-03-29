<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function filter(Request $request)
    {
        $applications = (new Application())
            ->orderBy('id');

        //$where = $this->applyFilter($request->all());

        return $applications->get();
    }

    private function applyFilter(array $data) : array
    {
        $conditions = [
            'name' =>  fn($data) => ['name', 'like', '%'.$data.'%'],
            'status' => fn($data) => ['status', '=', $data],
            'display_options' => fn($data) => ['display_options', '=', $data],
            'category' => fn($data) => ['category', '=', $data],
            'partner' => fn($data) => ['partner', '=', $data],
            'price' => fn($data) => ['price', '=', $data],
        ];

        $params = array_filter($params, fn($conditions) => !empty($conditions));

        $filters = [];
        foreach($params as $key => $data) {
            if(array_key_exists($key, $conditions)) {
                $filters[] = $conditions[$key]($data);
            }
        }

        return $filters;
    }
}

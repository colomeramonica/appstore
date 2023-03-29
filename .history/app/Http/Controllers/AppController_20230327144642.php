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
            'highlights' => $this->getHighlights($param)
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

    public function create()
    {
        dd('oi');
    }

    public function list()
    {

    }
}

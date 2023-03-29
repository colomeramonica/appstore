<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function filter(Request $request)
    {
        $agencyModel = (new Application())
            ->orderBy('bank_number');

        $where = $this->applyFilter($request->all());

        if(empty($where)) {
           return $agencyModel->get();
        }

        foreach($where as $filter) {
            $agencyModel->where(...$filter);
        }

        return $agencyModel->get();
    }

    private function applyFilter(array $params) : array
    {
        $where = [
            'name' =>  fn($data) => ['name', 'like', '%'.$data.'%'],
            'number' => fn($data) => ['number', '=', $data],
            'bank_number' => fn($data) => ['bank_number', '=', $data],
            'active' => fn($data) => ['active', '=', $data],
        ];

        $params = array_filter($params, fn($where) => !empty($where));

        $filters = [];
        foreach($params as $key => $data) {
            if(array_key_exists($key, $where)) {
                $filters[] = $where[$key]($data);
            }
        }

        return $filters;
    }
}

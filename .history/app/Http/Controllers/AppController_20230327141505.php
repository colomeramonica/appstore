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

    private function applyFilter(array $params) : array
    {
        $filters = [
            'name' =>  fn($data) => ['name', 'like', '%'.$data.'%'],
            'status' => fn($data) => ['number', '=', $data],
            'display_options' => fn($data) => ['bank_number', '=', $data],
            'category' => fn($data) => ['active', '=', $data],
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

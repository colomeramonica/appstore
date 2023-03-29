<?php

namespace App\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AppController extends BaseController
{
    public function __construct()
    {

    }

    public function parseData($data)
    {

    }
    public function create($data)
    {
        $this->parseData($data);
    }
}

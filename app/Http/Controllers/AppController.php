<?php

namespace App\Http\Controllers;

use App\Interfaces\AppRepositoryInterface;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private AppRepositoryInterface $appRepository;

    public function __construct(AppRepositoryInterface $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Criação de um novo app
     *
     * @param $data
     */
    public function create(Request $request)
    {
        return $this->appRepository->createApp($request->all());
    }

    public function show($app)
    {
        //
    }
}

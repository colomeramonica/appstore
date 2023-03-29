<?php

namespace App\Http\Controllers;

use App\Interfaces\AppRepositoryInterface;
use App\Models\App;

class AppController extends Controller
{
    private AppRepositoryInterface $appRepository;

    public function index()
    {
        //
    }

    /**
     * Criação de um novo app
     *
     * @param $data
     */
    public function create($data)
    {
        return $this->appRepository->createApp($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(App $app)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppRequest $request, App $app)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteApp(App $app)
    {
        //
    }
}

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->appRepository->create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(App $app)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(App $app)
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
    public function destroy(App $app)
    {
        //
    }
}

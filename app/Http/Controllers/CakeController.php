<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakeRequest;
use App\Models\Cake;
use Illuminate\Http\Request;
use App\Services\CakeService;

class CakeController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CakeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CakeRequest $request)
    {
        return $this->service->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  Collection  $cake
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
        return $this->service->show($cake);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Collection  $cake
     * @return \Illuminate\Http\Response
     */
    public function update(CakeRequest $request, Cake $cake)
    {
        return $this->service->update($request, $cake);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Collection  $cake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cake $cake)
    {
        return $this->service->destroy($cake);
    }

    public function cakeInterested(Request $request)
    {
        return $this->service->cakeInterested($request);
    }
}
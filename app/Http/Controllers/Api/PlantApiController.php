<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PlantService;
use Illuminate\Http\Request;

class PlantApiController extends Controller
{
    protected $plantService;

    public function __construct(PlantService $plantService)
    {
        $this->plantService = $plantService;
    }

    public function index()
    {
        $data = $this->plantService->fetchPlants();
        $breadCrumb = [__('app.api_breadcrumb'), __('app.plant_breadcrumb')];
        $viewData = [
            'data' => $data,
            'breadCrumb' => $breadCrumb,
        ];

        return view('Api.Plant.index')->with('viewData', $viewData);
    }
}

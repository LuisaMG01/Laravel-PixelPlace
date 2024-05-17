<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MarvelService;
use Illuminate\View\View;

class MarvelApiController extends Controller
{
    protected $apiService;

    public function __construct(MarvelService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(): View
    {
        $publicKey = env('MARVEL_PUBLIC_KEY');
        $privateKey = env('MARVEL_PRIVATE_KEY');
        $characters = $this->apiService->fetchCharacters($publicKey, $privateKey);

        $breadCrumb = [__('app.api_breadcrumb'), __('app.marvel_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
            'characters' => $characters,
        ];

        return view('Api.Marvel.index')->with('viewData', $viewData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyCreateRequest;
use App\Http\Services\PropertyService;

class PropertyController extends Controller
{
    private $propertyService;

    /**
     * PropertyController constructor.
     * @param PropertyService $propertyService
     */
    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * @param PropertyCreateRequest $request
     * @return \App\Http\Resources\PropertyResource
     */
    public function create(PropertyCreateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyService->createProperty($input);
    }
}

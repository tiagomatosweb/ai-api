<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyCreateRequest;
use App\Http\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function create(PropertyCreateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyService->createProperty($input);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Services\RestaurantService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $RestaurantService;

    public function __construct(RestaurantService $RestaurantService)
    {
        $this->RestaurantService = $RestaurantService;
    }

    public function index()
    {
        return $this->RestaurantService->getAll();
    }

    public function store(StoreRestaurantRequest $request)
    {
        return $this->RestaurantService->create($request->validated());
    }

    public function show($id)
    {
        return $this->RestaurantService->getById($id);
    }

    public function update(UpdateRestaurantRequest $request, $id)
    {
        return $this->RestaurantService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->RestaurantService->delete($id);
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotographerRequest;
use App\Http\Requests\UpdatePhotographerRequest;
use App\Services\PhotographerService;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    protected $PhotographerService;

    public function __construct(PhotographerService $PhotographerService)
    {
        $this->PhotographerService = $PhotographerService;
    }

    public function index()
    {
        return $this->PhotographerService->getAll();
    }

    public function store(StorePhotographerRequest $request)
    {
        return $this->PhotographerService->create($request->validated());
    }

    public function show($id)
    {
        return $this->PhotographerService->getById($id);
    }

    public function update(UpdatePhotographerRequest $request, $id)
    {
        return $this->PhotographerService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->PhotographerService->delete($id);
        return response()->json(null, 204);
    }
}

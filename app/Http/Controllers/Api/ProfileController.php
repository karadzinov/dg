<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $ProfileService;

    public function __construct(ProfileService $ProfileService)
    {
        $this->ProfileService = $ProfileService;
    }

    public function index()
    {
        return $this->ProfileService->getAll();
    }

    public function store(StoreProfileRequest $request)
    {
        return $this->ProfileService->create($request->validated());
    }

    public function show($id)
    {
        return $this->ProfileService->getById($id);
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        return $this->ProfileService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->ProfileService->delete($id);
        return response()->json(null, 204);
    }
}

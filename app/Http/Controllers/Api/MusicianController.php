<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusicianRequest;
use App\Http\Requests\UpdateMusicianRequest;
use App\Services\MusicianService;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    protected $MusicianService;

    public function __construct(MusicianService $MusicianService)
    {
        $this->MusicianService = $MusicianService;
    }

    public function index()
    {
        return $this->MusicianService->getAll();
    }

    public function store(StoreMusicianRequest $request)
    {
        return $this->MusicianService->create($request->validated());
    }

    public function show($id)
    {
        return $this->MusicianService->getById($id);
    }

    public function update(UpdateMusicianRequest $request, $id)
    {
        return $this->MusicianService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->MusicianService->delete($id);
        return response()->json(null, 204);
    }
}

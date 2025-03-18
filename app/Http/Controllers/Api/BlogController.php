<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $BlogService;

    public function __construct(BlogService $BlogService)
    {
        $this->BlogService = $BlogService;
    }

    public function index()
    {
        return $this->BlogService->getAll();
    }

    public function store(StoreBlogRequest $request)
    {
        return $this->BlogService->create($request->validated());
    }

    public function show($id)
    {
        return $this->BlogService->getById($id);
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        return $this->BlogService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->BlogService->delete($id);
        return response()->json(null, 204);
    }
}

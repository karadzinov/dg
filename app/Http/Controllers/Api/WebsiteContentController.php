<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebsiteContentRequest;
use App\Http\Requests\UpdateWebsiteContentRequest;
use App\Services\WebsiteContentService;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    protected $WebsiteContentService;

    public function __construct(WebsiteContentService $WebsiteContentService)
    {
        $this->WebsiteContentService = $WebsiteContentService;
    }

    public function index()
    {
        return $this->WebsiteContentService->getAll();
    }

    public function store(StoreWebsiteContentRequest $request)
    {
        return $this->WebsiteContentService->create($request->validated());
    }

    public function show($id)
    {
        return $this->WebsiteContentService->getById($id);
    }

    public function update(UpdateWebsiteContentRequest $request, $id)
    {
        return $this->WebsiteContentService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->WebsiteContentService->delete($id);
        return response()->json(null, 204);
    }
}

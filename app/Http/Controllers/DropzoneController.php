<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class DropzoneController extends Controller
{
    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function index(): View
    {
        return view('dropzone');
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function store(Request $request): JsonResponse
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->getClientOriginalName();
        $image->move(public_path('images/invitations'),$imageName);

        return response()->json(['success'=>$imageName]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $fileName = $request->get('filename');
        unlink(public_path(). '/images/invitations'. $fileName);

        return response()->json(["success" => $fileName]);

    }


}

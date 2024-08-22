<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::getTree();
        $data = ['categories' => $categories];

        return view('admin.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getList();

        $data = ['categories' => $categories];
        return view('admin.categories.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            "name" => $request->get('name'),
            "slug" => $request->get('slug'),
            "parent_id" => $request->get('parent_id')
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::getList();

        $data = ['category' => $category, 'categories' => $categories];

        return view('admin.categories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $input = $request->all();


        $category->fill($input)->save();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public function updateCategoryOrder(Request $request)
    {
        try {
            $categories = $request->input('order');

            // Recursive function to update nested set values
            $updateNestedSet = function ($categories, $parent_id = null, $left = 0) use (&$updateNestedSet) {
                foreach ($categories as $category) {
                    $categoryModel = Category::find($category['id']);
                    $categoryModel->update([
                        'parent_id' => $parent_id,
                        '_lft' => ++$left,
                        '_rgt' => ++$left + (isset($category['children']) ? count($category['children']) : 0)
                    ]);

                    if (isset($category['children']) && is_array($category['children'])) {
                        $left = $updateNestedSet($category['children'], $categoryModel->id, $left);
                    }
                }

                return $left;
            };

            $updateNestedSet($categories);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}

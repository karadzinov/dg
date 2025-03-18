<?php

namespace App\Services;

use App\Models\Blog;

class BlogService
{
    public function getAll()
    {
        return Blog::all();
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function getById($id)
    {
        return Blog::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $resource = Blog::findOrFail($id);
        $resource->update($data);
        return $resource;
    }

    public function delete($id)
    {
        Blog::findOrFail($id)->delete();
    }
}

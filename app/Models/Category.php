<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id'
    ];

    protected static $depth = 0;

    public static function getTree()
    {
        $categories = self::whereNull('parent_id')->get();
        $tree = '<div class="myadmin-dd dd" id="nestable">' . self::renderTree($categories) . '</div>';
        return $tree;
    }

    public static function renderTree($nodes)
    {
        $list = '<ol class="dd-list">';
        foreach ($nodes as $node) {
            $list .= self::renderNode($node);
        }
        $list .= '</ol>';
        return $list;
    }

    public static function renderNode($node)
    {
        $listItem = '<li class="dd-item" data-id="'. $node->id .'">
                    <a class="btn btn-gray  btn goto" href="'. route('admin.categories.edit', $node->id) .'">

                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M10 21.995c-3.413-.03-5.295-.219-6.536-1.46C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2c4.714 0 7.071 0 8.535 1.464c.974.974 1.3 2.343 1.41 4.536"/><path fill="currentColor" d="M2.5 7.25a.75.75 0 0 0 0 1.5zm19.5 0H2.5v1.5H22z"/><path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M10.5 2.5L7 8m10-5.5L13.5 8"/><path stroke="currentColor" stroke-width="1.5" d="m18.562 13.935l.417-.417a1.77 1.77 0 1 1 2.503 2.503l-.417.417m-2.503-2.503s.052.887.834 1.669c.782.782 1.669.834 1.669.834m-2.503-2.503l-3.835 3.835c-.26.26-.39.39-.5.533a2.948 2.948 0 0 0-.338.545c-.078.164-.136.338-.252.686l-.372 1.116l-.12.36m7.92-4.572l-3.835 3.835c-.26.26-.39.39-.533.5a2.948 2.948 0 0 1-.545.338c-.164.078-.338.136-.686.252l-1.116.372l-.36.12m0 0l-.362.12a.477.477 0 0 1-.604-.603l.12-.361m.845.844l-.844-.844"/></g></svg>
</a><div class="dd-handle">'.$node->name.'</div>

                    ';

        $children = self::where('parent_id', '=', $node->id)->get();
        $count = $children->count();

        if ($count > 0) {
            $listItem .= self::renderTree($children);
        }

        $listItem .= '</li>';

        return $listItem;
    }

    public static function getList()
    {
        $categories = self::all();
        $lists = '';
        foreach ($categories as $category) {
            if ($category->parent_id === null) {
                $lists .= self::renderOption($category);
            }
        }
        return $lists;
    }

    public static function renderOption($node)
    {
        $list = '<option value="' . $node->id . '">' . self::dash(self::$depth) . ' '.$node->name . '</option>';
        $children = self::where('parent_id', '=', $node->id)->get();
        $count = $children->count();
        if ($count > 0) {
            self::$depth++;
            foreach ($children as $child) {
                $list .= self::renderOption($child);
            }
            self::$depth--;
        }
        return $list;
    }

    private static function dash($depth)
    {
        $dash = '';
        for ($i = 1; $i <= $depth; $i++) {
            $dash .= ' - ';
        }
        return $dash;
    }
}

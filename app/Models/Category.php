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
        $tree = '<div class="dd" id="nestable2">' . self::renderTree($categories) . '</div>';
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
                    <div class="dd-handle">' . $node->name . '</div>';

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

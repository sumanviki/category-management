<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'order',
        'is_active',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('order');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function getTreeAttribute()
    {
        return $this->buildTree($this->allChildren);
    }

    private function buildTree($categories, $level = 0)
    {
        $tree = [];
        $prefix = str_repeat('-- ', $level);
        
        foreach ($categories as $category) {
            $tree[] = [
                'id' => $category->id,
                'name' => $prefix . $category->name,
                'level' => $level
            ];
            $tree = array_merge($tree, $this->buildTree($category->allChildren, $level + 1));
        }
        
        return $tree;
    }

    public static function getTreeView()
    {
        $categories = self::whereNull('parent_id')
            ->with('allChildren')
            ->orderBy('order')
            ->get();
        
        $tree = [];
        foreach ($categories as $category) {
            $tree = array_merge($tree, (new self)->buildTree([$category]));
        }
        
        return $tree;
    }
}
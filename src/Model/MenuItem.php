<?php

namespace CodexShaper\Menu\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $fillable = [
        'title', 'slug', 'order', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order','asc');
    }

    // recursive, loads all descendants
    public function childrens()
    {
        return $this->children()->with('childrens');
    }
}

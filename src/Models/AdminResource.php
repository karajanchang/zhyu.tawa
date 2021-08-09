<?php

namespace Tawa\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminResource extends Model
{
    use HasFactory;

    protected $table = 'admin_resources';

    protected $guarded  = [];

    public function permissions()
    {
        return $this->hasMany(AdminPermission::class, 'resource_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(AdminResource::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parent()
    {
        return $this->belongsTo(AdminResource::class, 'parent_id');
    }

    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }
}

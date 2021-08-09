<?php

namespace Tawa\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class AdminPermission extends Permission
{
    use HasFactory;

    protected $table = 'admin_permissions';

    protected $guarded  = [];

    public function resource()
    {
        return $this->belongsTo(AdminResource::class, 'id', 'resource_id');
    }
}

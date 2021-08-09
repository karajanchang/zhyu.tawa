<?php

namespace Tawa\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;


class AdminRole extends Role
{
    use HasFactory;

    protected $table = 'admin_roles';

    protected $guarded  = [];
}

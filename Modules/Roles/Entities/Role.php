<?php

namespace Modules\Roles\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'create',
        'read',
        'update',
        'delete'

    ];
    
    protected static function newFactory()
    {
        return \Modules\Roles\Database\factories\RoleFactory::new();
    }
}

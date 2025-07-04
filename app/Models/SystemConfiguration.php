<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemConfiguration extends Model
{
    /** @use HasFactory<\Database\Factories\SystemConfigurationFactory> */
    use HasFactory;
    protected $table = 'system_configurations';

    protected $fillable = [
        'key',
        'value',
    ];
}

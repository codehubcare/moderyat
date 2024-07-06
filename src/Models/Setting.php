<?php

namespace Codehubcare\Moderyat\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded = [];

    public function getTypes(): array
    {
        return [
            'string',
            'number',
            'boolean',
            'array',
            'json',
            'file',
            'image',
        ];
    }
}

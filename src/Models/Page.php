<?php

namespace Codehubcare\Moderyat\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function scopeMain($query)
    {
        return $query->whereParentId(0);
    }
}

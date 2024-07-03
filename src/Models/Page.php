<?php

namespace Codehubcare\Moderyat\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Scope
     */
    public function scopeMain($query)
    {
        return $query->whereParentId(0);
    }

    public function scopePublished($query)
    {
        return $query->whereIsPublished(true);
    }

    /**
     * Validations
     */
    public function isPublished()
    {
        return $this->is_published;
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        // Registering an "updated" event handler
        static::updated(function () {
            $this->slug = Str::slug($this->title);
            $this->save();
        });
    }
}

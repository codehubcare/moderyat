<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Codehubcare\Moderyat\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Publishable;

    protected $table = 'pages';

    protected $guarded = [];

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

    // Relationships
    public function parent()
    {
        return Page::whereId($this->parent_id)->find();
    }

    /**
     * Retrieve the sub-pages of this page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The sub-pages of this page.
     */
    public function subPages()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

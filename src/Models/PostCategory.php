<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Codehubcare\Moderyat\Traits\Fileable;
use Codehubcare\Moderyat\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use Fileable;
    use Publishable;

    protected $table = 'post_categories';

    protected $guarded = [];

    /**
     * Scope
     */
    public function scopeMain($query)
    {
        return $query->whereParentId(0);
    }

    // Relationships
    public function parent()
    {
        return Page::whereId($this->parent_id)->find();
    }

    /**
     * Retrieve the sub-post-categories of this post category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(PostCategory::class, 'parent_id', 'id');
    }

    public function hasSubCategories()
    {
        return $this->subCategories()->count() > 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

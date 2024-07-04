<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Codehubcare\Moderyat\Traits\Publishable;

class PostCategory extends Model
{
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

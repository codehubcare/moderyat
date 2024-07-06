<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Codehubcare\Moderyat\Traits\Fileable;
use Codehubcare\Moderyat\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Fileable;
    use Publishable;

    protected $table = 'posts';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}

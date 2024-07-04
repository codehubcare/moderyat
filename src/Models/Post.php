<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Codehubcare\Moderyat\Traits\Publishable;

class Post extends Model
{
    use Publishable;

    protected $table = 'posts';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

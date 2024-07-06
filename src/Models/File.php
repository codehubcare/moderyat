<?php

namespace Codehubcare\Moderyat\Models;

use App\Models\User;
use Codehubcare\Moderyat\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Fileable;

    protected $table = 'files';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

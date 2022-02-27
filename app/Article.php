<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    //
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}

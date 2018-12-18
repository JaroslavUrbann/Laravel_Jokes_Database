<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $table = "jokes";

    protected $fillable = [
        "text", "users_id", "category_id"
    ];

    protected $dates = [
        "created_at", "updated_at"
    ];
}

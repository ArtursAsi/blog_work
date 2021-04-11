<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'picture',
        'active',
        'publish_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActivePosts($query)
    {

        return $query->where('active','!=',false);
    }


}

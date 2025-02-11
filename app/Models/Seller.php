<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'phone',
        'address',
        'city',
        'password',
        'profile_photo_path',
        'salary',
        'is_active',
        'status',
        'seller_status',
        'dob',
        'email_verified_at',
        'meta',
        'user_id'
    ];

    //relationship one to one to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship with post with pivot table post_seller
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_seller', 'seller_id', 'post_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //relationship with seller with pivot table post_seller
    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'post_seller', 'post_id', 'seller_id');
    }
}

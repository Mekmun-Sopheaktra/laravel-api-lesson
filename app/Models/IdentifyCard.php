<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentifyCard extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    //get the image path
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}

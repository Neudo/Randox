<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Plan extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'image',
        'content',
        'publied',
        'stripe_id',
        'author'
    ];

}

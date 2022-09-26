<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegUnit extends Model
{
    protected $fillable = [
        'user_id',
        'unit_id',
        'programme',
        'unit',
        'description',
    ];

    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }












}

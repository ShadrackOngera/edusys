<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme',
        'unit',
        'description',
        'user_id',
    ];

    public function regUnit()
    {
        return $this->hasOne(RegUnit::class);
    }
}

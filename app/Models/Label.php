<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['title', 'color'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}

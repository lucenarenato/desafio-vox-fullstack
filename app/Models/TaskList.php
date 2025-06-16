<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = 'lists';
    protected $guarded = [];

    public function cards()
    {
        return $this->hasMany(Card::class, 'list_id')->orderBy('card_order');
    }
}

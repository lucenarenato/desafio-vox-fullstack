<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'lists';

    protected $fillable = [
        'list_order',
        'createdate',
        'db_date',
        'title',
        'list_timestamp'
    ];

    public function cards()
    {
        return $this->hasMany(Card::class, 'list_id_fk');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'title',
        'description',
        'label_title',
        'label_color',
        'list_title',
        'card_order',
        'list_id',
        'list_id_fk',
        'label_id' => 3,
        'due_date',
        'card_timestamp',
        'archive_class',
        'create_date',
        'card_attachment',
        'labels_string',
        'checklist_string',
        'is_complete'
    ];

    public function list()
    {
        return $this->belongsTo(ListModel::class, 'list_id_fk');
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }
}

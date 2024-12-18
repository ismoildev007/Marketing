<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_id',
        'file_name',
        'file_path',
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id');
    }
}

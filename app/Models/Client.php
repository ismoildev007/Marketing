<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_of_activity',
        'phone_number',
        'name',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['portfolio_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Portfolio::class);
    }
}

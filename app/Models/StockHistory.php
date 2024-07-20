<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'flavor_id', 'change', 'type',
    ];

    public function flavor()
    {
        return $this->belongsTo(Flavor::class);
    }
}

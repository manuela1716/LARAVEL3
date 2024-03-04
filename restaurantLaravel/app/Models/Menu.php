<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomMenu',
        'prixMenu',
        'imageMenu',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateReserv',
        'heureReserv',
        'nbrePer',
        'client_id',
        'table_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

}

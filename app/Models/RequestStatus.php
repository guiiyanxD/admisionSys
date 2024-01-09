<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    use HasFactory;

    protected $table = 'request_status';
    protected $fillable =
        [
            'id_request',
            'id_status',
            'detail',
            'registrar',
            'date'
        ];
}

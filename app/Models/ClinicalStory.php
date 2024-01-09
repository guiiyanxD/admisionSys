<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalStory extends Model
{
    use HasFactory;

    protected $table = 'clinical_stories_request';
//    protected $dateFormat = 'U';
    protected $fillable = [
        'name',
        'holder_mat',
        'beneficiary_mat',
        'bed_number',
        'registrar',
        'note',
    ];
}

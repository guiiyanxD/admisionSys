<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalStoryRequestStatus extends Model
{
    use HasFactory;

    protected $table = 'clinical_stories_request_status';
    protected $fillable =
        [
            'name','description'
        ];


}

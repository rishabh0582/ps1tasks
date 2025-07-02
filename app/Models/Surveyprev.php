<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyprev extends Model
{
    use HasFactory;
    protected $table = 'surveyprev';

    protected $fillable = [
        'question',
        'strongly_disagree',
        'disagree',
        'neutral',
        'agree',
        'strongly_agree',
    ];
}

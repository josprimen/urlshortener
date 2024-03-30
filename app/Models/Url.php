<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use SoftDeletes;

    protected $table = 'urls';


    protected $fillable = [
        'url_original',
        'url_corta',
    ];

    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use awwsat\laravelVisits;

class ShortenedLink extends Model
{
    protected $fillable = [

        'code', 'link'

    ];

    public function visited()
    {
        return visits($this);
    }
}

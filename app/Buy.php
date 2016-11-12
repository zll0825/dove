<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $table = 'T_U_BUY';
    protected $primaryKey = 'BuyID';

    protected $fillable = ['Status'];
}

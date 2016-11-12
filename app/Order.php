<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'T_U_ORDER';
    protected $primaryKey = 'OrderID';

    protected $fillable = ['PayFlag'];
}

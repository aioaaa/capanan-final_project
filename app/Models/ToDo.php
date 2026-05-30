<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    //
    protected $table = 'todos';
    protected $fillable = [
        'user_id',
        'product_name',
        'category',
        'stock',
        'price'
    ];
}

<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    //
    protected $table = 'tokens';

    protected $fillable = [
    'CATEGORY',
     'PRICE',
      'PERIOD'
];

public function token(){
    return $this->belongsTo(User::class);
}
}

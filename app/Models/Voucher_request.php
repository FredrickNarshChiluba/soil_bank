<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher_request extends Model
{
    //
    protected $table = 'voucher_requests';

    /**
     * @var array
     */
    protected $fillable = [
        'PERIOD',
         'price',
        'created_date',
        'user_id',
        'REASON',
    ];

    public function land(){
        return $this->belongsTo(Land::class);
    }
}


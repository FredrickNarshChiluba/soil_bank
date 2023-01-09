<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copouns extends Model
{
     protected $table = 'copoun';

    /**
     * @var array
     */
    protected $fillable = [
    	'user_id',
        'code',
        'total_time',
        'expiry_time',
        'usage_start_time',
        'period'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
     protected $table = 'company_infos';

    /**
     * @var array
     */
    protected $fillable = [
    	'admin_id',
        'name',
        'email',
        'Company',
        'CompanyDescription',
        'Type',
        'Role',
        'date'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}

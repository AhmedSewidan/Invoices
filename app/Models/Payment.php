<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = array('invoice_id ', 'payment_date', 'payment_method');

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

}
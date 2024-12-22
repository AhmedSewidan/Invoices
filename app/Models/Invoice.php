<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model 
{

    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'invoices';
    public $timestamps = true;


    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id', 'invoice_number', 'due_date', 'description', 'discount', 'tax', 'amount', 'status');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    protected $hidden = ['updated_at', 'created_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'cust_id';
    public $timestamps = false;

    /**
     * Get the status associated with the customer
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'stat_id', 'stat_id');
    }
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'create_date',
        'cust_last_name',
        'cust_first_name',
        'cust_middle_name',
        'ca_id',
        'stat_id',
        'land_mark',
        'stat_id',
        'c_type',
        'resolution_no'
    ];

    public function address()
    {
        return $this->belongsTo(ConsumerAddress::class, 'ca_id', 'ca_id');
    }
}

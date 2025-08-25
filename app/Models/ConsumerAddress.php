<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerAddress extends Model
{
    protected $table = 'consumer_address';
    protected $primaryKey = 'ca_id';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'p_id',
        'b_id',
        't_id',
        'prov_id',
        'stat_id'
    ];
}

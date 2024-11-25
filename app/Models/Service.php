<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'servicios';
    public $timestamps = false;
    protected $primaryKey = 'servicio';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
    'identificacion', 
    'servicio', 
    'fechaInicio', 
    'ultimaFacturacion', 
    'ultimoPago'
    ];

}

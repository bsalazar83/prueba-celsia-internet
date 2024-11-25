<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;
    protected $primaryKey = 'identificacion';
    public $incrementing = false;
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'tipoIdentificacion',
        'fechaNacimiento',
        'numeroCelular',
        'correoElectronico'
        ];

    protected $casts = [
        'fechaNacimiento' => 'date',
    ];

    public function getFormattedFechaNacimientoAttribute()
    {
        return $this->fechaNacimiento ? $this->fechaNacimiento->format('d-m-Y') : null;
    }

    public function servicios()
    {
        return $this->hasMany(Service::class, 'identificacion', 'identificacion');
    }
}

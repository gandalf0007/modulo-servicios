<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

use Soft\Transaction;


class Servicios_item extends Model
{
    //
	protected $fillable = [
        'id',
        'codigo',
        'descripcion',
        'precioventa',
        'habilitado',
        'imagen',
        'filename',
    ];



     public function servicio()
    {
      //una producto corresponde a una servicio
        return $this->belongsTo(servicio::class);
    }

     public function transaccion()
    {
      //una producto corresponde a una servicio
        return $this->belongsTo(Transaction::class);
    }



}

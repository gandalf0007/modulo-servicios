<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Accesoemail;
use Soft\Accesoweb;
use Soft\Servicios_item;
use Soft\User;
use Soft\Transaction;

class Servicio extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'producto_id',
        'transaction_id',
        'accesoemail_id',
        'accesoweb_id',
        'producto_id',
        'status',
        'tipo',
        'renovar',
        'inicio',
        'fin',

    ];

     protected $dates = [
            'inicio',
            'fin',
                
    ];



        public function accesoemail()
    {
      //una servicio corresponde a uno AccesoEmail
         return $this->belongsTo(Accesoemail::class);
    }


    public function accesoweb()
    {
      //una servicio corresponde a un AccesoWeb 
        return $this->belongsTo(Accesoweb::class);
    }


    public function item()
    {
        //una servicio corresponde a un item
        return $this->belongsTo(Servicios_item::class,'servicios_item_id');
    }
     public function user()
    {
      //una servicio corresponde a un usuario 
        return $this->belongsTo(User::class);
    }


     public function transaccion()
    {
      //una servicio corresponde a una transaccion 
        return $this->belongsTo(Transaction::class);
    }



}

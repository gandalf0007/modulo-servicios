<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Illuminate\Notifications\notify;
use Illuminate\Notifications\DatabaseNotification;


use Soft\Notifications\ServicioActivo;


use Soft\Servicio;
use Soft\Servicios_item;
use Soft\Accesoemail;
use Soft\Accesoweb;
use Soft\User;

use Notification;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Auth;
use Flash;
use Toastr;
use Carbon\Carbon;
use Exception;
use MP;
use Hashids\Hashids;
use Debugbar;

class ServiciosController extends AdminBaseController
{

   

    public function index()
    {
        $servicios = Servicio::orderBy('id','desc')->paginate(10);
        $FechaActual = Carbon::now();
        

         return view ('admin.servicios.index',compact('servicios','FechaActual'));
    }




    public function CambiarStatus(Request $Request , $id){
  
            $servicio=Servicio::find($id);
            $servicio->status=$Request['estado'];
            $servicio->save();

             //generamos una notificacion cuando se activa o desactiva un servicio
            $user = User::find($servicio->user_id);
            if ($Request['estado'] == "Activado") {
                Notification::send($user ,new ServicioActivo($servicio));
            }else{
                Notification::send($user ,new ServicioActivo($servicio));
            }


        return Redirect::back();

    }



      public function accesoWebStore(Request $request,$id)
    {
       

        $servicio = Servicio::find($id);
        



            $accesoWeb = Accesoweb::create([
            'user' =>$request['user'],
            'password' =>$request['password'],
            'url'=>$request['url'],
            'servicio_id'=>$request['servicio'],
            ]);


            if ($servicio->tipo != "dominio") {
           
            $accesoEmail = Accesoemail::create([
            'email1' =>$request['email1'],
            'password1' =>$request['password1'],
            'email2' =>$request['email2'],
            'password2' =>$request['password2'],
            'email3' =>$request['email3'],
            'password3' =>$request['password3'],
            'url'=>$request['urlemail'],
            'servicio_id'=>$request['servicio'],
            ]);
            
            $servicio->accesoemail_id = $accesoEmail->id;
             }


        $servicio->renovar = $request['renovar'];
        $servicio->accesoweb_id = $accesoWeb->id;
        
        

   
        //si es mensual sumo 29 dias
        if ($request['fin'] == "mensual") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(30);
             $servicio->fin = $FechaFin;
             $servicio->save();
        }

        //si es mensual sumo 59 dias
        if ($request['fin'] == "trimestral") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(90);
             $servicio->fin = $FechaFin->toDateString();
             $servicio->save();
        }

        //si es mensual sumo 364 dias
        if ($request['fin'] == "anual") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(365);
             $servicio->fin = $FechaFin->toDateString();
             $servicio->save();
        }

        Alert::success('Mensaje existoso', 'Creado');
        return redirect::back();

    }









    public function accesoWebUpdate(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->renovar = $request['renovar'];

     
        //si es mensual sumo 29 dias
        if ($request['fin'] == "mensual") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(30);
             $servicio->fin = $FechaFin;
             $servicio->save();
        }

        //si es mensual sumo 59 dias
        if ($request['fin'] == "trimestral") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(90);
             $servicio->fin = $FechaFin->toDateString();
             $servicio->save();
        }

        //si es mensual sumo 364 dias
        if ($request['fin'] == "anual") {
             $FechaInicio = Carbon::parse($request['inicio'].' 23:00:00.123456');
             $servicio->inicio = $FechaInicio;

             $FechaFin = $FechaInicio->addDay(365);
             $servicio->fin = $FechaFin->toDateString();
             $servicio->save();
        }
  

        $accesoEmail = Accesoemail::where('servicio_id','=',$id)->first();
        if (!empty($accesoEmail)) {
        $accesoEmail->email1 = $request['email1'];
        $accesoEmail->password1 = $request['password1'];
        $accesoEmail->email2 = $request['email2'];
        $accesoEmail->password2 = $request['password2'];
        $accesoEmail->email3 = $request['email3'];
        $accesoEmail->password3 = $request['password3'];
        $accesoEmail->url = $request['urlemail'];
        $accesoEmail->save();
        }
       

        $accesoWeb = Accesoweb::where('servicio_id','=',$id)->first();
        if (!empty($accesoWeb)) {
        $accesoWeb->user = $request['user'];
        $accesoWeb->password = $request['password'];
        $accesoWeb->url = $request['url'];
        $accesoWeb->save();
        }
        

         Alert::success('Mensaje existoso', 'Creado');
        return redirect::back();
      
    }









    public function MisServicios()
    {
  
        //muestra los servicios que estan pagados
        $servicios= Servicio::where('user_id','=',Auth::user()->id)->orderBy('id','desc')->paginate(10);

        //paginamos
        $FechaActual = Carbon::now();
        return view('admin.usuario-panel.mis-servicios.index', compact('servicios','FechaActual'));
    }











    public function ItemShow()
    {
        //muestra los servicios que estan pagados
        $serviciosItems= Servicios_item::all();
        return view('admin.servicios.items.index', compact('serviciosItems'));
    }



    public function ItemStore(Request $request)
    {   


    //pregunto si la imagen no es vacia y guado en $filename , caso contrario guardo null
        if(!empty($request->hasFile('imagen'))){
          $imagen = $request->file('imagen');

            $filename=time() . '.' . $imagen->getClientOriginalExtension();

            //esto es para q funcione en local 
            image::make($imagen->getRealPath())->save('storage/servicios/'. $filename);
          
             $ruta = 'storage/servicios/'. $filename;


        }elseif(empty($request->hasFile('imagen'))){

            $filename = "default.jpg";
            $ruta = "storage/servicios/default.jpg"; 
        }




        $item = new Servicios_item;
        $item->codigo = $request['codigo'];
        $item->descripcion = $request['descripcion'];
        $item->precioventa = $request['precioventa'];

        if ($request['habilitado'] == "on") {
            $item->habilitado = 1;
        }else{
            $item->habilitado = 0;
        }
        
        $item->imagen = $ruta;
        $item->filename = $filename;
        $item->save();


        Alert::success('Mensaje existoso', 'Item Creado');
        return redirect::back();
    }




    public function ItemUpdate(Request $request,$id)
    {   

        $item =  Servicios_item::find($id);


          //pregunto si la imagen no es vacia 
        if(!empty($request->hasFile('imagen'))){

            //eliminamos la imagen anterior    
            if($item->filename != "default.jpg"){
             \Storage::disk('servicios')->delete($item->filename);
             
            }

            $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
        
            //esto es para q funcione en local 
            //image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
            image::make($imagen->getRealPath())->save('storage/servicios/'. $filename);
            $ruta = 'storage/servicios/'. $filename;
            $item->imagen = $ruta;
            $item->filename = $filename;
        }



        //si la imagen es vacia pero ya hay una guardada que la mantegna
        if(empty($request->hasFile('imagen')) or $item->filename != "default.jpg"){
          $ruta = $item->imagen;
          $filename = $item->filename;
        }

   


        $item->codigo = $request['codigo'];
        $item->descripcion = $request['descripcion'];
        $item->precioventa = $request['precioventa'];

        if ($request['habilitado'] == "on") {
            $item->habilitado = 1;
        }else{
            $item->habilitado = 0;
        }
        
        $item->imagen = $ruta;
        $item->filename = $filename;
        $item->save();


        Alert::success('Mensaje existoso', 'Item Modificado');




        return redirect::back();
    }




    public function ItemDelete()
    {
        //muestra los servicios que estan pagados
        $serviciosItems= Servicios_item::all();
        return view('admin.servicios.items.index', compact('serviciosItems'));
    }

}

@extends('layouts.admin-pro')
@section('content')
@role('administrador')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->






           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-server font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Servicios</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="#">Servicios</a></li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

@include('alerts.request')
@include('alerts.success')




        <h4 class="card-title">
          

        </h4>

  
  <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link active"  href="{{ url('servicios') }}" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Servicios</span></a> </li>
          
          <li class="nav-item"> <a class="nav-link"  href="{{ url('servicios-items') }}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Items</span></a> </li>

      </ul>





  <!--buscador-->
{!!Form::open(['url'=>'usuario', 'method'=>'GET' , 'class'=>' form-group  navbar-form' , 'role'=>'Search'])!!}


<div class="row ">

<div class=" col-md-3 m-t-20">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      <input type="text" name="fecha_inicio" class="form-control mydatepicker" id="datepicker" aria-describedby="basic-addon3" placeholder="Fecha de Inicio">
  </div>
   </div>

   <div class=" col-md-3 m-t-20">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      <input type="text" name="fecha_final" class="form-control mydatepicker" id="datepicker2"  placeholder="Fecha de Fin">
  </div>
   </div>

   <div class=" col-md-3 m-t-20">
      <button type="submit" class=" btn btn-success "> BUSCAR </button>
   </div>
  </div>
{!!Form::close()!!}
 <!--endbuscador-->




      <h6 class="card-subtitle"></h6>
      <div class="table-responsive ">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
    <thead>  
    <th>Imagen</th>
    <th>Codigo</td>
    <th>Descripcion</th>
    <th>usuario</th>
    <th>Inicio</th>
    <th>Vencimiento</th>
    <th>Estado</th>
    <th>Auto Renovar</th>
    <th >Operaciones</th>
    </thead>
    <!--solo muestro las transacciones con el id de sa venta-->
   
    @foreach($servicios as $servicio)

    <tbody>
   <td> <img src="{{ $servicio->item->imagen }}" height="50" width="50"> </td>
   <td>{{ $servicio->item->codigo }}</td>
   <td>{{ $servicio->item->descripcion }}</td>
   <td>{{ $servicio->user->email }}</td>
   <td>@if($servicio->inicio != null){{ $servicio->inicio->format('d/m/y')  }} @endif</td>
   <td>

 

    @if($FechaActual->diffInDays($servicio->fin)>3)
     <span class="label bg-dark bg-font-dark" id="clock-{{ $servicio->id }}" ></span>
    @else
    <span class="label bg-danger bg-font-danger" id="clock-{{ $servicio->id }}" ></span>
    @endif
    <input type="text" hidden value="{{ $servicio->fin}}" name="" data-countdown="{{ $servicio->id }}" id="vencimiento-{{$servicio->id}}">
  
 </td>




  <td>
     @if ($servicio -> status == "Activado")
      <a href="#status-{{ $servicio->id }}" data-toggle="modal" ><span class="label label-success">{{ $servicio -> status}}</span></a>

      @elseif ($servicio -> status == "Desactivado")
      <a href="#status-{{ $servicio->id }}" data-toggle="modal" ><span class="label label-warning">{{ $servicio -> status}}</span></a>
      @endif
  </td>

  <td>
     @if ($servicio -> renovar == 1)
    <div class="text-center"><i class="fa fa-check"></i></div>

      @elseif ($servicio -> renovar == 0)
    <div class="text-center"><i class="fa fa-close"></i></div>
      @endif
  </td>
  

  <td>
    @if($servicio->tipo != "dominio")
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datos-acceso-{{ $servicio -> id}}"><i class="fa fa-key"> Datos de Acceso</i></button>
    @else
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datos-acceso-dominio-{{ $servicio -> id}}"><i class="fa fa-key"> Datos de Acceso</i></button>
    @endif
  </td>

  </tbody>
  
  @endforeach

                        </table>


<!--para renderizar la paginacion para boostrap 4-->
<div class="pull-right">
{{$servicios->render("pagination::bootstrap-4")}}
</div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>









@include('admin.servicios.modal.status-servicio')
@include('admin.servicios.modal.datos-acceso')
@include('admin.servicios.modal.datos-acceso-dominio')

@section('datepicker')
<!-- bootstrap datepicker -->
 {!!Html::script('admin/adminpro/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')!!} 

<script>
   jQuery('.mydatepicker, #datepicker').datepicker();
   jQuery('.mydatepicker, #datepicker2').datepicker();
   jQuery('.mydatepicker, #datepicker3').datepicker();
   jQuery('.mydatepicker, #datepicker4').datepicker();
</script>

@stop




@section('mis-scripts')
<script>

$('[data-countdown]').each(function() {

   IdServicio = $(this).data('countdown'); 
   var vencimiento=$("#vencimiento-"+IdServicio).val();

   $('#clock-'+IdServicio).countdown(vencimiento, function(event) {
  $(this).html(event.strftime('%D Dias  '));
});


});
  
</script>
@stop

@endrole
@endsection

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

         <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-item"><i  class="fa fa-plus fa-lg"> </i></button>


        </h4>

  
  <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link "  href="{{ url('servicios') }}" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Servicios</span></a> </li>
          
          <li class="nav-item"> <a class="nav-link active"  href="{{ url('servicios-items') }}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Items</span></a> </li>

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
    <th class="col-md-3">Imagen</th>
    <th>Codigo</td>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Status</th>
    <th >Operaciones</th>
    </thead>
    <!--solo muestro las transacciones con el id de sa venta-->
   
    @foreach($serviciosItems as $serviciosItem)

    <tbody>

      <td>
                <div class="col-md-6 el-element-overlay">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img  class="image-responsive" src="{{$serviciosItem->imagen}}" >
                                <div class="el-overlay">
                                     <ul class="el-info">
                                      <li><a class="btn default btn-outline image-popup-vertical-fit"  href="{{$serviciosItem->imagen}}"><i class="icon-magnifier"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
</td>

   <td>{{ $serviciosItem->codigo }}</td>
   <td>{{ $serviciosItem->descripcion }}</td>
   <td>{{ $serviciosItem->precioventa }}</td>


  <td>
     @if ($serviciosItem->habilitado == 1)
      <span class="label label-success">Activado</span>

      @elseif ($serviciosItem ->habilitado == 0)
    <span class="label label-warning">Desactivado</span>
      @endif
  </td>
  
  <td>
    <a data-toggle="modal" data-target="#edit-{{ $serviciosItem->id }}" class="btn btn-primary fa fa-edit" href=""></a>
  </td>

  </tbody>
  
  @endforeach

                        </table>






                                </div>
                            </div>
                        </div>
                    </div>
                </div>





@include('admin.servicios.items.modal.create')
@include('admin.servicios.items.modal.edit')


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
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

<!--contador para el text area-->
<script>
      var text_max = 200;
$('#count_message').html(text_max + ' remaining');

$('.text').keyup(function() {
  var text_length = $('.text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_remaining + ' remaining');
});
    </script>
@stop


@endrole
@endsection

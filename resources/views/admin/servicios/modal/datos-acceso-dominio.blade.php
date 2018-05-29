@foreach($servicios as $servicio)
<div class="modal fade " id="datos-acceso-dominio-{{ $servicio->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>


@if (empty($servicio->AccesoWeb->id))
 

<div class="modal-body">
  {!!Form::open(['url'=>['acceso-web-store', $servicio->id], 'method'=>'POST' ])!!}
  <input type="text" name="servicio" value="{{$servicio->id}}" hidden>
@include('admin.servicios.forms.datos-acceso-dominio');
</div>
<div class="modal-footer">
  {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   {!!Form::close()!!}
</div>


@else


<div class="modal-body">
  {{ Form::model($servicio, array('url' => array('acceso-web-update', $servicio->id), 'method' => 'PUT', 'files'=>True)) }}
  <input type="text" name="servicio" value="{{$servicio->id}}" hidden>
@include('admin.servicios.forms.edit-datos-acceso-dominio');
</div>
<div class="modal-footer">
  {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
   {!!Form::close()!!}
</div>


@endif








     </div>
   </div>
 </div>
@endforeach

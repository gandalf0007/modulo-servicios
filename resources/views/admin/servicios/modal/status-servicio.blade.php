@foreach($servicios as $servicio)
<div class="modal fade " id="status-{{ $servicio->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Cambiar Status del Servicio</h4>
      </div>



<div class="container">
  {!!Form::open(['url'=>['servicio-cambiar-status',$servicio->id], 'method'=>'POST' ])!!}

<div class="radio-list form-group">
<label class=" custom-control custom-radio">
	<span class="label label-success"><h3>{!!Form::label('Activado', 'Activado') !!}</h3></span>
	<input name="estado" 	type="radio" value="Activado"  class="custom-control-input" >
   <span class="custom-control-indicator"></span>
</label>

<label class=" custom-control custom-radio">
	<span class="label label-warning"><h3>{!!Form::label('Desactivado', 'Desactivado') !!}</h3></span>
	<input name="estado" type="radio" value="Desactivado"  class="custom-control-input">
   <span class="custom-control-indicator"></span>
</label>
</div>



<br><br>

</div>

	
         <div class="modal-footer">
          {!!Form::submit('Cambiar Estado',['class'=>'btn btn-primary'])!!}
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         </div>


{!!Form::close()!!}
     </div>
   </div>
 </div>
@endforeach

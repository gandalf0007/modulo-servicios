@foreach($serviciosItems as $serviciosItem)
<div class="modal fade" id="edit-{{ $serviciosItem->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Editar Item {{$serviciosItem->descripcion}}</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{{ Form::model($serviciosItem, array('url' => array('servicios-items-update', $serviciosItem->id), 'method' => 'PUT', 'files'=>True)) }}
<div class="modal-body">   
@include('admin.servicios.items.forms.edit')
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-success">Editar</button>
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach
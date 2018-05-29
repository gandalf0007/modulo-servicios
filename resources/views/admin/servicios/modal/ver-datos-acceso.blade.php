@foreach($servicios as $servicio)
<div class="modal fade " id="datos-acceso-{{ $servicio->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>


@if (!empty($servicio->AccesoEmail->id) or !empty($servicio->AccesoWeb->id))
 

<div class="modal-body">
@include('admin.servicios.forms.ver-datos-acceso');
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>


@else

<h1>no se cargaron sus datos ....</h1>


@endif


     </div>
   </div>
 </div>
@endforeach

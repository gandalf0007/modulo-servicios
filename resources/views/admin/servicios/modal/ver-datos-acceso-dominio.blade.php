@foreach($servicios as $servicio)
<div class="modal fade " id="datos-acceso-dominio-{{ $servicio->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>




<div class="modal-body">
@if (!empty($servicio->AccesoWeb->id))
@include('admin.servicios.forms.ver-datos-acceso-dominio')
@endif
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>





     </div>
   </div>
 </div>
@endforeach

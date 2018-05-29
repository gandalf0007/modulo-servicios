
<div class="modal  fade" id="crear-item" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear Nuevo Item </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>

{!!Form::open(['url'=>['servicios-items-store'],'method'=>'POST' , 'files'=>True])!!}

<div class="modal-body">   
@include('admin.servicios.items.forms.create')
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-primary">Crear</button>
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>

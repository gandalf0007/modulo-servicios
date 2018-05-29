<div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Ingrese los Datos del Item</div>
      <div class="card-body">
        <div class="row">

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group">
                  <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                  {!!Form::text('codigo',null,['class'=>'form-control ','placeholder'=>'ingrese el Codigo'])!!}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group">
                  <div class="input-group-addon"><i class="mdi mdi-message-reply-text"></i></div>
                  {!!Form::text('descripcion',null,['class'=>'form-control ','placeholder'=>'ingrese la Descripcion'])!!}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group">
                  <div class="input-group-addon"><i class="mdi mdi-square-inc-cash"></i></div>
                  {!!Form::text('precioventa',null,['class'=>'form-control ','placeholder'=>'Precio de Venta'])!!}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <input id="basic_checkbox_1"  type="checkbox" name="habilitado2">
        <label for="basic_checkbox_1">Habilitado</label>
            </div>

        </div>
      </div>
  </div>




<div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Cargar Imagen del Item</h4></div>
        <div class="card-body">
          <div class="row">
            <div class=" col-md-3"></div>

             <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="imagen">
             </div>

             <div class="c col-md-3"></div>
           </div>
         </div>
     </div>





          


                







<div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Dominio</h4></div>
  <div class="card-body">

<div class="row">

<div class="form-group col-xs-12 col-sm-12 col-md-12">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-link"> URL: </i></button></span>
 <input type="text" value="{{$servicio->AccesoWeb->url}}"  class="form-control" name="url">
</div>
</div>

</div>
</div>
 </div>




 <div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Fecha del Periodo</h4></div>
  <div class="card-body">

<div class="row">

  <div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      <input type="text" name="inicio" value="{{$servicio->inicio->format('m/d/y') }}" class="form-control mydatepicker" id="datepicker" aria-describedby="basic-addon3" placeholder="Fecha de Inicio">
  </div>
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      {!! Form::select('fin', config('options.periodos'),'', array('class' => 'form-control')) !!}
  </div>
</div>

</div>
</div>
 </div>

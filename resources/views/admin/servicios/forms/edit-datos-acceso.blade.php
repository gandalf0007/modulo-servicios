<div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Datos de acceso web</h4></div>
  <div class="card-body">

<div class="row">

  <div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
 <span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-user"> Usuario: </i></button></span>
 <input type="text" value="{{$servicio->AccesoWeb->user}}"  class="form-control" name="user">
</div>
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
  <span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-unlock-alt"> Password: </i></button></span>
 <input type="text" value="{{$servicio->AccesoWeb->password}}"  class="form-control" name="password">
</div>
</div>

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
      <h4 class="m-b-0 text-white">Datos de acceso Email</h4></div>
  <div class="card-body">

<div class="row">

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
 	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-envelope-open"> Email 1: </i></button></span>
	 <input type="text" value="{{$servicio->accesoemail->email1}}"  class="form-control" name="email1">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa  fa-unlock-alt"> Password 1: </i></button></span>
 <input type="text" value="{{$servicio->accesoemail->password1}}"  class="form-control" name="password1">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-envelope-open"> Email 2: </i></button></span>
	<input type="text" value="{{$servicio->accesoemail->email2}}"  class="form-control" name="email2">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa  fa-unlock-alt"> Password 2: </i></button></span>
	<input type="text" value="{{$servicio->accesoemail->password2}}"  class="form-control" name="password2">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-envelope-open"> Email 3: </i></button></span>
	<input type="text" value="{{$servicio->accesoemail->email3}}"  class="form-control" name="email3">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
<div class="input-group input-icon right ">
	<span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa  fa-unlock-alt"> Password 3: </i></button></span>
	<input type="text" value="{{$servicio->accesoemail->password3}}"  class="form-control" name="password3">
</div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12">
<div class="input-group input-icon right ">
 <span class="input-group-btn"><button class="btn btn-info" type="button">  <i class="fa fa-link"> URL Email: </i></button></span>
	<input type="text" value="{{$servicio->accesoemail->url}}"  class="form-control" name="urlemail">
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






 <div class="card card-outline-info">
  <div class="card-header">
      <h4 class="m-b-0 text-white">Auto Renovacion</h4></div>
  <div class="card-body">

<div class="row radio-list form-group">


  <div class="form-group col-xs-12 col-sm-12 col-md-6">
<label class=" custom-control custom-radio">
	<span class="label "><h3><div class="text-center"><i class="fa fa-check"></i></div></h3></span>
	<input name="renovar" 	type="radio" value="1"  class="custom-control-input" @if($servicio->renovar == 1) checked @endif >

   <span class="custom-control-indicator"></span>
</label>
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-6">
<label class=" custom-control custom-radio">
	<span class="label "><h3><div class="text-center"><i class="fa fa-close"></i></div></h3></span>
	<input name="renovar" type="radio" value="0"  class="custom-control-input" @if($servicio->renovar == 0) checked @endif >
   <span class="custom-control-indicator"></span>
</label>
</div>

</div>
</div>
 </div>









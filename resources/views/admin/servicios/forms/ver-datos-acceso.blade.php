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





@if (!empty($servicio->AccesoEmail->id))
	{{-- expr --}}


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


@endif


</div>
</div>
 </div>

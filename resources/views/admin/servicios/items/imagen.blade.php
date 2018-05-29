@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')





            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="icon-user font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion del Portafolios/Cargar Imagen</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item "><a href="{!! URL::to('/portafolio-ver') !!}">Portafolios</a></li>
                            <li class="breadcrumb-item active"><a href="#">Cargar Imagen {{$portafolio->nombre}}</a></li>
                        </ol>
                    </div>

                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

@include('alerts.request')
@include('alerts.success')




        <h4 class="card-title">
           </h4>

        

      <h6 class="card-subtitle"></h6>

       {!!Form::model($portafolio,['route'=>['PortafolioImagen.uploadFiles',$portafolio->id],'method'=>'POST' , 'files'=>true , 'id' => 'my-dropzone' , 'class' => 'dropzone'])!!}
    <div class="dz-message" style="height:200px;">
                        Drop your files here
    </div>
    <div class="dropzone-previews"></div>
    <button type="submit" class="btn btn-success" id="submit">Save</button>
{!! Form::close() !!}



      <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" cellspacing="0" width="100%">
             <thead>
      <tr>
    <th>Imagen</th>
    <th>Portada</th>
    <th>Eliminar</th>
      </tr>
    </thead>
    @foreach($imagens as $imagen)
    <tbody>
   <td><i class="icon fa fa-fw"><img src="storage/portafolios/{{$portafolio->nombre}}/{{$imagen->filename}}"   class="img-responsive thumbnail"></i></td>  

  <td></td>

<td>{!! Form::open(['method' => 'DELETE', 'url' => ['portafolio-destroyimagen',$imagen->id]]) !!}
<button type="submit" class="btn btn-danger">Delete</button>
{!! Form::close() !!}</td> 


  </tbody>
  @endforeach
                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





@endsection

@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')

           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="icon-user font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Editar Portafolios</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{!! URL::to('/portafolio-ver') !!}">Portafolios</a></li>
                            <li class="breadcrumb-item active"><a href="#">Editar {{$portafolio->nombre}}</a></li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>


                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

@include('alerts.request')
@include('alerts.success')




        <h4 class="card-title">

      
           </h4><br><br>

           
      <div class="card card-outline-info">
                            
                            <div class="card-body">
                                
  {!!Form::model($portafolio,['url'=>['portafolio-update',$portafolio->id],'method'=>'PUT' , 'files'=>True])!!}
              @include('admin.portafolio.forms.create')
              
               <a href="{!! URL::to('/portafolio-ver') !!}" class="waves-effect waves-dark btn btn-danger pull-right">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Guardar</button>
              
  {!!Form::close()!!}

                            </div>
                        </div>


                            </div>
                        </div>
                    </div>
                </div>




@include('admin.portafolio.modal.create')

@section('mis-scripts')
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

<!--contador para el text area-->
<script>
      var text_max = 200;
$('#count_message').html(text_max + ' remaining');

$('.text').keyup(function() {
  var text_length = $('.text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_remaining + ' remaining');
});
    </script>
@stop


@endsection
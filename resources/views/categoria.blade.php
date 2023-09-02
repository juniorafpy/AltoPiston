@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Categoria</h1>
@stop

@section('content')
    {{-- With label, invalid feedback disabled and form group class --}}
    <div class="card-header">

        <h2>Listado de Categorías</h2><br/>
       
         <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
             <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Categoría
         </button>
     </div>

<table id="categoria" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($categoria as $cat)
        <tr>
            <td>{{ $cat->cod_categoria}}</td>
            <td>{{ $cat->nombre}}</td>
            <td>{{ $cat->descripcion}}</td>
            <td>{{ $cat->estado}}</td>
            <td>
                <button type="button" class="btn btn-success btn-md">
            
                  <i class="fa fa-check fa-2x"></i> Activo
                </button>
               
            </td>

            <td>
                <button type="button" class="btn btn-info btn-md" data-id_categoria="{{rtrim($cat->cod_categoria)}}" data-nombre="{{rtrim($cat->nombre)}}" data-descripcion="{{rtrim($cat->descripcion)}}" data-toggle="modal" data-target="#abrirmodalEditar">

                  <i class="fa fa-edit fa-2x"></i> Editar
                </button> &nbsp;
            </td>

            <td>

                
                <button type="button" class="btn btn-danger btn-sm">
                    <i class="fa fa-lock fa-2x"></i> Desactivar
                </button>
               
            </td>
        </tr>
        @endforeach
      
    </tbody>
</table>
@stop

<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                 

                <form action="{{route('categoria.store')}}" method="post" class="form-horizontal">
                   
                    {{csrf_field()}}
                    
                    @include('form')

                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

 <!--Inicio del modal actualizar-->
 <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                 

                <form action="{{route('categoria.update',$cat->cod_categoria)}}" method="post" class="form-horizontal">
                    
                    {{method_field('patch')}}
                    {{csrf_field()}}

                    <input type="hidden" id="id_categoria" name="id_categoria" value="">
                    @include('form')

                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->
@section('js')

    <script>
       $(document).ready(function() {
    $('#categoria').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando página _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    } );
} );
    </script>
    <script>
    
        /*EDITAR CATEGORIA EN VENTANA MODAL*/
        $('#abrirmodalEditar').on('show.bs.modal', function (event) {
       
       //console.log('modal abierto');
       
       var button = $(event.relatedTarget) 
       var nombre_modal_editar = button.data('nombre')
       var descripcion_modal_editar = button.data('descripcion')
       var id_categoria = button.data('id_categoria')
       var modal = $(this)
       // modal.find('.modal-title').text('New message to ' + recipient)
       modal.find('.modal-body #nombre').val(nombre_modal_editar);
       modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
       modal.find('.modal-body #id_Categoria').val(id_categoria);
       })
   
   
   </script>
@endsection
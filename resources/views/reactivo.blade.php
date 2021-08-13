@extends('layouts.header')

@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
{{--            <div class="page-titles">--}}
{{--                <h4>Datatable</h4>--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>--}}
{{--                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>--}}
{{--                </ol>--}}
{{--            </div>--}}
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-circle"></i> Crear nuevo Reactivo</button>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success ">
                                                <h5 class="modal-title text-white"><i class="fa fa-user-plus"></i>Crear nuevo reactivo</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/reactivo">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Codigo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="codigo" class="form-control" placeholder="Codigo">
                                                        </div>
                                                    </div>
 
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i>Crear Reactivo</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre </th>
                                        <th>Codigo</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reactivos as $reactivo)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>{{$reactivo->nombre}}</td>

                                            <td>{{$reactivo->codigo}}</td>
                                            @if($reactivo->estado=='ACTIVO')
                                                <td><span class="badge badge-success badge-sm">ACTIVO</span></td>
                                            @else
                                                <td><span class="badge badge-danger badge-sm">INACTIVO</span></td>
                                            @endif
                                            <td>
                                                <div class="d-flex">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$reactivo->id}}" data-nombre="{{$reactivo->nombre}}" data-codigo="{{$reactivo->codigo}}" ><i class="fa fa-pencil"></i></button>
                                                        <form action="reactivo/{{$reactivo->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="eliminar btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a href="reactivo/{{$reactivo->id}}" type="submit" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-check-circle"></i></a>
                                                        <button type="button" class="btn btn-success shadow btn-xs sharp" data-toggle="modal" data-target="#agregar" data-id="{{$reactivo->id}}" data-nombre="{{$reactivo->nombre}}"  ><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title " id="modificarLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" id="frmmodificar">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Codigo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo">
                                                        </div>
                                                    </div>
                 
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Modificar Reactivo</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title " id="agregarLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" id="frmagregar">
                                                    @csrf
                                                    @method('post')
                                                    <div class="form-group row">
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="idinv" id="idinv" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fecha Vencimiento</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control" placeholder="fecha vencimiento">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Marca</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Lote</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="lote" id="lote" class="form-control" placeholder="lote">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Ingreso cantidad</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="ingreso" id="ingreso" class="form-control" placeholder="Ingreso">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Observacion</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="observacion" id="observacion" class="form-control" placeholder="observacion">
                                                        </div>
                                                    </div>
                 
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i>Agregar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload=function (){
            $('body').on('click','.eliminar',function (e){
                // console.log($(this).val());
                // e.preventDefault();
                if (!confirm('Seguro de eliminar?')){
                    e.preventDefault();
                }
            })

            $('#modificar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                $('#nombre').val(button.data('nombre'));
                $('#codigo').val(button.data('codigo'));
                $('#frmmodificar').attr('action','reactivo/'+button.data('id'));
                var modal = $(this)
                modal.find('.modal-title').text('Reactivo ' + button.data('nombre'))
            })
            
            $('#agregar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                $('#idinv').val(button.data('id'));
                $('#frmagregar').attr('action','inventario/');
                var modal = $(this)
                modal.find('.modal-title').text('Reactivo ' + button.data('nombre'))
            })

        }
    </script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

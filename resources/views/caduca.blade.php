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
{{--                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-circle"></i> Crear nuevo Reactivo</button>--}}
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
                                                        <label class="col-sm-3 col-form-label">Lote</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="lote" class="form-control" placeholder="Lote">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fecha venciemitno</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="fechavencimiento" value="{{date('Y-m-d')}}" class="form-control" placeholder="Fecha venciemitno">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i>Crear doctor</button>
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
                                        <th>Lote</th>
                                        <th>Fechavencimiento</th>
                                        <th>Estado</th>
                                        <th>Dias faltantes</th>
{{--                                        <th>Opciones</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reactivos as $reactivo)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>{{$reactivo->nombre}}</td>

                                            <td>{{$reactivo->lote}}</td>
                                            <td>{{$reactivo->fechavencimiento}}</td>
                                            @if($reactivo->estado=='ACTIVO')
                                                <td><span class="badge badge-success badge-sm">ACTIVO</span></td>
                                            @else
                                                <td><span class="badge badge-danger badge-sm">INACTIVO</span></td>
                                            @endif
                                                <td>
                                                    {{ date_diff(new \DateTime($reactivo->fechavencimiento), new \DateTime())->format("%m Months, %d days") }}
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ date_diff(new \DateTime($reactivo->fechavencimiento), new \DateTime())->format("%d") }}%" aria-valuenow="{{ date_diff(new \DateTime($reactivo->fechavencimiento), new \DateTime())->format("%d") }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
{{--                                            <td>--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="btn-group">--}}
{{--                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
{{--                                                        <button type="button" class="btn btn-warning shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$reactivo->id}}" data-nombre="{{$reactivo->nombre}}" data-lote="{{$reactivo->lote}}" data-fechavencimiento="{{$reactivo->fechavencimiento}}"><i class="fa fa-pencil"></i></button>--}}
{{--                                                        <form action="reactivo/{{$reactivo->id}}" method="post">--}}
{{--                                                            @csrf--}}
{{--                                                            @method('delete')--}}
{{--                                                            <button type="submit" class="eliminar btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>--}}
{{--                                                        </form>--}}
{{--                                                        <form action="estado/{{$reactivo->id}}" method="post">--}}
{{--                                                            @csrf--}}
{{--                                                            <button type="submit" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-check-circle"></i></button>--}}
{{--                                                        </form>--}}
{{--                                                        <a href="reactivo/{{$reactivo->id}}" type="submit" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-check-circle"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
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
                                                        <label class="col-sm-3 col-form-label">Lote</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="lote" id="lote" class="form-control" placeholder="Lote">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fecha vencimiento</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control" placeholder="Fecha vencimiento">
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
                $('#lote').val(button.data('lote'));
                $('#fechavencimiento').val(button.data('fechavencimiento'));
                $('#frmmodificar').attr('action','reactivo/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Reactivo ' + button.data('nombre'))
                // modal.find('.modal-body input').val(recipient)
            })
            $('#key').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                // $('#name').val(button.data('name'));
                // $('#email').val(button.data('email'));
                $('#frmkey').attr('action','user/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Doctor ' + button.data('name'))
                // modal.find('.modal-body input').val(recipient)
            })
        }
    </script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

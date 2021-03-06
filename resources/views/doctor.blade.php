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
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-user-plus"></i> Crear nuevo doctor</button>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success ">
                                                <h5 class="modal-title text-white"><i class="fa fa-user-plus"></i>Crear nuevo doctor</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>E
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/doctor">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Cedula Identidad</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="ci" class="form-control" placeholder="ci">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre Completo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Celular (whatsapp)</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="celular" class="form-control" min="0" placeholder="Numero de celular">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Especialidad</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Numero Matricula</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="matricula" class="form-control" placeholder="num matricula">
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
                                        <th>CI</th>
                                        <th>Nombre completo</th>
                                        <th>Celular</th>
                                        <th>Especialidad</th>
                                        <th>Matricula</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>{{$doctor->ci}}</td>
                                            <td>{{$doctor->nombre}}</td>
                                            <td>{{$doctor->celular}}</td>
                                            <td>{{$doctor->especialidad}}</td>
                                            <td>{{$doctor->matricula}}</td>
                                            @if($doctor->activo==1)
                                                <td><span class="badge badge-success badge-sm">ACTIVO</span></td>
                                            @else
                                                <td><span class="badge badge-danger badge-sm">INACTIVO</span></td>
                                            @endif

                                            <td>
                                                <div class="d-flex">
                                                    <div class="btn-group">
{{--                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
                                                        <button type="button" class="btn btn-primary shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$doctor->id}}" data-ci="{{$doctor->ci}}" data-nombre="{{$doctor->nombre}}" data-especialidad="{{$doctor->especialidad}}" data-matricula="{{$doctor->matricula}}" data-celular="{{$doctor->celular}}"> <i class="fa fa-pencil"></i></button>
                                                        <form action="doctor/{{$doctor->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="eliminar btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <form action="estadodoc/{{$doctor->id}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-check-circle"></i></button>
                                                        </form>
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
                                                        <label class="col-sm-3 col-form-label">Cedula Identidad</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="ci" id="ci" class="form-control" placeholder="ci" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre Completo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Especialidad</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="especialidad">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Numero Matricula</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="matricula" id="matricula" class="form-control" placeholder="matricula">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Celular</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="celular" id="celular" class="form-control" placeholder="celular">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-user-plus"></i>Modificar doctor</button>
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
                $('#ci').val(button.data('ci'));
                $('#nombre').val(button.data('nombre'));
                $('#especialidad').val(button.data('especialidad'));
                $('#matricula').val(button.data('matricula'));
                $('#celular').val(button.data('celular'));
                $('#frmmodificar').attr('action','doctor/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Doctor ' + button.data('nmbre'))
                // modal.find('.modal-body input').val(recipient)
            })
            $('#key').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                // $('#name').val(button.data('name'));
                // $('#email').val(button.data('email'));
                $('#frmkey').attr('action','doctor/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Doctor ' + button.data('nombre'))
                // modal.find('.modal-body input').val(recipient)
            })
        }
    </script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

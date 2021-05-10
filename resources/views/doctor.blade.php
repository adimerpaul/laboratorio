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
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/user">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre Completo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="name" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" name="password" class="form-control" placeholder="Password">
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
                                        <th>Nombre completo</th>
                                        <th>Email</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
{{--                                        <th>Email</th>--}}
{{--                                        <th>Joining Date</th>--}}
{{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->tipo}}</td>
                                            @if($user->estado=='ACTIVO')
                                                <td><span class="badge badge-success badge-sm">{{$user->estado}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger badge-sm">{{$user->estado}}</span></td>
                                            @endif

                                            <td>
                                                <div class="d-flex">
                                                    <div class="btn-group">
{{--                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
                                                        <button type="button" class="btn btn-primary shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}"><i class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-info shadow btn-xs sharp" data-toggle="modal" data-target="#key" data-id="{{$user->id}}" data-name="{{$user->name}}"><i class="fa fa-key"></i></button>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        <a href="#" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-check-circle"></i></a>
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
                                                        <label class="col-sm-3 col-form-label">Nombre Completo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
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
                                <div class="modal fade" id="key" tabindex="-1" aria-labelledby="keyLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title " id="keyLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" id="frmkey">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-key"></i>Modificar Password</button>
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
            $('#modificar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                $('#name').val(button.data('name'));
                $('#email').val(button.data('email'));
                $('#frmmodificar').attr('action','user/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Doctor ' + name)
                // modal.find('.modal-body input').val(recipient)
            })
            $('#key').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                $('#name').val(button.data('name'));
                // $('#email').val(button.data('email'));
                $('#frmkey').attr('action','user/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Doctor ' + name)
                // modal.find('.modal-body input').val(recipient)
            })
        }
    </script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

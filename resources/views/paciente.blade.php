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
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-users"></i> Crear nuevo paciente</button>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success ">
                                                <h5 class="modal-title text-white"><i class="fa fa-users"></i>Crear nuevo paciente</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/paciente">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre Completo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fecha Nacimiento</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="fechanac" class="form-control" placeholder="Fecha Nacimiento">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Sexo</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="date" name="fechanac" class="form-control" placeholder="Sexo">--}}
                                                            <input type="radio" name="sexo" value="Masculino" checked> Masculino
                                                            <input type="radio" name="sexo" value="Femenino"> Femenino
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i>Crear paciente</button>
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
                                        <th>Fecha nacimiento</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
{{--                                        <th>Estado</th>--}}
                                        <th>Opciones</th>
{{--                                        <th>Email</th>--}}
{{--                                        <th>Joining Date</th>--}}
{{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>
                                                {{$loop->index+1}}
                                            </td>
                                            <td>{{$paciente->nombre}}</td>
                                            <td>{{$paciente->fechanac}}</td>
                                            <td> <p>{{ $paciente->age() }} Años</p></td>
                                            <td>{{$paciente->sexo}}</td>
{{--                                            @if($paciente->active==1)--}}
{{--                                                <td><span class="badge badge-success badge-sm">ACTIVO</span></td>--}}
{{--                                            @else--}}
{{--                                                <td><span class="badge badge-danger badge-sm">INACTIVO</span></td>--}}
{{--                                            @endif--}}
                                            <td>
                                                <div class="d-flex">
                                                    <div class="btn-group">
{{--                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
                                                        <button type="button" class="btn btn-primary shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$paciente->id}}" data-nombre="{{$paciente->nombre}}" data-sexo="{{$paciente->sexo}}" data-fechanac="{{$paciente->fechanac}}"><i class="fa fa-pencil"></i></button>

                                                        <form action="paciente/{{$paciente->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="eliminar btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <button type="button" class="btn btn-info shadow btn-xs sharp" data-toggle="modal" data-target="#modificar" data-id="{{$paciente->id}}" data-nombre="{{$paciente->nombre}}" data-sexo="{{$paciente->sexo}}" data-fechanac="{{$paciente->fechanac}}"><i class="fa fa-list"></i></button>
                                                        <button type="button" class="btn btn-success shadow btn-xs sharp" data-toggle="modal" data-target="#laboratorio" data-id="{{$paciente->id}}" data-nombre="{{$paciente->nombre}}" data-edad="{{$paciente->age()}}" data-sexo="{{$paciente->sexo}}" ><i class="fa fa-plus-circle"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
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
                                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Completo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fecha Nacimiento</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="fechanac" id="fechanac" class="form-control" placeholder="Fecha Nacimiento">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Sexo</label>
                                                        <div class="col-sm-9">
                                                            {{--                                                            <input type="date" name="fechanac" class="form-control" placeholder="Sexo">--}}
                                                            <input type="radio" name="sexo" id="sexo1" value="Masculino" checked> Masculino
                                                            <input type="radio" name="sexo" id="sexo2" value="Femenino"> Femenino
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
                                <div class="modal fade" id="laboratorio" tabindex="-1" aria-labelledby="laboratorioLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="min-width: 98%">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title " id="laboratorioLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
{{--                                                    <label class="col-sm-3 col-form-label">Laboratorio</label>--}}
                                                    <div class="col-sm-12">
{{--                                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Completo">--}}
                                                        <select name="laboratorio" style="color: black" class="form-control" id="labo">
                                                            <option value="">Selecionar laboratorio...</option>
                                                            <option value="01">Hemograma completo</option>
                                                            <option value="02">Quimica sanguinea</option>
                                                            <option value="03">Examen general de orina</option>
                                                            <option value="04">Analisis de secrecion uretral</option>
                                                            <option value="05">Analisis de secrecion Vaginal</option>
                                                            <option value="06">Analisis de Heces</option>
                                                            <option value="07">Copraparasitologico Simple</option>
                                                            <option value="08">Copraparasitologico Seriado</option>
                                                            <option value="09">Serologia</option>
                                                            <option value="10">Laboratorio Serologia</option>
                                                            <option value="11">Resultado Serologia</option>
                                                            <option value="12">Inmunoensayo de Fluorescencia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <x-f01></x-f01>
                                                <x-f02></x-f02>
                                                <x-f03></x-f03>
                                                <x-f04></x-f04>
                                                <x-f05></x-f05>
                                                <x-f06></x-f06>
                                                <x-f07></x-f07>
                                                <x-f08></x-f08>
                                                <x-f09></x-f09>
                                                <x-f10></x-f10>
                                                <x-f11></x-f11>
                                                <x-f12></x-f12>
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
            $('#f01').hide('fast');
            $('#f02').hide('fast');
            $('#f03').hide('fast');
            $('#f04').hide('fast');
            $('#f05').hide('fast');
            $('#f06').hide('fast');
            $('#f07').hide('fast');
            $('#f08').hide('fast');
            $('#f09').hide('fast');
            $('#f10').hide('fast');
            $('#f11').hide('fast');
            $('#f12').hide('fast');
            var doctor='';
             @foreach($doctors as $doctor)
                console.log('{{$doctor->nombre}}')
                doctor=doctor+'<option>{{$doctor->nombre}}</option>'
             @endforeach
                 $('.doctors').html(doctor);


            $('#labo').change(function (){
                // console.log($(this).val());
                $('#f01').hide('fast');
                $('#f02').hide('fast');
                $('#f03').hide('fast');
                $('#f04').hide('fast');
                $('#f05').hide('fast');
                $('#f06').hide('fast');
                $('#f07').hide('fast');
                $('#f08').hide('fast');
                $('#f09').hide('fast');
                $('#f10').hide('fast');
                $('#f11').hide('fast');
                $('#f12').hide('fast');
                $('#f'+$(this).val()).show('fast');
            });
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
                $('#fechanac').val(button.data('fechanac'));
                // console.log(button.data('fechanac'))
                // $('#sexo').val(button.data('sexo'));
                if (button.data('sexo')=='Masculino'){
                    $('#sexo1').prop('checked', true);
                }else{
                    $('#sexo2').prop('checked', true);
                }
                $('#frmmodificar').attr('action','paciente/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Paciente ' + button.data('nombre'))
                // modal.find('.modal-body input').val(recipient)
            })
            $('#laboratorio').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                // console.log(button.data('sexo'));
                $('.txtnombre').html(button.data('nombre'));
                $('.txtsexo').html(button.data('sexo'));
                $('.txtedad').html(button.data('edad'));
                $('.txtn').html(button.data('id'));
                $('.paciente_id').val(button.data('id'));
                // $('#frmmodificar').attr('action','paciente/'+button.data('id'));
                // console.log($('#frmmodificar').attr('action'));
                var modal = $(this)
                modal.find('.modal-title').text('Laboratorio para: ' + button.data('nombre'))
                // modal.find('.modal-body input').val(recipient)
            })
        }
    </script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

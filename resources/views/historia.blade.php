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
                                Historial
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" id="formulario" style="color: black">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="reporte">Reporte</label>
                                                <select name="" id="reporte" class="form-control" style="color: black">
                                                    <option value="1">1 Homogramas</option>
                                                    <option value="3">3 Quimica sanguinia</option>
                                                    <option value="4">4 Uroanalisis</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="fechainicio">Fecha inicio</label>
                                                <input style="color: black" type="date" class="form-control" id="fechainicio" value="{{date('Y-m-d')}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="fechafin">Fecha Fin</label>
                                                <input style="color: black" type="date" class="form-control" id="fechafin" value="{{date('Y-m-d')}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="fechafin">Calcular</label>
                                                <button class="btn btn-block btn-success" type="submit"> <i class="fa fa-send"></i> Calcular</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
{{--                                        <p class="highcharts-description">--}}
{{--                                            Pie charts are very popular for showing a compact overview of a--}}
{{--                                            composition or comparison. While they can be harder to read than--}}
{{--                                            column charts, they remain a popular choice for small datasets.--}}
{{--                                        </p>--}}
                                    </figure>
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
    $('#formulario').submit(function (){
         // console.log( $("#formulario option:selected").text())

        $.ajax({
            url:'/historial',
            type:'post',
            data:{
                "_token": "{{ csrf_token() }}",
              reporte:$('#reporte').val(),
              fechainicio:$('#fechainicio').val(),
              fechafin:$('#fechafin').val(),
            },
            success:function (res){
                console.log(res)
                // chart.update({series:[]})
                chart.update({
                    // chart: {
                    //     inverted: false,
                    //     polar: true
                    // },
                    series: {
                        data: res
                    },
                    title: {
                        text:  $("#formulario option:selected").text()
                    },
                    subtitle: {
                        text: 'Del '+$('#fechainicio').val()+' Al '+$('#fechafin').val()
                    },
                });
            }
        })
        return false
    });
    // Create the chart
    const chart =Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            // text: 'Browser market shares. January, 2018'
        },
        subtitle: {
            // text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total atendidos'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:f} Pacientes'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [
            {
                // name: "Browsers",
                colorByPoint: true,
                data: [
                    // {
                    //     name: "Chrome",
                    //     y: 62.74,
                    // },
                    // {
                    //     name: "Firefox",
                    //     y: 10.57,
                    // },
                    // {
                    //     name: "Internet Explorer",
                    //     y: 7.23,
                    // },
                    // {
                    //     name: "Safari",
                    //     y: 5.58,
                    // },
                    // {
                    //     name: "Edge",
                    //     y: 4.02,
                    // },
                    // {
                    //     name: "Opera",
                    //     y: 1.92,
                    // },
                    // {
                    //     name: "Other",
                    //     y: 7.62,
                    // }
                ]
            }
        ],
    });
}
</script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

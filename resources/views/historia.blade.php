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
                            <figure class="highcharts-figure">
                                <div id="container"></div>
{{--                                <p class="highcharts-description">--}}
{{--                                    Pie charts are very popular for showing a compact overview of a--}}
{{--                                    composition or comparison. While they can be harder to read than--}}
{{--                                    column charts, they remain a popular choice for small datasets.--}}
{{--                                </p>--}}
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
window.onload=function (){
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in January, 2018'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Chrome',
                y: 61.41,
                sliced: true,
                selected: true
            }, {
                name: 'Internet Explorer',
                y: 11.84
            }, {
                name: 'Firefox',
                y: 10.85
            }, {
                name: 'Edge',
                y: 4.67
            }, {
                name: 'Safari',
                y: 4.18
            }, {
                name: 'Sogou Explorer',
                y: 1.64
            }, {
                name: 'Opera',
                y: 1.6
            }, {
                name: 'QQ',
                y: 1.2
            }, {
                name: 'Other',
                y: 2.61
            }]
        }]
    });
}
</script>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection

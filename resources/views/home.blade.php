@extends('layouts.minia.general')
@section('title', 'Home | Adviceme')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Users</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$general['total_users']}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart1" data-colors='["#1a86f1"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- <span class="badge bg-soft-success text-success">+$20.9k</span> -->
                    <span class="ms-1 text-muted font-size-13">{{$general['porc_total_users']}}</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Customers</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$general['customers']}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart2" data-colors='["#1a86f1"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">{{$general['porc_customers']}}</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Advisors</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$general['advisors']}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart3" data-colors='["#1a86f1"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">{{$general['porc_advisors']}}</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Advisors Available</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="12.57">0</span>%
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart4" data-colors='["#1a86f1"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">{{$general['porc_advisors_availables']}}</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->    
</div>
<div class="row">
    <div class="col-xl-5">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Results</h5>
                    <div class="ms-auto">
                        <div>
                            <a class="btn @if($target_period == 'all') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'all'])}}">
                                ALL
                            </a>
                            <a class="btn @if($target_period == 'month') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'month'])}}">
                                1M
                            </a>
                            <a class="btn @if($target_period == 'year') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'year'])}}">
                                1Y
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-sm">
                        <div id="results-pie" data-colors='["#78A9E2","#B7D6F5"]' data-info="[{{$results['porc_gross_profit']}},{{$results['porc_direct_costs']}}]" class="apex-charts"></div>
                    </div>
                    <div class="col-sm align-self-center">
                        <div class="mt-4 mt-sm-0">
                            <div>
                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> Total sales</p>
                                <h6><span class="text-muted font-size-14 fw-normal">$ {{$results['total_sales']}}</span></h6>
                            </div>

                            <div class="mt-4 pt-2">
                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Total cost</p>
                                <h6><span class="text-muted font-size-14 fw-normal">$ {{$results['direct_costs']}}</span></h6>
                            </div>

                            <div class="mt-4 pt-2">
                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i> Gross profit</p>
                                <h6><span class="text-muted font-size-14 fw-normal">$ {{$results['gross_profit']}}</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-xl-7">
        <div class="row">
            <div class="col-xl-8">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center mb-4">
                            <h5 class="card-title me-2">Comparative</h5>
                            <div class="ms-auto">
                                <select class="form-select form-select-sm" onchange="comparativeFn(this)">
                                    <option value="sales" selected>Total sales</option>
                                    <option value="cost">Total cost</option>
                                    <option value="profit">Gross profit</option>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <div id="comparative-chart" data-colors='["#1B86F0"]' data-sales="[{{$comparative['total_sales']['actual_month']}},{{$comparative['total_sales']['last_month']}},50]"
                                data-costs="[{{$comparative['direct_costs']['actual_month']}},{{$comparative['direct_costs']['last_month']}},90]"
                                data-profit="[{{$comparative['gross_profit']['actual_month']}},{{$comparative['gross_profit']['last_month']}},70]"
                                class="apex-charts"></div>
                            </div>
                            <div class="col-sm align-self-center">
                                <div class="mt-4 mt-sm-0">
                                    <p class="mb-1" id="comparativeTitle">Sales</p>
                                    <h4 id="comparativeActual">{{$comparative['total_sales']['actual_month']}}</h4>
                                    <!-- <p class="text-muted mb-4"> + 0.0012.23 ( 0.2 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p> -->
                                    <div class="row g-0">
                                        <div class="col-6">
                                            <div>
                                                <p class="mb-2 text-muted text-uppercase font-size-11">LAST MONTH</p>
                                                <h5 class="fw-medium" id="comparativeLast">{{$comparative['total_sales']['last_month']}}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <a href="#" class="btn btn-primary btn-sm blue-cs-bg">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-4">
                <!-- card -->
                <div class="card bg-primary text-white shadow-primary card-h-100">
                    <!-- card body -->
                    <div class="card-body p-0 blue-cs-bg">
                        <div id="carouselExampleCaptions" class="carousel slide text-center widget-carousel" data-bs-ride="carousel">                                                   
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="text-center p-4">
                                        <h1 class="mt-3 lh-base text-white h1-cs"><b>{{$logged['porc_customers_loggedin']}}</b></h1>
                                        <p class="text-white font-size-13">Of costumers logged in this month</p>
                                        <button type="button" class="btn btn-blue btn-sm">View more</button>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                               <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <h1 class="mt-3 lh-base text-white h1-cs"><b>{{$logged['porc_advisors_loggedin']}}</b></h1>
                                        <p class="text-white font-size-13">Of advisors logged in this month</p>
                                        <button type="button" class="btn btn-blue btn-sm">View more</button>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                            </div>
                            <!-- end carousel-inner -->
                            
                            <div class="carousel-indicators carousel-indicators-rounded">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button> 
                            </div>
                            <!-- end carousel-indicators -->
                        </div>
                        <!-- end carousel -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end col -->
</div> 
<div class="row">
    <div class="col-xl-8">
        <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Sales by category</h5>
                    <div class="ms-auto">
                        <div>
                            <a class="btn @if($target_period == 'all') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'all'])}}">
                                ALL
                            </a>
                            <a class="btn @if($target_period == 'month') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'month'])}}">
                                1M
                            </a>
                            <a class="btn @if($target_period == 'year') btn-soft-primary @else btn-soft-secondary @endif btn-sm" 
                            href="{{route('home',['target_period'=>'year'])}}">
                                1Y
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <div>
                            <div id="bar_chart" data-colors='["#1a86f1"]' class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="p-4">
                            @foreach($sales['sales_by_category'] as $key => $s)
                            <div class="mt-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm m-auto">
                                        <span class="avatar-title rounded-circle bg-soft-light text-dark font-size-14">
                                            {{$key+1}}
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <span class="font-size-14">
                                            @php echo (strlen($s['name_category']) > 8) ? substr($s['name_category'],0,8).'...' : $s['name_category']; @endphp
                                        </span>
                                    </div>
                                    @if($s['increment']!= null)
                                    <div class="flex-shrink-0">
                                        <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">{{$s['increment'] ?? '+--%'}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="mt-4 pt-2">
                                <a href="#" class="btn btn-primary w-100 blue-cs-bg">Visit Sales <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->

    <div class="col-xl-4">
        <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Sales by Locations</h5>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted font-size-12">Sort By:</span> <span class="fw-medium">Period<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="{{route('home',['target_period'=>'all'])}}">All</a>
                                <a class="dropdown-item" href="{{route('home',['target_period'=>'month'])}}">Month</a>
                                <a class="dropdown-item" href="{{route('home',['target_period'=>'year'])}}">Year</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sales-by-locations" data-colors='["#1a86f1"]' style="height: 250px"></div>

                <div class="px-2 py-2">
                    <p class="mb-1">MEXICO <span class="float-end">55%</span></p>
                    <div class="progress mt-2" style="height: 6px;">
                        <div class="progress-bar progress-bar-striped blue-cs-bg" role="progressbar"
                            style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                        </div>
                    </div>
                    <p class="mb-1 mt-3">USA <span class="float-end">75%</span></p>
                    <div class="progress mt-2" style="height: 6px;">
                        <div class="progress-bar progress-bar-striped blue-cs-bg" role="progressbar"
                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                        </div>
                    </div>
                    <p class="mt-3 mb-1">CANADA <span class="float-end">41.2%</span></p>
                    <div class="progress mt-2" style="height: 6px;">
                        <div class="progress-bar progress-bar-striped blue-cs-bg" role="progressbar"
                            style="width: 41.2%" aria-valuenow="41.2" aria-valuemin="0" aria-valuemax="41.2">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
@push('scripts')
<script src="/assets/js/pages/dashboard.init.js"></script>
<script>
// Results Piechart
var piechartColors = getChartColorsArray("#results-pie");
var piechartValues = getChartInfoArray("#results-pie",'data-info');
var pieOptions = {
    series: piechartValues,
    chart: {
        width: 227,
        height: 227,
        type: 'pie',
    },
    labels: ['Gross profit','Direct cost'],
    colors: piechartColors,
    stroke: {
        width: 0,
    },
    legend: {
        show: false
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
        }
    }]
};
var resultsChart = new ApexCharts(document.querySelector("#results-pie"), pieOptions);
resultsChart.render();
</script>
<script>
var radialchartColors = getChartColorsArray("#comparative-chart");
var salesValues = getChartInfoArray("#comparative-chart",'data-sales');
var comparativeOptions = {
    chart: {
        height: 270,
        type: 'radialBar',
        offsetY: -10
    },
    plotOptions: {
        radialBar: {
            startAngle: -130,
            endAngle: 130,
            dataLabels: {
                name: {
                    show: false
                },
                value: {
                    offsetY: 10,
                    fontSize: '18px',
                    color: undefined,
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            }
        }
    },
    colors: [radialchartColors[0]],
    stroke: {
        dashArray: 4,
    },
    legend: {
        show: false
    },
    series: [salesValues[2]],
    labels: ['****'],
}

var comparativeChart = new ApexCharts(
    document.querySelector("#comparative-chart"),
    comparativeOptions
);
comparativeChart.render();

let comparativeFn= function(element){
    switch(element.value){
        case 'sales':
            document.getElementById('comparativeTitle').innerHTML='Sales'
            var salesValues = getChartInfoArray("#comparative-chart",'data-sales');
            document.getElementById('comparativeActual').innerHTML=salesValues[0]
            document.getElementById('comparativeLast').innerHTML=salesValues[1]
            comparativeOptions.series=[salesValues[2]]
            comparativeChart.updateOptions(comparativeOptions)
        break;
        case 'cost':
            document.getElementById('comparativeTitle').innerHTML='Costs'
            var costsValues = getChartInfoArray("#comparative-chart",'data-costs');
            document.getElementById('comparativeActual').innerHTML=costsValues[0]
            document.getElementById('comparativeLast').innerHTML=costsValues[1]
            comparativeOptions.series=[costsValues[2]]
            comparativeChart.updateOptions(comparativeOptions)
        break;
        case 'profit':
            document.getElementById('comparativeTitle').innerHTML='Profit'
            var profitValues = getChartInfoArray("#comparative-chart",'data-profit');
            document.getElementById('comparativeActual').innerHTML=profitValues[0]
            document.getElementById('comparativeLast').innerHTML=profitValues[1]
            comparativeOptions.series=[profitValues[2]]
            comparativeChart.updateOptions(comparativeOptions)
        break;
    }
}
</script>
<script>
let salesObj = @json($sales['sales_by_category']);
let categories= salesObj.map(function(element){
    return element.name_category
})
let sales= salesObj.map(function(element){
    return element.total_sales
})
// Bar chart
var barColors = getChartColorsArray("#bar_chart");
var barOptions = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: sales
    }],
    colors: barColors,
    grid: {
        borderColor: '#f1f1f1',
    },
    xaxis: {
        categories: categories,
    }
}
var barChart = new ApexCharts(
    document.querySelector("#bar_chart"),
    barOptions
);
barChart.render();
</script>
<script>
var vectormapColors = getChartColorsArray("#sales-by-locations");
$('#sales-by-locations').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    regionStyle: {
        initial: {
            fill: '#e9e9ef'
        }
    },
    markerStyle: {
        initial: {
            r: 9,
            'fill': vectormapColors,
            'fill-opacity': 0.9,
            'stroke': '#fff',
            'stroke-width': 7,
            'stroke-opacity': 0.4
        },

        hover: {
            'stroke': '#fff',
            'fill-opacity': 1,
            'stroke-width': 1.5
        }
    },
    backgroundColor: 'transparent',
    markers: [
    {
        latLng: [19.36, -99.22],
        name: 'MEXICO'
    },
    {
        latLng: [40.73, -73.93],
        name: 'USA'
    },
    {
        latLng: [55, -106],
        name: 'CANADA'
    }]
});
</script>
@endpush
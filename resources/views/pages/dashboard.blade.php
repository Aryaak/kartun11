@extends('layouts.app')

@section('content')
<!-- Dashboard Inner -->
<div class="crancy-dsinner">
    <div class="row crancy-gap-30">
        <div class="col-lg-7 col-md-6 col-12 crancy-sixth-one">
            <!-- Charts One -->
            <div class="charts-main charts-home-one mg-top-30">
                <!-- Top Heading -->
                <div class="charts-main__heading mg-btm-20">
                    <h4 class="charts-main__title">Riwayat Anggaran</h4>
                    <div class="charts-main__middle">
                        <ul class="crancy-progress-list crancy-progress-list__inline">
                            <li>
                                <span class="crancy-progress-list__color"></span>
                                <p>Pemasukan</p>
                            </li>
                            <li>
                                <span class="crancy-progress-list__color crancy-color9__bg"></span>
                                <p>Pengeluaran</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="charts-main__one">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="crancy-chart__t1" role="tabpanel"
                            aria-labelledby="crancy-chart__t1">
                            <div class="crancy-chart__inside crancy-chart__one">
                                <!-- Chart One -->
                                <canvas id="cashflowBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Charts One -->
        </div>
        <div class="col-lg-5 col-md-6 col-12 crancy-sixth-two">
            <!-- Charts Two -->
            <div class="charts-main charts-home-two mg-top-30">
                <div class="charts-main__heading mg-btm-20 charts-main__heading--v2">
                    <h4 class="charts-main__title">Persentase Anggaran</h4>
                </div>
                <div class="crancy-chart-groups">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="crancy-chart__t2" role="tabpanel"
                            aria-labelledby="crancy-chart__t2">
                            <div class="crancy-chart__inside crancy-chart__two">
                                <canvas id="cashflowPieChart"></canvas>
                                <span
                                    class="crancy-chart-groups__title crancy-chart-groups__title--v2 text-xs">{{$percentageIn}}%<span>IN</span></span>
                                <span
                                    class="crancy-chart-groups__title crancy-chart-groups__title--v3 text-xs">{{$percentageOut}}%<span>OUT</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Charts Two -->
        </div>
    </div>

    <div class="crancy-table crancy-table--v3 mg-top-30">
        <div class="crancy-customer-filter">
            <h3>Kegiatan Terbaru</h3>
        </div>

        <!-- crancy Table -->
        <table class="crancy-table__main crancy-table__main-v3">
            <!-- crancy Table Head -->
            <thead class="crancy-table__head">
                <tr>
                    <th class="text-center">
                        Nama
                    </th>
                    <th class="text-center">
                        Mulai
                    </th>
                    <th class="text-center">
                        Selesai
                    </th>
                </tr>
            </thead>
            <!-- crancy Table Body -->
            <tbody class="crancy-table__body">
                @foreach ($projects as $project)
                <tr>
                    <td class="text-center">
                        {{$project->name}}
                    </td>
                    <td class="text-center">
                        {{\Carbon\Carbon::parse($project->start_date)->format('d M Y')}}
                    </td>
                    <td class="text-center">
                        {{\Carbon\Carbon::parse($project->end_date)->format('d M Y')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- End crancy Table Body -->
        </table>
        <!-- End crancy Table -->
    </div>
</div>
<!-- End Dashboard Inner -->
@endsection

@push('scripts')
<script>
    // Chart One
    const ctx = document.getElementById("cashflowBarChart").getContext("2d");
    const cashflowBarChart = new Chart(ctx, {
        type: "bar",

        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Agu",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            datasets: [{
                    label: "Total Pemasukan",
                    data: @json($cashflowIn),
                    backgroundColor: "#0A82FD",
                    hoverBackgroundColor: "#0A82FD",
                    fill: true,
                    tension: 0.4,
                    borderWidth: 0,
                    borderSkipped: false,
                    borderRadius: 8,
                    borderRadius: {
                        topLeft: 8, // Apply border radius to the top-left corner
                        topRight: 8, // Apply border radius to the top-right corner
                        bottomLeft: 0, // Keep bottom-left corner square
                        bottomRight: 0, // Keep bottom-right corner square
                    },
                    barPercentage: 0.8,
                    categoryPercentage: 0.5,
                },
                {
                    label: "Total Pengeluaran",
                    data: @json($cashflowOut),
                    backgroundColor: "#F2C94C",
                    hoverBackgroundColor: "#F2C94C",
                    borderWidth: 0,
                    borderSkipped: false,
                    borderRadius: 8,
                    borderRadius: {
                        topLeft: 8, // Apply border radius to the top-left corner
                        topRight: 8, // Apply border radius to the top-right corner
                        bottomLeft: 0, // Keep bottom-left corner square
                        bottomRight: 0, // Keep bottom-right corner square
                    },
                    barPercentage: 0.8,
                    categoryPercentage: 0.5,
                },
            ],
        },
    });

    // Chart Two
    const ctx_two = document.getElementById("cashflowPieChart").getContext("2d");

    const cashflowPieChart = new Chart(ctx_two, {
        type: "doughnut",

        data: {
            labels: ["Pemasukan", "Pengeluaran"],
            datasets: [{
                data: ["{{$percentageIn}}", "{{$percentageOut}}"],
                backgroundColor: ["#436CFF", "#F7CA16"],
                hoverOffset: 2,
                borderWidth: 0,
            }, ],
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "top",
                    display: false,
                },
                title: {
                    display: false,
                    text: "Sell History",
                },
                tooltip: {
                    enabled: false, // Set enabled to false to hide data labels on hover
                },
            },
        },
    });

</script>
@endpush

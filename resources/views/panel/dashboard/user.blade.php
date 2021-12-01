@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    <div class="my-4">
        @include('layouts.partials.alerts')
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">File Public</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format(\App\Models\File::where('user_id', Auth::user()->id)->where('is_public', 1)->count()) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">File Private</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format(\App\Models\File::where('user_id', Auth::user()->id)->where('is_public', 0)->count()) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">File Password</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format(\App\Models\File::where('user_id', Auth::user()->id)->where('password', '!=', null)->count()) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('/images/faces/1.jpg') }}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Uploaded Files Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-uploaded-files-statistics"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest 5 Uploaded Files</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>
                                            Name <br/>
                                            <small class="text-muted" style="font-size:11px">Author</small>
                                        </th>
                                        <th>Password</th>
                                        <th>Upload Date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @if ($latestFiles->isEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @else
                                        @foreach ($latestFiles as $latestFile)
                                            <tr>
                                                <td>
                                                    {{ $latestFile->name }} <br/>
                                                    <small class="text-muted" style="font-size:11px">{{ $latestFile->user->name }}</small>
                                                </td>
                                                <td>
                                                    {{ @$latestFile->password ?: '-' }}
                                                </td>
                                                <td>{{ $latestFile->created_at->format('d M Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        var uploadedFilesStatistics = @json($uploadedFilesStatistics);

        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled:false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity:1
            },
            plotOptions: {
            },
            series: [{
                name: 'count',
                data: uploadedFilesStatistics
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
            },
        }
        var chartUploadedFiles = new ApexCharts(document.querySelector("#chart-uploaded-files-statistics"), optionsProfileVisit);
        chartUploadedFiles.render();
    </script>
@endpush

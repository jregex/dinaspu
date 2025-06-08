@extends('layouts.app')
@section('subtitle', $title)
@section('plugins.Chartjs', true)
@section('content_body')
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $jml_user }}</h3>

                    <p>Jumlah Pegawai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jml_post }}</h3>

                    <p>Jumlah Berita</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="{{ route('posts.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Grafik pendidikan pegawai</h5>
                </div>
                <div class="card-body">
                    <canvas id="chart-pendidikan"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const data = {
            labels: @json($pegawai_pendidikan->map(fn($data) => $data->pendidikan)),
            datasets: [{
                label: 'Pendidikan pegawai',
                backgroundColor: ['#36A2EB', '#FFB1C1', '#FFCE56', '#FF6384', '#9BD0F5', '#00809D', '#80D8C3',
                    '#00809D', '#FF7601', '#725CAD', '#FF3F33', '#075B5E', '#9FC87E', '#FFE6E1', '#E7EFC7',
                    '#00CAFF', '#FCEF91', '#FFD6BA'
                ],
                data: @json($pegawai_pendidikan->map(fn($data) => $data->aggregate)),
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                legend: {
                    position: 'top'
                }
            }
        };
        const myChart = new Chart(
            document.querySelector('#chart-pendidikan'),
            config
        );
    </script>
@endpush

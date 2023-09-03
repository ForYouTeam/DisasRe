@extends('layout.Base')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Data Laporan</h5>
                            <h2><span class="counter">{{$data['laporan']}}</span> <span class="tuition-fees">{{$date}}</span></h2>
                            <span class="text-success">Jumlah</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Data Pelapor</h5>
                            <h2><span class="counter">{{$data['pelapor']}}</span> <span class="tuition-fees">{{$date}}</span></h2>
                            <span class="text-danger">Jumlah</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Data Banjir</h5>
                            <h2><span class="counter">{{$data['banjir']}}</span> <span class="tuition-fees">{{$date}}</span></h2>
                            <span class="text-info">Jumlah</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Data User</h5>
                            <h2><span class="counter">{{$data['akun']}}</span> <span class="tuition-fees">{{$date}}</span></h2>
                            <span class="text-inverse">Jumlah</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div style="width: 100%; height: 550px;" id="map"></div>
            </div>
        </div>
    </div>
    <div id="reportTooltip" class="tooltip fade" role="tooltip">
        <div class="arrow"></div>
        <div class="tooltip-inner">
            <!-- Tempatkan informasi jumlah laporan dan deskripsi di sini -->
            <p>Jumlah Laporan: <span id="reportCount"></span></p>
            <p>Deskripsi: <span id="reportDescription"></span></p>
        </div>
    </div>
@endsection
@section('script')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaXBraW45IiwiYSI6ImNsbTM2MjB3ejB3Yjgzc256ejVwaXpubWIifQ.z9as5eQQoJrjPPtUIyjFSg';

        const geojsonData = {
            type: 'FeatureCollection',
            features: [
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [119.4190, -1.4400]
                    },
                    properties: {
                        description: 'Laporan Banjir 1',
                        point_count: 1
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [119.4200, -1.4405]
                    },
                    properties: {
                        description: 'Laporan Banjir 2',
                        point_count: 1
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [119.4210, -1.4410]
                    },
                    properties: {
                        description: 'Laporan Banjir 3',
                        point_count: 2
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [119.4220, -1.4415]
                    },
                    properties: {
                        description: 'Laporan Banjir 4',
                        point_count: 1
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [119.4230, -1.4420]
                    },
                    properties: {
                        description: 'Laporan Banjir 5',
                        point_count: 1
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [120.03166, -1.61723]
                    },
                    properties: {
                        description: 'Laporan Banjir 5',
                        point_count: 1
                    }
                }
            ]
        };

        
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // Ganti dengan gaya peta yang sesuai
            center: [120.1312, -1.4129], // Koordinat Kabupaten Sigi, Sulawesi Tengah
            zoom: 9 // Tingkat zoom sesuai kebutuhan
        });

        // Tambahkan data terkait banjir sebagai cluster
        map.on('load', function () {
            map.addSource('banjir', {
                type: 'geojson',
                data: geojsonData,
                cluster: true, // Aktifkan clustering
                clusterRadius: 50, // Sesuaikan radius clustering sesuai kebutuhan
            });

            map.addLayer({
                id: 'cluster-donut',
                type: 'symbol',
                source: 'banjir',
                layout: {
                    'text-field': '{point_count}',
                    'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                    'text-size': 21
                },
                paint: {
                    'text-color': 'black', // Warna teks
                    'text-halo-width': 2, // Ketebalan lapisan luar teks
                },
                filter: ['has', 'point_count'] // Hanya tampilkan pada titik yang berkelompok
            });

            map.addLayer({
            id: 'cluster-circle',
            type: 'circle',
            source: 'banjir',
            paint: {
                'circle-radius': [
                'case',
                ['<', ['get', 'point_count'], 5],  // Jika < 5, radius 30 piksel
                30,
                ['<', ['get', 'point_count'], 15], // Jika < 15, radius 40 piksel
                40,
                50 // Jika > 15, radius 50 piksel
                ],
                'circle-color': 'rgba(0, 0, 0, 0)', // Warna latar belakang bulatan
                'circle-stroke-width': [
                'case',
                ['<', ['get', 'point_count'], 5],  // Jika < 5, ketebalan garis 5
                5,
                ['<', ['get', 'point_count'], 15], // Jika < 15, ketebalan garis 10
                10,
                15 // Jika > 15, ketebalan garis 15
                ],
                'circle-stroke-color': [
                'case',
                ['<', ['get', 'point_count'], 5], 'blue',  // Jika < 5, garis berwarna biru
                ['<', ['get', 'point_count'], 15], 'red', // Jika < 15, garis berwarna merah
                'black' // Jika > 15, garis berwarna hitam
                ]
            },
            filter: ['has', 'point_count'] // Hanya tampilkan pada titik yang berkelompok
            });

        });

        // Menambahkan kontrol zoom
        map.addControl(new mapboxgl.NavigationControl());

        map.on('click', 'cluster-circle', function (e) {
        // Ambil koordinat lon-lat dari fitur yang diklik
        var coordinates = e.features[0].geometry.coordinates;

        // Buat URL untuk membuka Google Maps dengan koordinat yang sesuai
        var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + coordinates[1] + ',' + coordinates[0];

        // Buka Google Maps dalam tab baru
        window.open(googleMapsUrl, '_blank');
        });
    </script>
@endsection
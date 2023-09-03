@extends('layout.Base')
@section('title')
    Tambah Data Laporan
@endsection
@section('style')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="main-sparkline13-hd">
                    <h1>Form <span class="table-project-n">Data</span> Laporan</h1><hr>
                </div>
                <form action="{{route('bo-report-image-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Banjir <span class="text-danger">*</span></label>
                        <select name="flood_id" id="flood_id" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($data['flood']['data'] as $item)
                                <option value="{{$item->id}}">{{$item->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pelapor <span class="text-danger">*</span></label>
                        <select name="reporter_id" id="reporter_id" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($data['reporter']['data'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Level <span class="text-danger">*</span></label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="" selected disabled>Pilih</option>
                            <option value="Kecil">Kecil</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Besar">Besar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">prioritas <span class="text-danger">*</span></label>
                        <select name="priority" id="priority" class="form-control" required>
                            <option value="" selected disabled>Pilih</option>
                            <option value="Aman">Aman</option>
                            <option value="Segera">Segera</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="desc" class="form-control" id="desc" cols="30" rows="10" required></textarea>
                    </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1><span class="table-project-n">Data</span> Lokasi</h1><hr>
                    </div>
                </div>
                <div class="sparkline13-graph">
                    <div class="form-group">
                        <label for="">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control" id="location" required>
                    </div>
                    <div class="form-group">
                        <label for="">Longtitude <span class="text-danger">*</span></label>
                        <input type="number" name="longtitude" class="form-control" id="longtitude" required>
                    </div>
                    <div class="form-group">
                        <label for="">latitude <span class="text-danger">*</span></label>
                        <input type="number" name="latitude" class="form-control" id="longtitude" required>
                    </div>
                    <div id="wrapper">
                        <label for="upload_file" class="custom-file-label"></i>Gambar</label>
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <div id="path-image">
                        </div>
                        <button type="submit" class="btn btn-custon-rounded-three btn-primary" style="margin-bottom: 15px; margin-top: 30px; float: right;"> Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    </div>
</div>
@endsection
@section('script')

@endsection
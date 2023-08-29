@extends('layout.Base')
@section('title')
    Detail Data Report
@endsection
@section('style')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="main-sparkline13-hd">
                    <h1><span class="table-project-n">Data</span> Report</h1><hr>
                </div>
                <form action="">
                    <div class="form-group">
                        <label for="">Banjir </label>
                        <input type="text" name="" id="" value="Nazar" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Level </label>
                        <input type="text" name="" class="form-control" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Priority </label>
                        <input type="text" name="" class="form-control" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi </label>
                        <textarea name="" class="form-control" id="" disabled cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1><span class="table-project-n">Data</span> Image</h1><hr>
                    </div>
                </div>
                <div class="sparkline13-graph">
                    <div class="form-group">
                        <label for="">Location </label>
                        <input type="text" name="" class="form-control" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Longatitude </label>
                        <input type="text" name="" class="form-control" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Reporter </label>
                        <input type="text" name="" class="form-control" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar </label>
                    </div>
                    <button class="btn btn-danger" style="margin-top: ">Kembali</button>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
@section('script')

@endsection
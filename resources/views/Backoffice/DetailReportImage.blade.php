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
                        <input type="text" name="" id="" value="{{$data['detail']['data']->flood->type}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Level </label>
                        <input type="text" name="" class="form-control" value="{{$data['detail']['data']->level}}" id="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Priority </label>
                        <input type="text" name="" class="form-control" id="" value="{{$data['detail']['data']->priority}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi </label>
                        <textarea name="" class="form-control" id="" disabled cols="30" rows="10">{{$data['detail']['data']->desc}}</textarea>
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
                        <input type="text" name="" class="form-control" id="" value="{{$data['detail']['data']->location}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Longtitude </label>
                        <input type="text" name="" class="form-control" id="" value="{{$data['detail']['data']->longtitude}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Latitude </label>
                        <input type="text" name="" class="form-control" id="" value="{{$data['detail']['data']->latitude}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Reporter </label>
                        <input type="text" name="" class="form-control" id="" value="{{$data['report']['data']->reporter->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar </label>
                        @foreach ($data['photo']['data'] as $item)
                            <img src="{{ asset('images/'.$item->path) }}" width="200px" height="100px" alt="">
                        @endforeach
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
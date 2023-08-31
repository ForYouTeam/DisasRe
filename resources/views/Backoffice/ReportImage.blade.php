@extends('layout.Base')
@section('title')
    Data Banjir
@endsection
@section('style')
<style>
    #upload_file[type="file"] {
        display: none;
    }

    .custom-file-label {
        background-color: #3498db;
        color: #ffffff;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="main-sparkline13-hd">
                    <h1>Tambah <span class="table-project-n">Data</span> Report</h1><hr>
                </div>
                <form action="{{route('bo-report-image-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Flood <span class="text-danger">*</span></label>
                        <select name="flood_id" id="flood_id" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($data['flood']['data'] as $item)
                                <option value="{{$item->id}}">{{$item->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Level <span class="text-danger">*</span></label>
                        <input type="text" name="level" class="form-control" id="level">
                    </div>
                    <div class="form-group">
                        <label for="">Priority <span class="text-danger">*</span></label>
                        <input type="text" name="priority" class="form-control" id="priority">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="desc" class="form-control" id="desc" cols="30" rows="10"></textarea>
                    </div>
                
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
                        <label for="">Location <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control" id="location">
                    </div>
                    <div class="form-group">
                        <label for="">Longtitude <span class="text-danger">*</span></label>
                        <input type="text" name="longtitude" class="form-control" id="longtitude">
                    </div>
                    <div class="form-group">
                        <label for="">latitude <span class="text-danger">*</span></label>
                        <input type="text" name="latitude" class="form-control" id="longtitude">
                    </div>
                    <div id="wrapper">
                        <label for="">Reporter ID <span class="text-danger">*</span></label>
                        <select name="reporter_id" id="reporter_id" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($data['reporter']['data'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="upload_file" class="custom-file-label"></i>Gambar</label>
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
                        <div id="path-image">
                        </div>
                        {{-- <div class="row">
                            <div id="image_preview">
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-custon-rounded-three btn-primary" style="margin-bottom: 15px; margin-top: 30px; float: right;"> Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Data <span class="table-project-n">Report</span> Image</h1>
                    </div>
                </div>
                <div class="sparkline13-graph">
                    <div class="datatable-dashv1-list custom-datatable-overright">
                        <div id="toolbar">
                            <select class="form-control dt-tb">
                                <option value="">Export Basic</option>
                                <option value="all">Export All</option>
                                <option value="selected">Export Selected</option>
                            </select>
                        </div>
                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id">No</th>
                                    <th data-field="name" data-editable="true">Code Report</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tb-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
    $(document).ready(function(){
        $('#add-image').click(function(){
            $('#path-image').append(`
                <input type="file" class="form-control" style="margin-top: 10px" name="image[]" id="">
            `)
        })
    })

</script>
@endsection
@extends('layout.Base')
@section('title')
    Data Banjir
@endsection
@section('style')
<style>
    #image-upload,input[type=file]{
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
                                    <th data-field="name" data-editable="true">Type</th>
                                    <th data-field="email" data-editable="true">Level</th>
                                    <th data-field="phone" data-editable="true">Priority</th>
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
        <div class="col-md-6">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Tambah <span class="table-project-n">Data</span> Gambar</h1><hr>
                    </div>
                </div>
                <div class="sparkline13-graph">
                    <div id="wrapper">
                        <form action="upload_file.php" method="post" enctype="multipart/form-data">
                            <label for="">Report ID</label>
                            <select name="report_id" id="report_id" class="form-control">
                                <option value="">Data</option>
                            </select>
                            <br>
                            <label for="upload_file" class="custom-file-label"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Gambar</label>
                            <input type="file" id="upload_file" name="upload_file[]" id="image-upload" onchange="preview_image();" multiple/>
                            <div class="row">
                                <div id="image_preview">
                                </div>
                            </div>
                            <button type="button" id="add-image" disabled class="btn btn-custon-rounded-three btn-primary" style="margin-bottom: 15px; margin-top: 30px; float: right;"> Simpan Gambar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function preview_image() {
            var total_files = $('#upload_file')[0].files.length;
            $('#image_preview').append(); // Clear previous previews

            for (var i = 0; i < total_files; i++) {
                var file = $('#upload_file')[0].files[i];
                var imageUrl = URL.createObjectURL(file);

                $('#image_preview').append(`
                    <div class="col-md-4" style="margin-top: 20px">
                        <img src="${imageUrl}" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 200px; height: 150px">
                    </div>
                `);
            }

            $('#add-image').prop('disabled', false)
        }

</script>
@endsection
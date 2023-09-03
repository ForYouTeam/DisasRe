@extends('layout.Base')
@section('title')
    Data Laporan
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
    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Table <span class="table-project-n">Report</span></h1>
                        <a href="{{ route('add-report') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah</a>
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
    const baseUrl = `{{ config('app.url') }}`
    function getAllData() {
        // $('#table-data').DataTable().destroy()
        $.get(`${baseUrl}/api/v1/report`, (res) => {
            let data = res.data

            $('#tb-body').html('')
            if (data.length > 0) {
                $.each(data, (i,d) => {
                        $('#tb-body').append(`
                        <tr>
                            <td></td>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.report_number}</td>
                            <td>
                                <a href="${baseUrl}/report/detail/${d.id}" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    `)
                })
            } else {
                $('#tb-body').append(`
                <tr>
                    <td colspan="3" style="text-align: center">
                        Data tidak ditemukan <br>
                        Silahkan tambah data terlebih dahulu
                    </td>
                </tr>
            `)
            }

            // $('#table-data').DataTable();
        })
        .fail((err) => {
            iziToast.error({
                title   : 'Error'                    ,
                message : 'Server sedang maintenance',
                position: 'topRight'
            });
        })
    }

    $(document).ready(function() 
    {
        getAllData()
    })
</script>
@endsection
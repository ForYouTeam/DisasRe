@extends('layout.Base')
@section('title')
    Data Banjir
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="sparkline13-list">
        <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
                <h1>Table <span class="table-project-n"> Banjir</span></h1>
                <button type="button" id="btn-add" class="btn btn-custon-rounded-three btn-primary" style="margin-bottom: 15px; margin-top: 10px"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
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
{{-- Modal --}}
<div id="modal-data" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <h4 class="" id="modal-title">Formulir Tambah Data</h4><hr>
                <div class="" style="margin-top: 20px">
                    <form action="#">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group-inner">
                            <label style="float: left">Type</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Input disini">
                            <span class="text-danger" id="alert-type"></span>
                        </div>
                        <div class="form-group-inner">
                            <label style="float: left">Level</label>
                            <input type="text" name="level" id="level" class="form-control" placeholder="Input disini">
                            <span class="text-danger" id="alert-level"></span>
                        </div>
                        <div class="form-group-inner">
                            <label style="float: left">Priority</label>
                            <input type="text" name="priority" id="priority" class="form-control" placeholder="Input disini">
                            <span class="text-danger" id="alert-priority"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-custon-four btn-md btn-danger">Cancel</button>
                <button onclick="postData()" class="btn btn-custon-four btn-md btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`


    function clearInput() {
        $('#id'            ).val ('')
        $('#_jabatan'      ).val ('')
        $('#alert_jabatan' ).html('')
        $('#deskripsi'     ).val ('')
        $('#alertdeskripsi').html('')
    }

    $(document).on('click', '#btn-add', function() {
        $('#modal-data').modal('show')
    })


    $(document).on('click', '#btn-del', function() {
        let dataId = $(this).data('id')
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data tidak dapat dipulihkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Waiting',
                    text: "Processing Data!",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
                $.ajax({
                    url: `${baseUrl}/api/v1/flood/${dataId}`,
                    type: 'delete',
                    success: function(result) {
                        let data = result.data;
                        setTimeout(() => {
                            Swal.close()
                            getAllData()
                            iziToast.success({
                                title: 'Sukses',
                                message: 'Data berhasil dihapus!',
                                position: 'topRight'
                            });
                        }, 500);
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        Swal.fire({
                            icon     : 'error' ,
                            title    : 'Error' ,
                            text     : data.response.message,
                            position : 'topRight'
                        });
                    }
                });
            }
        })
    })

    $(document).on('click', '#btn-edit', function() {
        clearInput()
        $('#modal-title').html('Formulir Edit Data')
        let dataId = $(this).data('id')
        $.get(`${baseUrl}/api/v1/flood/${dataId}`, (res) => {
            let data = res.data
            $.each(data, (i,d) => {
                if (i != "created_at" && i != "updated_at") {
                    $(`#${i}`).val(d)
                }
            })
            $('#modal-data').modal('show')
        }).fail((err) => {
            iziToast.error({
                title   : 'Error'                    ,
                message : 'Server sedang maintenance',
                position: 'topRight'
            });
        })
    })

    function postData() {
        const data = {
            id       : $('#id'       ).val(),
            type     : $('#type'     ).val(),
            level    : $('#level'    ).val(),
            priority : $('#priority' ).val()
        }

        $.ajax({
            url        : `${baseUrl}/api/v1/flood`,
            method     : "POST"                   ,
            data       : data                     ,
            success: function(res) {
                $('#modal-data').modal('hide')
                Swal.fire({
                    title            : 'Success'               ,
                    text             : 'Data Berhasil Dihapus.',
                    icon             : 'success'               ,
                    cancelButtonColor: '#d33'                  ,
                    confirmButtonText: 'Oke'
                });

                getAllData()
            },
            error: function(err) {
                if (err.status = 422) {
                    let data = err.responseJSON
                    let errorRes = data.errors;
                    if (errorRes.length >= 1) {
                        $.each(errorRes.data, (i, d) => {
                            $(`#alert-${i}`).html(d)
                        })
                    }
                } else {
                    iziToast.error({
                        title   : 'Error'                    ,
                        message : 'Server sedang maintenance',
                        position: 'topRight'
                    });
                }
            },
            dataType   : "json"
        });
    }

    function getAllData() {
        // $('#table-data').DataTable().destroy()
        $.get(`${baseUrl}/api/v1/flood`, (res) => {
            let data = res.data

            $('#tb-body').html('')
            if (data.length > 0) {
                $.each(data, (i,d) => {
                        $('#tb-body').append(`
                        <tr>
                            <td></td>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.type}</td>
                            <td class="text-capitalize">${d.level}</td>
                            <td class="text-capitalize">${d.priority}</td>
                            <td>
                                <button id="btn-edit" type="button" data-id="${d.id}" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                <button id="btn-del" type="button" data-id="${d.id}" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                            </td>
                        </tr>
                    `)
                })
            } else {
                $('#tb-body').append(`
                <tr>
                    <td colspan="6" style="text-align: center">
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
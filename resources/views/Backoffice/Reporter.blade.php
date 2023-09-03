@extends('layout.Base')
@section('title')
    Data Pelapor
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="sparkline13-list">
        <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
                <h1>Table<span class="table-project-n"> Pelapor</span></h1>
                <button type="button" id="btn-add" class="btn btn-custon-rounded-three btn-primary" style="margin-bottom: 15px; margin-top: 10px"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </div>
        </div>
        <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                    <select class="form-control dt-tb">
                        <option value="">Export</option>
                        <option value="all">Export Semua</option>
                        <option value="selected">Export Pilihan</option>
                    </select>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="id">No</th>
                            <th data-field="name" data-editable="true">Nama</th>
                            <th data-field="email" data-editable="true">No Hp</th>
                            <th data-field="phone" data-editable="true">foto Selfie</th>
                            <th data-field="phone" data-editable="true">Alamat</th>
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
                    <form action="" id="form-data" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group-inner">
                            <label style="float: left">Nama</label>
                            <input type="text" name="name" id="name" class="form-control val" placeholder="Input disini">
                            <span class="text-danger alrt" id="alert-name"></span>
                        </div>
                        <div class="form-group-inner">
                            <label style="float: left">No Hp</label>
                            <input type="text" name="phone" id="phone" class="form-control val" placeholder="Input disini">
                            <span class="text-danger alrt" id="alert-phone"></span>

                        </div>
                        <div class="form-group-inner">
                            <label style="float: left">Alamat</label>
                            <textarea name="address" id="address" class="form-control val" rows="7"></textarea>
                            <span class="text-danger alrt" id="alert-address"></span>
                        </div>
                        <div class="form-group-inner">
                            <label style="float: left">Foto Selfie</label>
                            <input type="file" name="selfie" id="selfie" class="form-control val">
                            <span class="text-danger alrt" id="alert-selfie"></span>
                        </div>
                        <img id="imgPreview" src="" alt="" style="max-width: 10rem;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-custon-four btn-md btn-danger">Cancel</button>
                    <button type="button" id="btn-simpan" class="btn btn-custon-four btn-md btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal --}}
@endsection
@section('script')
    <script>
        const baseUrl = `{{ config('app.url') }}`


    function clearInput() {
        $('.val'      ).val ('')
        $('.alrt' ).html('')
        $('#imgPreview').attr('src', ``);
    }

    $(document).on('click', '#btn-add', function() {
        clearInput()
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
                    url: `${baseUrl}/api/v1/reporter/${dataId}`,
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

    $('#selfie').change(function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    });

    $(document).on('click', '#btn-edit', function() {
            let dataId = $(this).data('id');
            $.get(`${baseUrl}/api/v1/reporter/` + dataId, function(res) {
                clearInput()
                $('#modal-data').modal('show');
                $('#id').val(res.data.id);
                $('#name').val(res.data.name);
                $('#phone').val(res.data.phone);
                $('#address').val(res.data.address);
                $('#imgPreview').attr('src', `{{ asset('reporter-image/${res.data.selfie}') }}`);
            });
        });

    $('#btn-simpan').click(function (e) {
            e.preventDefault();
            $(this).html('Simpan');
            let submitButton = $(this).prop('disabled')

            if(!submitButton){
                let foto = $('#selfie').prop('files')[0]
                let data = new FormData($('#form-data')[0]);
                console.log($('#form-data')[0]);
                $.ajax({
                    url        : `${baseUrl}/api/v1/reporter`,
                    method     : "POST"                    ,
                    data       : data                      ,
                    cache      : false                     ,
                    contentType: false                     ,
                    processData: false                     ,
                    success: function(result) {
                        console.log(result);
                        let data = result.data;
                            Swal.fire({
                                title            : 'Success'                ,
                                text             : 'Data Berhasil diproses.',
                                icon             : 'success'                ,
                                cancelButtonColor: '#d33'                   ,
                                confirmButtonText: 'Oke'
                            });
                            getAllData()
                            $('#modal-data').modal('hide');
                    },
                    error: function(result) {
                        if (result.status = 422) {
                            let data = result.responseJSON
                            let errorRes = data.errors;
                            if (errorRes.length >= 1) {
                                $('#alert-name'    ).html(errorRes.data.name    );
                                $('#alert-phone'   ).html(errorRes.data.phone   );
                                $('#alert-selfie'  ).html(errorRes.data.selfie  );
                                $('#alert-address' ).html(errorRes.data.address );
                            }
                        } else {
                            let msg = 'Sedang pemeliharaan server'
                            Swal.fire({
                                title            : 'Error'                ,
                                text             : msg,
                                icon             : 'warning'                ,
                                cancelButtonColor: '#d33'                   ,
                                confirmButtonText: 'Oke'
                            });
                        }
                    }
                });
            }
        });

    function getAllData() {
        $.get(`${baseUrl}/api/v1/reporter`, (res) => {
            let data = res.data

            $('#tb-body').html('')
            if (data.length > 0) {
                $.each(data, (i,d) => {
                        $('#tb-body').append(`
                        <tr>
                            <td></td>
                            <td>${i + 1}</td>
                            <td class="text-capitalize">${d.name}</td>
                            <td class="text-capitalize">${d.phone}</td>
                            <td style="width:20%;"><img width="100%" style="max-width: 5rem" src="{{ asset('reporter-image/${d.selfie}') }}"></td>
                            <td class="text-capitalize">${d.address}</td>
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
                    <td colspan="7" style="text-align: center">
                        Data tidak ditemukan <br>
                        Silahkan tambah data terlebih dahulu
                    </td>
                </tr>
            `)
            }
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
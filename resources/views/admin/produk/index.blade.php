@extends('admin._layouts.index')

@push('cssScript')
    @include('admin._layouts.css.css')
@endpush

@push('user-setting')
    menu-item-open menu-item-here
@endpush

@push('aktif-user-setting')
    text-primary
@endpush

@push($title)
    menu-item-active
@endpush

@section('content')
    <!--begin::Content wrapper-->

    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        {{ Helper::head($title) }}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/admin') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ Helper::head($title) }}</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Tables Widget 11-->
                <div class="card mb-5 mb-xl-8">

                    @include('admin._card.action')

                    <!--begin::Body-->
                    <div class="card-body py-3">

                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <div class="py-5">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 gy-4">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800">
                                                <th width="8%">No</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Deskripsi</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="datatabel">
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-wrap py-2 mr-3">
                                    <div class="text-center pagination">
                                        <div id="contentx"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-3">
                                    <ul class="pagination twbs-pagination">
                                    </ul>
                                </div>
                            </div>


                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->

                </div>
                <!--end::Tables Widget 11-->


            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


    @include('admin.' . $title . '._form')
@endsection

@push('jsScript')
    @include('admin._layouts.js.js')

    <script type="text/javascript">
        $(document).ready(function() {
            loadpage('', 5);

            var $pagination = $('.twbs-pagination');
            var defaultOpts = {
                totalPages: 1,
                prev: '&#8672;',
                next: '&#8674;',
                first: '&#8676;',
                last: '&#8677;',
            };
            $pagination.twbsPagination(defaultOpts);

            function loaddata(page, cari, jml) {
                $.ajax({
                    url: '{{ route($title . '.data') }}',
                    data: {
                        "page": page,
                        "cari": cari,
                        "jml": jml
                    },
                    type: "GET",
                    datatype: "json",
                    success: function(data) {
                        $(".datatabel").html(data.html);
                    }
                });
            }

            function loadpage(cari, jml) {
                $.ajax({
                    url: '{{ route($title . '.data') }}',
                    data: {
                        "cari": cari,
                        "jml": jml
                    },
                    type: "GET",
                    datatype: "json",
                    success: function(response) {
                        console.log(response);
                        if ($pagination.data("twbs-pagination")) {
                            $pagination.twbsPagination('destroy');
                            $(".datatabel").html('<tr><td colspan="4">Data not found</td></tr>');
                        }
                        $pagination.twbsPagination($.extend({}, defaultOpts, {
                            startPage: 1,
                            totalPages: response.total_page,
                            visiblePages: 8,
                            prev: '&#8672;',
                            next: '&#8674;',
                            first: '&#8676;',
                            last: '&#8677;',
                            onPageClick: function(event, page) {
                                if (page == 1) {
                                    var to = 1;
                                } else {
                                    var to = page * jml - (jml - 1);
                                }
                                if (page == response.total_page) {
                                    var end = response.total_data;
                                } else {
                                    var end = page * jml;
                                }
                                $('#contentx').text('Showing ' + to + ' to ' + end +
                                    ' of ' +
                                    response.total_data + ' entries');
                                loaddata(page, cari, jml);
                            }
                        }));
                    }
                });
            }

            // $("#pencarian, #show").keyup(function (event) {
            $("#pencarian, #jumlah").on('keyup change', function(event) {
                let cari = $('#pencarian').val();
                let jml = $('#jumlah').val();
                loadpage(cari, jml);
            });

            // proses simpan
            $('#saveBtn').click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    e.preventDefault();
                    let formData = new FormData(formInput);
                    formData.append('gambar', gambar);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        url: "{{ route($title . '.store') }}",
                        type: "POST",
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            $('#formInput').trigger("reset");
                            $('#kt_modal_new_target').modal('hide');
                            loadpage('', 5);
                            toastr.success("Successful save data!");
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#formInput').trigger("reset");
                            $('#kt_modal_new_target').modal('hide');
                            toastr.error("Failed to save data!");
                        }
                    });
                }
            });

            // proses update
            $('#updateBtn').click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    let id = $('#formId').val();
                    e.preventDefault();
                    let formData = new FormData(formInput);
                    formData.append('gambar', gambar);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        url: '{{ $title }}' + '/' + id,
                        type: "POST",
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            $('#formInput').trigger("reset");
                            $('#kt_modal_new_target').modal('hide');
                            loadpage('', 5);
                            toastr.success("Successful update data!");
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#formInput').trigger("reset");
                            $('#kt_modal_new_target').modal('hide');
                            toastr.error("Failed to update data!");
                        }
                    });
                }
            });

            // proses delete data
            $('body').on('click', '.deleteData', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: "Are you sure to Delete?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "DELETE",
                            url: '{{ $title }}' + '/' + id,
                            success: function(data) {
                                loadpage('', 5);
                                toastr.success("Successful delete data!");
                            },
                            error: function(data) {
                                toastr.error("Failed delete data!");
                            }
                        });
                    }
                });
            });


        });
    </script>
@endpush

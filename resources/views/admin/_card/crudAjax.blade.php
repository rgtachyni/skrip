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
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('#formInput').serialize(),
                    url: "{{ route($title . '.store') }}",
                    type: "POST",
                    dataType: 'json',
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
                $.ajax({
                    data: $('#formInput').serialize(),
                    url: '{{ $title }}' + '/' + id,
                    type: "PUT",
                    dataType: 'json',
                    success: function(data) {
                        $('#formInput').trigger("reset");
                        $('#kt_modal_new_target').modal('hide');
                        loadpage('', 5);
                        toastr.success("Successful update data!");
                    },
                    error: function(data) {
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

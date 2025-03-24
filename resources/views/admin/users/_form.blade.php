<div class="modal fade" id="ajaxModel" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                {{-- <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    x
                </div> --}}
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form class="form" action="" id="formInput" name="formInput">
                    @csrf
                    <input type="hidden" name="id" id="formId">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="mb-3"><label id="headForm"></label> {{ Helper::head($title) }}</h1>
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama</span>
                            <i class="fas ms-2 fs-7"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="ex: jhon doe"
                            name="name" id="name" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Username</label>
                            <input type="text" class="form-control form-control-solid" placeholder="ex: admin"
                                name="username" id="username" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Email</label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="ex: admin@gmail.com" name="email" id="email" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Password</label>
                            <input type="password" class="form-control form-control-solid" placeholder="ex: ****"
                                name="password" id="password" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Role User</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select roles user" name="role_id" id="role_id">
                                <option value="">Select roles user...</option>
                                @foreach (Helper::getData('roles') as $v)
                                    <option value="{{ $v->id }}">{{ $v->name }}
                                        {{ $v->role->nama ?? null }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->


                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn" value="update">Update</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

@push('jsScriptAjax')
    <script type="text/javascript">
        //Tampilkan form input
        function createForm() {
            $("#headForm").empty();
            $("#headForm").append("Form Input");
            $('#saveBtn').show();
            $('#updateBtn').hide();
            $('#formId').val('');
            $('#formInput').trigger("reset");
            $('#ajaxModel').modal('show');
        }

        //Tampilkan form edit
        function editForm(id) {
            $.ajax({
                url: '{{ $title }}' + '/' + id + '/edit',
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $("#headForm").empty();
                    $("#headForm").append("Form Edit");
                    $('#formInput').trigger("reset");
                    $('#ajaxModel').modal('show');
                    $('#saveBtn').hide();
                    $('#updateBtn').show();
                    $('#formId').val(data.id);
                    $('#name').val(data.name);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#role_id').val(data.role_id).trigger('change');
                    $('#active').val(data.active).trigger('change');
                },
                error: function() {
                    toast("Tidak dapat menampilkan data", "error", 1500);
                }
            });
        }
    </script>
@endpush

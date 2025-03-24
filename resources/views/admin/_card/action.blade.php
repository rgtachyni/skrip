<div class="card-header align-items-center py-5 gap-2 gap-md-5">

    <div class="w-100 mw-150px">
        <!--begin::Select2-->
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
            data-placeholder="Per Page" id="jumlah">
            <option value=""></option>
            <option>5</option>
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
        </select>
        <!--end::Select2-->
    </div>

    <!--begin::Card title-->
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                    <path
                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Search"
                id="pencarian" />
        </div>
        <!--end::Search-->
    </div>
    <!--end::Card title-->

    <!--begin::Card toolbar-->
    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
        <!--begin::Add product-->
        <a onclick="createForm()" class="btn btn-primary">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Add New
        </a>
        <!--end::Add product-->
    </div>
    <!--end::Card toolbar-->
</div>

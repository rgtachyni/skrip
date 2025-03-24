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
                        {{ Helper::head($title) }}
                    </h1>
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
                    <!--begin::Header-->
                    {{-- <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1"> {{ Helper::head($title) }}</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-light-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                            rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                            rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->New Member
                            </a>
                        </div>
                    </div> --}}
                    <!--end::Header-->

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
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                {{-- <th>Email</th> --}}
                                                <th>Level</th>
                                                <th width="12%">Action</th>
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

    @include('admin._card.crudAjax')
@endpush

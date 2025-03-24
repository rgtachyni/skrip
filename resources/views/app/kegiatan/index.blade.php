@extends('app._layouts.index')

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">Kegiatan / Event</h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="#">Kegiatan</a></li>
                    <li>/</li>
                    <li><a href="page-blog-grid.html">All</a></li>

                </ul>
            </div>
        </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="c-content-blog-post-card-1-grid">

                            <div class="row">
                                @foreach ($data as $v)
                                    <div class="col-md-6">
                                        <div class="c-content-blog-post-card-1 c-option-2 c-bordered">
                                            <div class="c-media c-content-overlay">
                                                <div class="c-overlay-wrapper">
                                                    <div class="c-overlay-content">
                                                        <a href="#"><i class="icon-link"></i></a>
                                                        <a href="{{ asset('public/uploads/kegiatan/' . $v->gambar) }}"
                                                            data-lightbox="fancybox" data-fancybox-group="gallery">
                                                            <i class="icon-magnifier"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <img class="c-overlay-object img-responsive"
                                                    src="{{ asset('public/uploads/kegiatan/' . $v->gambar) }}"
                                                    alt="">
                                            </div>
                                            <div class="c-body">
                                                <div class="c-title c-font-bold c-font-uppercase">
                                                    <a
                                                        href="{{ route('kegiatan.detail', $v->id) }}">{{ $v->nama_kegiatan }}</a>
                                                </div>
                                                <div class="c-author">
                                                    Tanggal Kegiatan : <span
                                                        class="c-font-uppercase">{{ Helper::getDateIndo($v->tanggal_kegiatan) }}</span>
                                                </div>

                                                {{-- <div class="c-panel">
                                                    <div class="c-comments"><a href="#"><i class="icon-speech"></i> 30
                                                            comments</a></div>
                                                </div> --}}
                                                <p>
                                                    {{ $v->deskripsi }}
                                                </p>

                                                <a href="{{ route('kegiatan.detail', $v->id) }}"
                                                    class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- <div class="c-pagination">
                                <ul class="c-content-pagination c-theme">
                                    <li class="c-prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="c-active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="c-next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->

        <!-- END: PAGE CONTENT -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

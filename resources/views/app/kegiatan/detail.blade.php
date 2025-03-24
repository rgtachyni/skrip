@extends('app._layouts.index')

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">Kegiatan Detail</h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="#">Kegiatan</a></li>
                    <li>/</li>
                    <li><a href="page-blog-post.html">Detail</a></li>

                </ul>
            </div>
        </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="c-content-blog-post-1-view">
                            <div class="c-content-blog-post-1">
                                <div class="c-media">
                                    <div class="c-content-media-2" data-slider="owl">
                                        <div class="" data-rtl="false" data-single-item="true" data-auto-play="4000">
                                            <div class="item">
                                                <div class="c-content-media-2"
                                                    style="background-image: url({{ asset('public/uploads/kegiatan/' . $data->gambar) }}); min-height: 460px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="c-title c-font-bold c-font-uppercase">
                                    <a href="#">{{ $data->nama_kegiatan }}</a>
                                </div>

                                <div class="c-panel c-margin-b-30">
                                    <div class="c-date"><span class="c-font-uppercase">
                                            Tanggal Kegiatan : {{ Helper::getDateIndo($data->tanggal_kegiatan) }}</span>
                                    </div>

                                </div>

                                <div class="c-desc">
                                    <p>
                                        {{ $data->deskripsi }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->

                        <div class="c-content-ver-nav">
                            <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                                <h3 class="c-font-bold c-font-uppercase">Kategori</h3>
                                <div class="c-line-left c-theme-bg"></div>
                            </div>
                            <ul class="c-menu c-arrow-dot c-theme">
                                @foreach (Helper::getData('kategori') as $v)
                                    <li>
                                        <a href="{{ route('kategori', $v->id) }}">
                                            {{ $v->nama }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- END: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->

        <!-- END: PAGE CONTENT -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

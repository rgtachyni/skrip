@extends('app._layouts.index')

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
        <section class="c-layout-revo-slider c-layout-revo-slider-4" dir="ltr">
            <div class="tp-banner-container c-theme">
                <div class="tp-banner rev_slider" data-version="5.0">
                    <ul>
                        <!--BEGIN: SLIDE #1 -->
                        @foreach ($wisata->take(3) as $v)
                            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                                <img alt="" src="{{ asset('public/uploads/wisata/' . $v->gambar) }}"
                                    data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="tp-caption customin customout" data-x="center" data-y="center" data-hoffset=""
                                    data-voffset="-50" data-speed="500" data-start="1000" data-transform_idle="o:1;"
                                    data-transform_in="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                    data-transform_out="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                    data-splitin="none" data-splitout="none" data-elementdelay="0.1"
                                    data-endelementdelay="0.1" data-endspeed="600">
                                    <h3
                                        class="c-main-title-circle c-font-48 c-font-bold c-font-center c-font-uppercase c-font-white c-block">
                                        {{ $v->nama_wisata }}
                                    </h3>
                                </div>
                                <div class="tp-caption lft" data-x="center" data-y="center" data-voffset="110"
                                    data-speed="900" data-start="2000" data-transform_idle="o:1;"
                                    data-transform_in="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                    data-transform_out="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;">
                                    <a href=""
                                        class="c-action-btn btn btn-lg c-btn-square c-theme-btn c-btn-bold c-btn-uppercase">Learn
                                        More</a>
                                </div>
                            </li>
                        @endforeach
                        <!--END -->
                    </ul>
                </div>
            </div>
        </section><!-- END: LAYOUT/SLIDERS/REVO-SLIDER-4 -->

        <!-- BEGIN: CONTENT/TILES/TILE-3 -->
        <div class="c-content-box c-size-md c-bg-white">
            <div class="c-content-tile-grid c-bs-grid-reset-space" data-auto-height="true">
                <div class="c-content-title-1 wow animate fadeInDown">
                    <h3 class="c-font-uppercase c-center c-font-bold">Destinasi Wisata</h3>
                    <div class="c-line-center"></div>
                </div>
            </div>
        </div><!-- END: CONTENT/TILES/TILE-3 -->

        <!-- BEGIN: CONTENT/MISC/LATEST-ITEMS-1 -->
        <div class="c-content-box c-size-md c-bg-grey-1">
            <div class="container">
                <div class="row" data-auto-height="true">
                    @foreach ($wisata->take(6) as $v)
                        <div class="col-md-4 c-margin-b-30 wow animate fadeInDown">
                            <div class="c-content-media-1" data-height="height">
                                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                    {{ $v->kategori->nama }}</div>
                                <img src="{{ asset('public/uploads/wisata/' . $v->gambar) }}" width="300px" alt="">
                                <a href="{{ route('wisata.detail', $v->id) }}"
                                    class="c-title c-font-uppercase c-font-bold c-theme-on-hover">{{ $v->nama_wisata }}</a>
                                <p>{{ Str::limit($v->deskripsi), 100, '...' }}</p>
                                <a href="{{ route('wisata.detail', $v->id) }}"
                                    class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- END: CONTENT/MISC/LATEST-ITEMS-1 -->


        <!-- BEGIN: CONTENT/ISOTOPE/GALLERY-1 -->
        <div class="c-content-box c-size-md c-bg-img-center"
            style="background-image: url({{ asset('app/theme/assets/base/img/content/backgrounds/bg-82.jpg') }})">
            <div class="container">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold c-font-white">Galeri</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="c-content-isotope-gallery c-opt-1">
                    @foreach ($galeri->take(6) as $v)
                        <div class="c-content-isotope-item wow animate zoomIn" data-wow-delay="0">
                            <div class="c-content-isotope-image-container">
                                <img class="c-content-isotope-image"
                                    src="{{ asset('public/uploads/galeri/' . $v->gambar) }}" />
                                <div class="c-content-isotope-overlay c-ilightbox-image-1"
                                    href="{{ asset('public/uploads/galeri/' . $v->gambar) }}"
                                    data-options="thumbnail:'../assets/base/img/content/stock/13.jpg'" data-caption="">
                                    <div class="c-content-isotope-overlay-icon">
                                        <i class="fa fa-plus c-font-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div><!-- END: CONTENT/ISOTOPE/GALLERY-1 -->

        <!-- BEGIN: CONTENT/TESTIMONIALS/TESTIMONIALS-6-1 -->
        <div class="c-content-box c-size-md c-bg-grey-1">
            <div class="container">
                <div class="c-content-blog-post-card-1-slider" data-slider="owl">
                    <div class="c-content-title-1">
                        <h3 class="c-center c-font-uppercase c-font-bold">Event Terbaru</h3>
                        <div class="c-line-center c-theme-bg"></div>
                    </div>
                </div>
            </div>
        </div><!-- END: CONTENT/TESTIMONIALS/TESTIMONIALS-6-1 -->

        <!-- BEGIN: CONTENT/MISC/LATEST-ITEMS-1 -->
        <div class="c-content-box c-size-md c-bg-grey-1">
            <div class="container">
                <div class="row" data-auto-height="true">
                    @foreach ($kegiatan->take(6) as $v)
                        <div class="col-md-4 c-margin-b-30 wow animate fadeInDown" data-wow-delay="0.2s">
                            <div class="c-content-media-1" data-height="height">
                                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                                    Event</div>
                                <img src="{{ asset('public/uploads/kegiatan/' . $v->gambar) }}" width="300px"
                                    alt="">
                                <a href="{{ route('kegiatan.detail', $v->id) }}"
                                    class="c-title c-font-uppercase c-font-bold c-theme-on-hover">{{ $v->nama_kegiatan }}</a>
                                <p>{{ Str::limit($v->deskripsi, 100, '...') }}</p>
                                <div class="c-date">
                                    {{ Helper::getDateIndo($v->tanggal_kegiatan) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- END: CONTENT/MISC/LATEST-ITEMS-1 -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

@extends('app._layouts.index')

@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
        <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center"
            style="background-image: url({{ asset('app/theme/assets/base/img/content/backgrounds/bg-96.jpg') }})">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Gallery</h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="#" class="c-font-dark">Galeri</a></li>
                    <li class="c-font-dark">/</li>
                    <li><a href="page-lightbox-gallery.html" class="c-font-dark">All</a></li>

                </ul>
            </div>
        </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md  c-bg-white c-overflow-hide">
            <div id="grid-container" class="cbp">
                @foreach ($data as $v)
                    <div class="cbp-item identity logos">
                        <a href="{{ asset('public/uploads/galeri/' . $v->gambar) }}" class="cbp-caption cbp-lightbox"
                            data-title="{{ $v->nama }}">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{ asset('public/uploads/galeri/' . $v->gambar) }}" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignLeft">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-desc">{{ $v->nama }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- END: PAGE CONTENT -->
    </div>
@endsection

@extends('app._layouts.index')

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">Wisata Detail</h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="#">Wisata</a></li>
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
                                                    style="background-image: url({{ asset('public/uploads/sejarah/' . $data->gambar) }}); min-height: 460px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="c-title c-font-bold c-font-uppercase">
                                    <a href="#">{{ $data->nama_budaya }}</a>
                                </div>

                                {{-- <div class="c-panel c-margin-b-30">
                                    <ul class="c-tags c-theme-ul-bg">
                                        <li>{{ $data->kategori->nama }}</li>
                                    </ul>
                                    <div class="c-comments"><a href="#"><i class="icon-speech"></i> 30 comments</a>
                                    </div>
                                </div> --}}

                                <div class="c-desc">
                                    <p>
                                        {{ $data->deskripsi }}
                                    </p>
                                </div>

                                <div class="c-comments">

                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Comments(30)</h3>
                                        <div class="c-line-left"></div>
                                    </div>

                                    <div class="c-comment-list">

                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt=""
                                                        src="../../assets/base/img/content/team/team1.jpg">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#" class="c-font-bold">Sean</a> on
                                                    <span class="c-date">23 May 2015, 10:40AM</span>
                                                </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo.
                                                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                            </div>
                                        </div>

                                    </div>

                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Name" class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Email" class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Website" class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="message" placeholder="Write comment here ..." class="form-control c-square"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Submit</button>
                                        </div>
                                    </form>

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
                                <li><a href="#">Fasion & Arts</a></li>
                                <li><a href="#">UX & Web Design</a></li>
                                <li><a href="#">Mobile Development</a></li>
                                <li><a href="#">Internet Marketing</a></li>
                                <li><a href="#">Frontend Development</a></li>
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

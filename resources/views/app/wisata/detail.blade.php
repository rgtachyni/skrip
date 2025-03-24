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
                                                    style="background-image: url({{ asset('public/uploads/wisata/' . $data->gambar) }}); min-height: 460px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="c-title c-font-bold c-font-uppercase">
                                    <a href="#">{{ $data->nama_wisata }}</a>
                                </div>

                                <div class="c-panel c-margin-b-30">
                                    <ul class="c-tags c-theme-ul-bg">
                                        <li>{{ $data->kategori->nama }}</li>
                                    </ul>
                                    <div class="c-comments"><a href="#"><i class="icon-speech"></i>
                                            {{ Helper::getKomentar($data->id)->count() }} Komentar</a>
                                    </div>
                                </div>

                                <div class="c-desc">
                                    <p>
                                        {{ $data->deskripsi }}
                                    </p>

                                    <p>
                                        <b>Lokasi Wisata : --> <a href="{{ $data->lokasi }}" target="_blank">Lihat
                                                Disini</a></b>
                                    </p>
                                </div>

                                <div class="c-comments">

                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Komentar
                                            ( {{ Helper::getKomentar($data->id)->count() }} )</h3>
                                        <div class="c-line-left"></div>
                                    </div>

                                    <div class="c-comment-list">
                                        @foreach ($komentar as $v)
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading"> {{ $v->nama }}
                                                    </h4>
                                                    {{ $v->isi }}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                    <form action="{{ route('wisata.comment.store', $data->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nama" placeholder="Your Name"
                                                class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="isi" placeholder="Write comment here ..." class="form-control c-square"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="saveBtn"
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
                                @foreach ($kategori as $v)
                                    <li><a href="#">{{ $v->nama }}</a></li>
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

    <script type="text/javascript">
        // proses simpan
        $('#saveBtn').click(function(e) {
            var valid = this.form.checkValidity();
            if (valid) {
                e.preventDefault();
                let formData = new FormData(formInput);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    url: "{{ route('wisata.comment.store', ['id' => $data->id]) }}",
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
    </script>
@endsection

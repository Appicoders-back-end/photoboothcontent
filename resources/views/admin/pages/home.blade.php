@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
    <!--  summernote -->
    <link href="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.css" rel="stylesheet">
    <style>
        .editor-title {
            padding: 0 0 10px 0 !important;
        }

        .editor-desc {
            padding: 0 0 0 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
@endsection
@section('content')
    <section class="wrapper">
        @if(Session::has('success') || Session::has('error') || $errors->any())
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <div class="card-body">
                            @include('admin.layouts.messages')
                        </div>
                    </section>
                </div>
            </div>
        @endif
        <h6>Update Home Page</h6>
        <form class="needs-validation" action="{{route('admin.storeHomePage')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$home->id}}">
            @if($content)
                @if(isset($content->headerSectionImg))
                    <input type="hidden" name="old_image" value="{{ $content->headerSectionImg }}">
                @endif
                @if(isset($content->aboutSectionImg))
                    <input type="hidden" name="old_image_about" value="{{ $content->aboutSectionImg }}">
                @endif
                @if(isset($content->servicesSectionImg))
                    <input type="hidden" name="old_image_service" value="{{ $content->servicesSectionImg }}">
                @endif 
                @if(isset($content->bulletOneImg))
                    <input type="hidden" name="old_b_one_image_service" value="{{ $content->bulletOneImg }}">
                @endif
                @if(isset($content->bulletTwoImg))
                    <input type="hidden" name="old_b_two_image_service" value="{{ $content->bulletTwoImg }}">
                @endif
                @if(isset($content->bulletThreeImg))
                    <input type="hidden" name="old_b_three_image_service" value="{{ $content->bulletThreeImg }}">
                @endif    
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Hero Section (Header)
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="headerSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="headerSectionHeading"
                                           name="header_section_heading"
                                           placeholder="Enter Heading" value="{{old('header_section_heading', $content->header_section_heading ?? null)}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="headerSectionDescription">Description</label>
                                    <textarea class="form-control" name="header_section_description"
                                              id="headerSectionDescription" cols="30"
                                              rows="10">{!! old('header_section_description', $content->header_section_description ?? null) !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="headerSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->headerSectionImg))
                                               data-default-file="{{ url('/') . '/' . $content->headerSectionImg }}"
                                           @endif
                                    />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="headerSectionButtonText">Button Text</label>
                                    <input type="text" class="form-control" id="headerSectionButtonText"
                                           name="header_section_button_text"
                                           placeholder="Enter Button Text"
                                           value="{{old('header_section_button_text', $content->header_section_button_text ?? null)}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Header end-->

            <!-- Promo section start-->
            <div class="row" style="display: none;">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Promo Section
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="promoSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="promoSectionHeading"
                                           name=""
                                           placeholder="Enter Heading" value="">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Promo Section end-->

            <!-- About start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            About Us Section
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="aboutSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="aboutSectionHeading"
                                           name="about_section_heading"
                                           placeholder="Enter Heading" value="{{old('about_section_heading', $content->about_section_heading ?? null)}}"
                                           required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="aboutSectionSubHeading">SubHeading</label>
                                    <input type="text" class="form-control" id="aboutSectionSubHeading"
                                           name="about_section_sub_heading"
                                           placeholder="Enter Sub Heading" value="{{old('about_section_sub_heading', $content->about_section_sub_heading ?? null)}}"
                                           required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="aboutSectionDescription">Description</label>
                                    <textarea class="form-control" name="about_section_description"
                                              id="aboutSectionDescription" cols="30"
                                              rows="10" required>{!! old('about_section_description',$content->about_section_description ?? null) !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file"
                                           class="dropify"
                                           name="aboutSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->aboutSectionImg))
                                               data-default-file="{{ url('/') . '/' . $content->aboutSectionImg }}"
                                           @endif
                                    />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="aboutSectionButtonText">Button Text</label>
                                    <input type="text" class="form-control" id="aboutSectionButtonText"
                                           name="about_section_button_text"
                                           placeholder="Enter Button Text"
                                           value="{{old('about_section_button_text', $content->about_section_button_text ?? null)}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- About end-->

            <!-- Content Store section start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Content Store Section
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="contentStoreSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="contentStoreSectionHeading"
                                           name="content_store_section_heading"
                                           placeholder="Enter Heading" value="{{old('content_store_section_heading', $content->content_store_section_heading ?? null)}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Content Store Section end-->

            <!-- Coupons section start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Coupons Section
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="couponsSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="couponsSectionHeading"
                                           name="coupons_section_heading"
                                           placeholder="Enter Heading" value="{{old('coupons_section_heading', $content->coupons_section_heading ?? null)}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Coupons Section end-->

            <!-- Services section start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Services Section
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="servicesSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="servicesSectionHeading"
                                           name="services_section_heading"
                                           placeholder="Enter Heading" value="{{old('services_section_heading', $content->services_section_heading ?? null)}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="servicesSectionDescription">Description</label>
                                    <textarea class="form-control" name="services_section_description"
                                              id="servicesSectionDescription" cols="30"
                                              rows="10">{!! old('services_section_description', $content->services_section_description ?? null) !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="servicesSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->servicesSectionImg))
                                               data-default-file="{{ url('/') . '/' . $content->servicesSectionImg }}"
                                           @endif
                                    />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Service Bullet 1
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="bulletOneServicesSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->bulletOneImg))
                                               data-default-file="{{ url('/') . '/' . $content->bulletOneImg }}"
                                           @endif
                                    />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="servicesSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="servicesSectionHeading"
                                           name="bullet_one_section_heading"
                                           placeholder="Enter Heading" value="{{old('bullet_one_section_heading', $content->bullet_one_section_heading ?? null)}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="bullet_one_description">Description</label>
                                    <textarea class="form-control" name="bullet_one_description" id="bullet_one_description" cols="30" rows="10">{!! old('bullet_one_description', $content->bullet_one_description ?? null) !!}
                                  </textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Service Bullet 2
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="bulletTwoServicesSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->bulletTwoImg))
                                               data-default-file="{{ url('/') . '/' . $content->bulletTwoImg }}"
                                           @endif
                                    />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="servicesSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="servicesSectionHeading"
                                           name="bullet_two_section_heading"
                                           placeholder="Enter Heading" value="{{old('bullet_two_section_heading', $content->bullet_two_section_heading ?? null)}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="bullet_two_description">Description</label>
                                    <textarea class="form-control" name="bullet_two_description" id="bullet_two_description" cols="30" rows="10">{!! old('bullet_two_description', $content->bullet_two_description ?? null) !!}
                                  </textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Service Bullet 3
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="bulletThreeServicesSectionImage"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->bulletThreeImg))
                                               data-default-file="{{ url('/') . '/' . $content->bulletThreeImg }}"
                                           @endif
                                    />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="servicesSectionHeading">Heading</label>
                                    <input type="text" class="form-control" id="servicesSectionHeading"
                                           name="bullet_three_section_heading"
                                           placeholder="Enter Heading" value="{{old('bullet_three_section_heading', $content->bullet_three_section_heading ?? null)}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="bullet_three_description">Description</label>
                                    <textarea class="form-control" name="bullet_three_description" id="bullet_three_description" cols="30" rows="10">{!! old('bullet_three_description', $content->bullet_three_description ?? null) !!}
                                  </textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Services section end-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <div class="card-body">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });

        $(document).ready(function () {
            $('.summernote').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                 // set focus to editable area after initializing summernote
            });
        });

        $(document).ready(function () {
            // alert('working');
            $('.parent_category_option').on('change', function (e) {
                /* var optionSelected = $("option:selected", this);
                 var valueSelected = this.value;*/
                $(".child_category_option").css("display", "none");
                var el = $('.status_option');
                el.addClass('col-md-12 mb-3');
                el.removeClass('col-md-6 mb-3');
            });
        });
    </script>
@endsection



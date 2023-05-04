@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->heading ? $content->heading : '' : ''}}</h3>
                    <h2>{{ ($content) ? $content->sub_heading ? $content->sub_heading : '' : ''}}</h2>
                    <p>{!! ($content) ? $content->description ? $content->description : '' : '' !!}</p>
                    @if($content)
                        @if($content->content_button_text)
                            <a class="btn btn-main"
                               href="{{route('memberships')}}">{{ ($content->content_button_text) ? $content->content_button_text : 'Become a member'}}
                                <span>
                                    <img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow">
                                </span>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6">
                    @if(isset($content->contentImg))
                        <img src="{{ url('/') . '/' . $content->contentImg }}" alt="Video frame" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
    <div class="container content-store-cont">
        <div class="row">
            <div class="col-lg-3 pt-5">
                <form action="{{route('content-store')}}" id="filter-form" method="GET">
                </form>
                <div class="mb-4">
                    <input name="keyword" type="text" class="form-control" placeholder="Search"
                           value="{{request()->get('keyword')}}" form="filter-form">
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h6 class="title">Categories </h6>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach($categories as $category)
                                    <label class="form-check parent-category">
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                               value="{{$category->id}}" id="parent_{{ $category->id }}"
                                               form="filter-form"
                                        @if(request()->get('categories') != null)
                                            {{ in_array($category->id, request()->get('categories')) ? 'checked' : null }}
                                            @endif
                                               onchange="parentChanged({{ $category->id }})">
                                        <span class="form-check-label">{{$category->name}}</span>
                                    </label>
                                    @if($category->has('subcategories'))
                                        @foreach($category->subcategories as $subcategory)
                                            <label class="form-check child-category">
                                                <input class="form-check-input child_{{ $category->id }}" type="checkbox" name="categories[]"
                                                       value="{{$subcategory->id}}"
                                                       form="filter-form"
                                                @if(request()->get('categories') != null)
                                                    {{ in_array($subcategory->id, request()->get('categories')) ? 'checked' : null }}
                                                    @endif  onchange="childChanged({{ $category->id }})"
                                                >
                                                <span class="form-check-label">{{$subcategory->name}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-2 d-flex justify-content-around">
                    <button type="submit" class="btn btn-main" form="filter-form">Filter</button>
                    <a href="{{route('content-store')}}" class="btn btn-main" form="filter-form">Clear</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row content-category-row">
                    @if($content_store->count() > 0)
                        @foreach($content_store as $content)
                            @include('partials.content', $content)
                        @endforeach
                    @endif
                </div>
                {{--@if($content_store->count() > 0)
                    <div class="mt-5 d-flex justify-content-center">
                        <a href="#" class="btn btn-main">Load More</a>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>

    <div id="exampleModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #00A8B3;color: #fff;">
                    <h5 class="modal-title">Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px;"></button>
                </div>
                <div class="modal-body">
                    <div id="contentVideo" class=" embed-responsive embed-responsive-16by9">
                        <video id="video-10" controls style="width: 100%;" >
                            <source src="" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $(document).on("click",'#video_content',function () {
                const videoSource = $(this).data('id');
                const isAlreadyDownloaded = $(this).data('download');
                if(isAlreadyDownloaded){
                    // controlsList="nodownload"
                    $("#video-10").removeAttr("controlsList");
                }else{
                    $('#video-10').attr('controlsList', 'nodownload');
                }
                // alert(isAlreadyDownloaded)
                $('video source').attr('src', videoSource)
                $('video')[0].load()
            });
        })

        function parentChanged(parent_id) {
            // alert('work parent'+parent_id)
            if ($('#parent_'+parent_id).prop("checked")) {
                $('.child_'+parent_id).prop("checked", true);
            }
            else {
                $('.child_'+parent_id).prop("checked", false);
            }
        }
        function childChanged(parent_id) {
            // alert('child work '+parent_id)
            if ($(".child_" + parent_id +":checked").length > 0)
            {
                $('#parent_'+parent_id).prop("checked", true);
            }
            else
            {
                // $('#parent_'+parent_id).prop("checked", false);
            }
        }

    </script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->sub_heading ? $content->sub_heading : '' : ''}}</h3>
                    <h2>{{ ($content) ? $content->heading ? $content->heading : '' : ''}}</h2>
                    <p>{{ ($content) ? $content->description ? $content->description : '' : ''}}</p>
                    @if($content)
                        @if($content->content_button_text)
                            <a class="btn btn-main"
                               href="membership.php">{{ ($content->content_button_text) ? $content->content_button_text : 'Become a member'}}
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
                                               value="{{$category->id}}"
                                               form="filter-form" {{in_array($category->id, request()->get('categories')) ? 'checked' : null}}>
                                        <span class="form-check-label">{{$category->name}}</span>
                                    </label>
                                    @if($category->has('subcategories'))
                                        @foreach($category->subcategories as $subcategories)
                                            <label class="form-check child-category">
                                                <input class="form-check-input" type="checkbox" name="categories[]"
                                                       value="{{$subcategories->id}}"
                                                       form="filter-form" {{in_array($subcategories->id, request()->get('categories')) ? 'checked' : null}}>
                                                <span class="form-check-label">{{$subcategories->name}}</span>
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
@endsection

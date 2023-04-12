@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h2>Want to make more money from your booth business?</h2>
                    <p>This really shouldn’t be that difficult, knowledge is power; content is king and support is
                        everything. We know what it takes to make your photo booth business a success.</p>
                    <a class="btn btn-main" href="membership.php">Become a member <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/content-section-image.png" alt="Photo farme" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
    <div class="container content-store-cont">
        <div class="row">
            <div class="col-lg-3 pt-5">
                <form action="{{route('content-store')}}" id="filter-form">

                </form>
                <div class="mb-4">
                    <input type="text" class="form-control" placeholder="Search" form="filter-form">
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
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}">
                                        <span class="form-check-label">{{$category->name}}</span>
                                    </label>
                                    @if($category->has('subcategories'))
                                        @foreach($category->subcategories as $subcategories)
                                            <label class="form-check child-category">
                                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{$subcategories->id}}">
                                                <span class="form-check-label">{{$subcategories->name}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-2 d-flex justify-content-center">
                    <a href="#" class="btn btn-main">Filter</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row content-category-row">
                    <div class="col-lg-4 col-md-6">
                        <div class="content-category-card video">
                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt="" class="content-card-img">
                            <div class="category-content-container">
                                <h4>Content item</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolores.</p>
                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#" class="btn btn-main bg-white text-dark">Download now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="#" class="btn btn-main">Load More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

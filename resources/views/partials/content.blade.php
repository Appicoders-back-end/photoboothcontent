    <div class="col-lg-4 col-md-6">
        <div class="content-category-card video">
            <img src="{{$content->getThumbnailImage()}}" alt="{{$content->name}}"
                 class="content-card-img">
            <div class="category-content-container">
                <h4>{{$content->name}}</h4>
                <p>{{ \Illuminate\Support\Str::limit($content->description, 60) }}</p>
                <a data-bs-toggle="modal" data-bs-target="#couponModal" data-content-id="{{$content->id}}" href="#"
                   class="btn btn-main bg-white text-dark">{{__('Download Now')}}</a>
{{--                <a href="javascript:;" onclick="openDownloadModal({{$content->id}})"--}}
{{--                   class="btn btn-main bg-white text-dark">{{__('Download Now')}}</a>--}}
            </div>
        </div>
    </div>

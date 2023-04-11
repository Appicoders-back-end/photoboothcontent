@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" style="text-align:center;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <strong>Success!</strong>
        <?= htmlentities(Session::get('success'))?>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" style="text-align:center;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <strong>Error!</strong>
        <?= htmlentities(Session::get('error'))?>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible" style="text-align:center;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

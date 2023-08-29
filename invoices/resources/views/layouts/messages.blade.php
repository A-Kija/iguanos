@if (session()->has('msg'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="alert alert-{{session('msg')['type']}} alert-dismissible fade show" role="alert">
                <span>{{ session('msg')['content'] }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
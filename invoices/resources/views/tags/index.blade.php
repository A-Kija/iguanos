@extends('layouts.app')

@section('content')
<div class="--tags container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h1>New Tag</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Tag</label>
                                    <input type="text" class="form-control" placeholder="tag" name="tag">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="button" class="--add-tag btn btn-outline-primary"
                                        data-url={{route('tags-store')}}>Create Tag</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Tags</h1>
                </div>
                <div class="loder-bin">
                    <div class="cover --cover">
                        <div class="loader">
                            <div class="spin"></div>
                            <div class="bounce"></div>
                        </div>
                    </div>
                    <div class="--tags-list-bin card-body" data-url="{{route('tags-list')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
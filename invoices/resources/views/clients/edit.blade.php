{{-- EDIT CLIENT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Client</h1>
                </div>
                <div class="card-body">
                    <form action={{route('clients-update', $client)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <input type="text" class="form-control" placeholder="client name" name="name"
                                            value="{{old('name', $client->client_name)}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="client address"
                                            name="address" value="{{old('address', $client->client_address)}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address II</label>
                                        <input type="text" class="form-control" placeholder="client address"
                                            name="address2" value="{{old('address2', $client->client_address2)}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">VAT</label>
                                        <input type="text" class="form-control" placeholder="client VAT" name="vat"
                                            value="{{old('vat', $client->client_vat)}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-select" name="country">
                                            <option selected value="">Select country</option>
                                            @foreach ($countries as $code => $country)
                                            <option value="{{ $code }}"
                                             {{$code == old('country', $client->client_country) ? 'selected' : ''}}>
                                             {{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Save Client</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
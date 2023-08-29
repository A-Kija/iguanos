{{-- EDIT INVOICE FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Invoice</h1>
                </div>
                <div class="card-body">
                    <form action={{route('invoices-update', $invoice)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" class="form-control" placeholder="invoice number"
                                            name="number" value={{$invoice->invoice_number}}>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="invoice date" name="date"
                                            value={{$invoice->invoice_date}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <input type="text" class="form-control" placeholder="client name" name="name"
                                            value={{$invoice->client_name}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="client address"
                                            name="address" value={{$invoice->client_address}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address II</label>
                                        <input type="text" class="form-control" placeholder="client address"
                                            name="address2" value={{$invoice->client_address2}}>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">VAT</label>
                                        <input type="text" class="form-control" placeholder="client VAT" name="vat"
                                            value={{$invoice->client_vat}}>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-select" name="country">
                                            <option selected value="">Select country</option>
                                            @foreach ($countries as $code => $country)
                                            <option value="{{ $code }}" {{$code==$invoice->client_country ? 'selected' :
                                                ''}}>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" placeholder="amount" name="amount"
                                            value={{$invoice->invoice_amount}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Save Invoice</button>
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
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
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <select class="form-select" name="client_id">
                                            <option selected value="">Select client</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{$client->id == $invoice->client_id ? 'selected' :
                                                ''}}>{{ $client->client_name }}</option>
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
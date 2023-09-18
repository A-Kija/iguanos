<style>

    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        background: white;
        
    }
    td {
        width: 5%;
        padding: 0 15px;
    }
    table h1 {
        font-size: 3.5em;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 100px 0;
    }
    table h3 {
        font-size: 1.1em;
        font-weight: normal;
        text-align: right;
    }
    table h2 {
        font-size: 1.5em;
        font-weight: bold;
        text-align: left;
    }
    table h4 {
        font-size: 1.4em;
        font-weight: lighter;
        text-align: center;
        margin: 50px 0 50px 0;
     }
    table h4.border-bottom-inv {
        border-bottom: 1px solid black;
        padding: 0 0 10px 0;
    }

    table h5 {
        font-size: 1em;
        font-weight: bold;
        text-align: center;
        margin: 0 0 10px 0;
        text-transform: uppercase;
    }
    table span {
        font-size: 1.1em;
        font-weight: lighter;
        text-align: left;
        margin: 0 0 10px 0;
    }
    table span.product {
        text-align: center;
        display: block;
    }

</style>

<table>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="20">
            <h1>Invoice</h1>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <h2>Number: {{$number}}</h2>
        </td>
        <td colspan="10">
            <h3>Date: {{$data->invoice_date}}</h3>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <h4>Seller</h4>
        </td>
        <td colspan="10">
            <h4>Buyer</h4>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <span>Beaver and Co.</span>
        </td>
        <td colspan="10">
            <span>{{$data->client_name}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <span>Big River and Swamp</span>
        </td>
        <td colspan="10">
            <span>{{$data->client_address}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <span>37 mile on left bank</span>
        </td>
        <td colspan="10">
            <span>{{$data->client_address2}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <span>BV0011754455453</span>
        </td>
        <td colspan="10">
            <span>{{$data->client_vat ?? ''}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <span>Lithuania</span>
        </td>
        <td colspan="10">
            <span>{{$data->client_country}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="20">
            <h4 class="border-bottom-inv">Products</h4>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h5>#</h5>
        </td>
        <td colspan="10">
            <h5>Product</h5>
        </td>
        <td colspan="3">
            <h5>Price</h5>
        </td>
        <td colspan="2">
            <h5>Quantity</h5>
        </td>
        <td colspan="3">
            <h5>Total</h5>
        </td>
    </tr>
    @foreach ($data->products as $product)
        <tr>
            <td colspan="2">
                <span class="product">{{$product['row']}}</span>
            </td>
            <td colspan="10">
                <span class="product">{{$product['name']}}</span>
            </td>
            <td colspan="3">
                <span class="product">{{$product['price']}}</span>
            </td>
            <td colspan="2">
                <span class="product">{{$product['quantity']}}</span>
            </td>
            <td colspan="3">
                <span class="product">{{$product['total']}}</span>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="17">
            <h3>Total</h3>
        </td>
        <td colspan="3">
            <span class="product">{{$data->total}}</span>
        </td>
    </tr>
    


</table>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Product</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td> {{$sale->id}} </td>
                <td> {{$sale->customer}} </td>
                <td> {{$sale->product->name}} </td>
                <td> {{$sale->quantity}} </td>
                <td> {{$sale->price}} </td>
                <td> {{$sale->cost_total}} </td>
            </tr>
        @endforeach
    
    
    </tbody>
</table>
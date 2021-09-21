<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Stocks</th>
        <th scope="col">Total Sold Quantity</th>
        <th scope="col">Total Amount</th>
        <th scope="col">Updated At</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row"> {{$product->id}} </th>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price,2)}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->sales == null ? "0" : $product->sales->sum('quantity')}}</td>
                <td>{{number_format($product->sales == null ? "0" : $product->sales->sum('cost_total') ,2)}}</td>
                <td>{{date("F d, h:i A",strtotime($product->updated_at))}}</td>
                <td> <a href="{{route('edit_product',['id' => $product->id])}}"> Edit </a> </td>
            </tr>
        @endforeach
    
    
    </tbody>
</table>
@extends('products.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
              <br>
               <h2>PRODUCT MANAGEMENT SYSTEM</h2>

            </div>

            <div class="pull-right">

                <br><a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   
<br>
    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Title</th>
            <th>Variants</th>
            <th>Amount</th>
            <th width="280px"> Image</th>
            <th width="280px">Description</th>


            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr>

            <td>{{ ++$i }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->variants }}</td>
            <td>{{ $product->amount }}</td>
            <td>  
            @if($product->image)
            <img src="{{ $product->image }}" class="imagePreview" width="75" height="75">
            @endif      
            </td>
            <td>{{ $product->description }}</td>

            <td>

                <form action="{{ route('products.delete',$product->id) }}" method="GET">

   


    

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $products->links() !!}

    <script>
        $('.imagePreview').click(function()
        {
          $('#img_popup').modal('toggle');
          $('.img-modal').attr('src',$(this).attr('src'));
      
        }) 

@endsection
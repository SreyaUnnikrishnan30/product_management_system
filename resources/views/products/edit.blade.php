@extends('products.layout')

   

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data" method="POST">

        @csrf


         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{$product->title}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong> <br>
                    <input type="file" class="form-control" name="image" id="image">
                    @if($product->image)
                    <img src="{{ $product->image }}" class="imagePreview" width="75" height="75">
                @endif                
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Varient:</strong>
                    <input type="text" name="variants" class="form-control" value="{{$product->variants}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea  name="description" class="form-control" value="{{$product->description}}" placeholder="Description" rows="4" cols="50">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <input type="button" class="mybutton" id='one' value="$500">
                <input type="button" class="mybutton" id='two' value="$1000">
                <input type="button" class="mybutton" id='two' value="$2000">       
                <input type="button" class="mybutton" id='two' value="$5000">
                <br><br>
                Amount: <input type="text" name="amount" id="amount" class="cls_amount" value="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>


            </div>

        </div>

   

    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $('.imagePreview').click(function()
    {
      $('#img_popup').modal('toggle');
      $('.img-modal').attr('src',$(this).attr('src'));
    })
    $('.mybutton').click(function(){
    var value = $(this).val().replace('$', ''); 
    $('.cls_amount').val(value);
});

    </script>
@endsection
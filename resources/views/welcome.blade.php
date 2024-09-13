<x-head />
<x-nav />

<div class="container ">
@if(Auth::user()->type === "Admin")
    <div class="row ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
    </div>
@endif
</div>


    <div class="row">

        <div class="col-6">
            <!-- Button trigger modal -->
            <form action="{{route('upload.post')}}" method="POST" enctype="multipart/form-data">
                @CSRF
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="productName">
                                    @if($errors->has('productName'))
                                    <div class="text-danger"> {{$errors->first('productName')}} </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="productPrice">
                                    @if($errors->has('productPrice'))
                                    <div class="text-danger"> {{$errors->first('productPrice')}} </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="productImage"
                                        accept=".jpg,.png,.jpeg">
                                    @if($errors->has('productImage'))
                                    <div class="text-danger"> {{$errors->first('productImage')}} </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



    <div class="row">
        <div class="col-6">
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
        </div>
    </div>
</div>


<div class="row">


</div>

<div class="container border">
    <div class="row">

        @foreach ($users as $user)

        <div class="col-3 bg-dark p-1 ">
            <p class="card-title">{{$user->productName}}</p>
            <p class=" text-right">{{$user->productPrice}}</p>
            <hr style=" border: 5px solid yellow; border-radius: 5px;">
            <img class="img-fluid img-thumbnail card-img-top mb-3" src="{{asset('/storage/'.$user->productImage)}}"
                alt="">
        @if(Auth::user()->type === "Admin")


            <form action="{{route('delete.post',$user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ">Delete</button>
                <a href="" class="btn btn-warning " style="margin-left:120px">Update</a>
            </form>
            @endif
        </div>

        @endforeach

    </div>
</div>


<x-foot />

<script type="text/javascript">

</script>

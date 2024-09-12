<x-head />
<x-nav />

<div class="container ">
    <div class="row ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
    </div>
</div>

<div class="container " style="margin-top:50px">
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

<div class="container">

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
@foreach ($users as $user)
    <div class="col-2">


    <img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$user->productImage)}}" alt="" >

    <form action="{{route('delete.post',$user->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mb-3">Delete</button>
    </form>
        <a href="" class="btn btn-warning">Update</a>

    </div>
    @endforeach
</div>

<x-foot />

<script type="text/javascript">

</script>

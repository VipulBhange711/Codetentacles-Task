<x-head />

<a href="{{route('logout.get')}}" class="btn btn-danger">
    logout
</a>

<h1>wecome {{Auth::user()->type}}</h1>

@if(Auth::user()->type === 'dealer' && (empty(Auth::user()->city)) )

<h3 class="display-4">
    You login First Time as a dealer You need to fill the required Information first
</h3>

<div class="col-4 offset-4">
    <form action="{{route('addinfo.post')}}" method="post">
        @csrf

        <input type="hidden" value="{{Auth::user()->id}}" name="id">
        <div class="form-group">

            <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-control">

            </select>
        </div>
        <div class="form-group">

            <select id="state" placeholder="city" name="city" class="form-control">

            </select>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Zip Code" name="zip">
            <div class="input-group-append">
            </div>
        </div>


        <script language="javascript">
            print_state("sts");
        </script>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn  text-white btn-block" style="background-color: blueviolet;">Add Info</button>
            </div>
        </div>
    </form>
</div>

@endif




@if(Auth::user()->type === 'employee')


@endif

<div class="col-8 offset-2">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>city</th>
                <th>state</th>
                <th>zip</th>
                <th width="">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('changeinfo.post')}}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">User Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<x-foot />

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'state',
                    name: 'state'
                },
                {
                    data: 'zip',
                    name: 'zip'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <button type="button" class="btn btn-primary view-details" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                            </button>
                        `;
                    }
                },
            ]
        });

    });
    $(document).on('click', '.view-details', function() {
        var userId = $(this).data('id');

        // console.log(userId);

        $.ajax({
            url: "{{ route('users.show', '') }}/" + userId,
            method: 'GET',
            success: function(response) {
                $('#exampleModal .modal-body').html(`

                          <div class="input-group mb-3">
                            <input type="hidden" class="form-control" placeholder="Zip Code" name="id" value=" ${response.id}">
                            <div class="input-group-append">
                            </div>
                         </div>

                          <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Zip Code" name="name" value=" ${response.name}" disabled>
                            <div class="input-group-append">
                            </div>
                         </div>

                         
                         
                         <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="Zip Code" name="city" value=" ${response.city}">
                           <div class="input-group-append">
                           </div>
                        </div>

                         <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="Zip Code" name="state" value=" ${response.state}">
                           <div class="input-group-append">
                           </div>
                        </div>

                         <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder="Zip Code" name="zip" value=" ${response.zip}">
                           <div class="input-group-append">
                           </div>
                        </div>
                
                    `);
            }
        });
    });
</script>
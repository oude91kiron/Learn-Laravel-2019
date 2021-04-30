<x-admin-master>

    @section('content')

        <div class="row">
            <div class="col-sm-12 btn-block">
                @if(Session::has('message'))
                     <div>{{Session::get('message')}}</div>
                    @elseif(Session('permission_created'))
                        <div class="alert alert-success">{{Session('permission_created')}}</div>
                        @elseif(Session('permission_deleted'))
                            <div class="alert alert-danger">{{Session('permission_deleted')}}</div>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{route('permissions.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" >

                        <div> 
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-block">Save permission</button>
                </form>
            </div>
        
        
            <div class="col-sm-9">
                <!-- DataTables Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions Table</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                    <td>{{$permission->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('permissions.destroy', $permission->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-block">Delete</button></form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection
</x-admin-master>
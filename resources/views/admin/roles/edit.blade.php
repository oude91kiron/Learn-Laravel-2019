<x-admin-master>

    @section('content')


        @if(Session::has('updated'))
            <div class="alert alert-success">
                {{Session('updated')}}
            </div>
        @endif

        <h3>Edit Role: {{$role->name}}</h3>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('roles.update', $role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror" >

                        <div> 
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <button style="margin-bottom:15px" type="submit" class="btn btn-dark btn-block">Save Role</button>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                @if($permissions->isNotEmpty() )
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach-Detach</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach-Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" 
                                                @foreach($role->permissions as $role_permission) 
                                                    @if($role_permission->slug == $permission->slug)
                                                         checked
                                                    @endif
                                                @endforeach>
                                        </td>
                                        
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        @if(!$role->permissions->contains($permission))
                                        <td>
                                            <form method="post" action="{{route('roles.permission.attach', $role)}}" >
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                
                                                <button type="submit" class="btn btn-primary">Attach
                                                </button>
                                            </form>
                                        </td>
                                        @else
                                        <td>
                                            <form method="post" action="{{route('roles.permission.detach', $role)}}" >
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                
                                                <button type="submit" class="btn btn-danger">Detach
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>

                                @endforeach
                                </tbody>
                               </table>
                            </div>
                        </div>
                    </div> 
                @endif              
            </div>
        </div>
    @endsection
</x-admin-master>
<x-admin-master>

    @section('content')

        <h1>All Users</h1>

        <!-- Another way by using the global variable session('message'). -->
        @if(Session::has('message'))
          <div class="alert alert-danger">{{Session::get('message')}}</div>
            @elseif(session('success'))            
              <div class="alert alert-success">{{session('success')}}</div>
              @elseif(session('updated'))
              <div class="alert alert-success">{{session('updated')}}</div>
        @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Creatd Time</th>
                      <th>Updated Time</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Creatd Time</th>
                      <th>Updated Time</th>
                      <th>Delete</th>

                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td>{{$user->id}}</td>
                          <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>
                          <td>{{$user->email}}</td>
                          <td>
                              <img height="100px" src="{{$user->avatar}}" alt="Image unavalable">
                          </td>
                          <td>{{$user->created_at->diffForHumans()}}</td>
                          <td>{{$user->updated_at->diffForHumans()}}</td>
                          <td>
                            <form method="POST" action="{{route('user.destroy', $user->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    <!-- Insted of the JS pagination -->
    <div class="d-flex">
      <div class="mx-auto">{{$users->links()}}</div>
    </div>
    @endsection


    @section('scripts')
      <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
        <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->

    @endsection

</x-admin-master>
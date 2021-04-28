<x-admin-master>

    @section('content')


        @if(Session::has('updated'))
            <div class="alert alert-success">
                {{Session('updated')}}
            </div>
        @endif

        <h3>Edit Role: {{$role->name}}</h3>
        
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

                    <button type="submit" class="btn btn-dark btn-block">Save Role</button>
                </form>
            </div>
        
    @endsection
</x-admin-master>
<x-admin-master>

    @section('content')

        <h3>Edit Permission: {{$permission->name}}</h3>
        
        @if(Session::has('updated'))
            <div class="alert alert-success">
                {{Session('updated')}}
            </div>
        @endif
        
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('permissions.update', $permission->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control @error('name') is-invalid @enderror" >

                        <div> 
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <button style="margin-bottom:15px" type="submit" class="btn btn-dark btn-block">Save permission</button>
                </form>
            </div>
        </div>

    @endsection
</x-admin-master>
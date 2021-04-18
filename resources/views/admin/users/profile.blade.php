<x-admin-master>

        
    </body>
    </html>

    @section('content')

        <h1>User Profile For: {{$user->name}} </h1>

        <div class="row">
        
            <div class="col-sm-6">

                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Profile image preview -->
                    <div class="mb-4">
                    <img class="img-profile rounded-circle" src="{{$user->avatar}}" height="100rem" width="100rem">
                    </div>
                    
                    <!-- Avatar file  -->
                    <div class="form-group">
                            <input type="file" name="avatar" class="form-control-file @error('avatar') is-invalid @enderror">
                    </div>

                    <!-- name -->
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="username" value="{{$user->username}}">
                    </div>

                    <!-- username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">
                    </div>
                    <!-- User Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
                    </div>
                    <!-- User Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="">
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" name="password-confirmation" class="form-control @error('password-confirmation') is-invalid @enderror" id="password-confirmation" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            
            </div>
        
        </div>

    @endsection

</x-admin-master>
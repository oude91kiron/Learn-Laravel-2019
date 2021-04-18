<x-admin-master>

    @section('content')

    <h1>Create Page</h1>
    <!-- enctype for uploding files -->
    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
    <!-- @csrf is a laravel security feature -->    
        @csrf
        <!-- Title of the post -->    
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
        </div>
        
        <!-- Image of the post -->    
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" class="form-control-file" id= "post_image">
        </div>

        <!-- Body of the post -->    
        <div class="form-group">
            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endsection

</x-admin-master>
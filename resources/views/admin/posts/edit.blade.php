<x-admin-master>

    @section('content')

    <h1>Edit Post</h1>
    <!-- enctype for uploding files -->
    <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
    <!-- @csrf is a laravel security feature -->    
        @csrf
        <!-- tel laravel that we gonna use the update method -->
        @method('PATCH')
        <!-- Title of the post -->    
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" value="{{$post->title}}">
        </div>
        
        <!-- Image of the post -->    
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" class="form-control-file" id= "post_image">
            <div Style="margin-top:10px"><img width="100px" src="{{$post->post_image}}" alt=""></div>
        </div>

        <!-- Body of the post -->    
        <div class="form-group">
            <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary"><a style="color:white" href="{{route('post.index')}}" class="style-disable">Cancel</a></button>    
    </form>
    @endsection

</x-admin-master>


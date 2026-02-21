<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    
    <div class="form-group">
        <label for="author">Author Name</label>
        <input type="text" class="form-control" id="author" name="author" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
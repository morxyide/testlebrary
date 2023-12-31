<h1>Add New Video</h1>
<a href="{{route('videos.index')}}">Go to main</a>
<form action="{{ route('videos.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="director">Director</label>
        <input type="text" name="director" id="director" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="producer">Producer</label>
        <input type="text" name="producer" id="producer" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="year_published">Year Published</label>
        <input type="number" name="year_published" id="year_published" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" name="category" id="category" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

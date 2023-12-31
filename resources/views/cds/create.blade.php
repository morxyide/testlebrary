<h1>Add New CD</h1>
<a href="{{route('cds.index')}}">Go to main</a>
<form action="{{ route('cds.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="artist">Artist</label>
        <input type="text" name="artist" id="artist" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" class="form-control" required>
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

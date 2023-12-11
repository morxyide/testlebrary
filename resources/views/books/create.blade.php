<h1>Add New Book</h1>
<a href="{{route('books.index')}}">Go to main</a>
<form action="{{ route('books.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control" required>
    </div>

    <div class=form-group">
        <label for="edition">Edition</label>
        <input type="number" name="edition" id="edition" class="form-control" required>
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

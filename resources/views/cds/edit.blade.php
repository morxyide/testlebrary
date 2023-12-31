<h1>Edit CD</h1>

<form action="{{ route('cds.update', $cd) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $cd->title }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

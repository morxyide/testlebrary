<h1>Edit Video</h1>

<form action="{{ route('videos.update', $video) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $video->title }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

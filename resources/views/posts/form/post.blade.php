{{ csrf_field() }}
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title',  isset($post->title) ? $post->title : null) }}">
</div>

<div class="form-group">
    <label for="content">Summary</label>
    <textarea type="text" name="summary" class="form-control summernote">{{ old('summary',  isset($post->summary) ? $post->summary : null) }}
    </textarea>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea type="text" name="content" class="form-control summernote">{{ old('content',  isset($post->content) ? $post->content : null) }}
    </textarea>
</div>

<div class="form-group">
    <label for="image_header">Header image</label>
    <input type="file" name="image_header" class="form-control">
</div>

@if(isset($post->image_header))
<div class="form-group">
    <img src="{{ $post->image_header }}" width="300"/>
</div>
@endif

<button type="submit" class="btn btn-default">Save</button>
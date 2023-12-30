@extends('dashboard.layout.main')

@section('konten')

<div class="m-20">

  <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div>
      <h1 class="text-4xl">edit post</h1>
      
      <div class="my-6">
        <h1 class="text-2xl mb-3">title</h1>
        <input type="text" class="input input-bordered w-3/4 @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        @error('title')
        <div role="alert" class="alert alert-warning p-2 w-3/4 my-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>
      <div class="my-6">
        <h1 class="text-2xl ">slug</h1>
        <p class="mb-3">*it may take while to generate the slug / u can edit it by urself</p>
        <input type="text" class="input input-bordered w-3/4 input-disabled cursor-text @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required placeholder="ur slug">
        @error('slug')
        <div role="alert" class="alert alert-warning p-2 w-3/4 my-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>
      <div class="my-6">
        <h1 class="text-2xl mb-3">category</h1>
        <select class="select select-bordered w-full max-w-xs" name="category_id">
          @foreach ($categories as $category)
            @if ( old('category_id', $post->category->id) == $category->id )
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="my-6">
        <h1 class="text-2xl">post image</h1>
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        @if ($post->image)
          <img class="img-preview my-3 max-h-96" src="{{ asset('storage/' . $post->image) }}">
        @else
          <img class="img-preview my-3">
        @endif
        <input type="file" class="file-input file-input-bordered w-full max-w-xs @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage()"/>
        @error('image')
          <div role="alert" class="alert alert-warning w-1/2 p-2 my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
        @enderror
      <div class="my-6">
        <label for="body" class="text-2xl">body</label>
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" required>
        <trix-editor input="body"></trix-editor>
        @error('body')
          <div role="alert" class="alert alert-warning p-2 my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
        @enderror
      </div>
      <div class="card-actions justify-start">
        <button class="btn btn-neutral px-8" type="submit">edit post</button>
      </div>
    </div>
  </form>

</div>  

<script>
// eloquent sluggable
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', () => {
  fetch('/dashboard/posts/checkSlug?title=' + title.value)
  .then(response => response.json())
  .then(data => slug.value = data.slug)
});

// trix-editor
document.addEventListener('trix-file-accept', (e) => {
  e.preventDefault();
})

// preview image
function previewImage(){
  
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = (oFREvent) => {
    imgPreview.src = oFREvent.target.result;
  }
}
</script>

@endsection
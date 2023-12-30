@extends('dashboard.layout.main')

@section('konten')
    <div class="grid m-16">
      
      <h1 class="text-5xl">post by {{ $post->author->name }}</h1>
      <h1 class="text-3xl mt-2">{{ $post->title }}</h1>
      <div class="my-4">
        <div class="badge badge-secondary">
          <a href="/posts?category={{ $post->category->slug }}">
            {{ $post->category->name }}
          </a>
        </div>
      </div>

      @if ($post->image)
        <figure class="max-h-96 overflow-hidden my-4">
          <img src="{{ asset('storage/' . $post->image) }}" alt="Shoes">
        </figure>
      @else
        <figure class="my-4">
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt="Shoes">
        </figure>
      @endif

      <div class="text my-4 overflow-y-auto">
          {!! $post->body !!}
      </div>

      <div class="card-actions justify-center my-8">
        <a class="btn bg-slate-200 text-slate-900 hover:bg-slate-300 font-bold" href="/dashboard/posts">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>          
        </a>
        <a class="btn bg-slate-200 text-slate-900 hover:bg-slate-300 font-bold" href="/dashboard/posts/{{ $post->slug }}/edit">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
          </svg>
        </a>
        <form action="/dashboard/posts/{{ $post->slug }}" method="post">
          @method('delete')
          @csrf
          <button class="btn bg-slate-200 text-slate-900 hover:bg-slate-300 font-bold" type="submit"
            onclick="return confirm('are you sure?>')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>    
          </button>
        </form>
      </div>
    
    </div>
@endsection
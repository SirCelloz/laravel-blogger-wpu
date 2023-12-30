@extends('layout.main')

@section('contain')
    <div class="grid m-16">
      
      <h1 class="text-5xl">post by {{ $post->author->name }}</h1>
      <h1 class="text-3xl mt-2">{{ $post->title }}</h1>
      <div class="mt-4">
        <div class="badge badge-secondary">
          <a href="/posts?category={{ $post->slug }}">
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

      <div class="text mt-4 overflow-y-auto">
          {!! $post->body !!}
      </div>

      <div class="card-actions justify-center my-8">
        <a class="btn bg-slate-200 text-slate-900 hover:bg-slate-300 font-bold px-10" href="/posts">
          back
        </a>
      </div>
    
    </div>
@endsection
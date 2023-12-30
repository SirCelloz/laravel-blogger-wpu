@extends('layout.main')

@section('contain')

  <div class="flex justify-center">

    <form action="/posts">
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
       @endif
      <input type="text" placeholder="search" class="input input-bordered lg:w-96" name="search" />
      <button class="btn bg-slate-200 text-black hover:bg-slate-300" type="submit">search</button>
    </form>

  </div>

  @if ($posts->count())
  <div class="flex justify-center my-10">
    <div class="card bg-slate-200 shadow-xl text-black lg:max-w-7xl max-w-96" style="width: 1100px">

    @if ($posts[0]->image)
      <figure>
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="Shoes">
      </figure>
    @else
      <figure>
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->slug }}" alt="Shoes">
      </figure>
    @endif
      <div class="card-body">

        <h2 class="card-title">
          {{ $posts[0]->title }}
        </h2>
        <p>
          {{ $posts[0]->excerpt }}
        </p>

        <div class="gap-2">
          <div class="badge badge-primary">
            <a href="/posts?author={{ $posts[0]->author->username }}">
              {{ $posts[0]->author->name }}.
            </a>
          </div>
          <div class="badge badge-secondary">
            <a href="/posts?category={{ $posts[0]->category->slug }}">
              {{ $posts[0]->category->name }}
            </a>
          </div>
          <div class="badge badge-default">
            Last updated
            {{ $posts[0]->created_at->diffForHumans() }}.
          </div>
        </div>

        <div class="card-actions justify-end">
          <a class="btn btn-default font-bold" href="/posts/{{ $posts[0]->slug }}">
            see more
          </a>
        </div>
      </div>
    </div>

  </div>

  <div class="grid gap-x-4 gap-y-10 md:grid-cols-2 lg:grid-cols-3 place-items-center">

    @foreach ($posts->skip(1) as $post)
      <div class="card w-96 bg-slate-200 shadow-xl text-black">
        @if ($post->image)
          <figure>
            <img src="{{ asset('storage/' . $post->image) }}" alt="Shoes">
          </figure>
        @else
          <figure>
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt="Shoes">
          </figure>
        @endif
        <div class="card-body">

          <h2 class="card-title">
            {{ $post->title }}
          </h2>
          <p>
            {{ $post->excerpt }}
          </p>

          <div class="gap-2">
            <div class="badge badge-primary">
              <a href="/posts?author={{ $post->author->username }}">
                {{ $post->author->name }}.
              </a>
            </div>
            <div class="badge badge-secondary">
              <a href="/posts?category={{ $post->category->slug }}">
                {{ $post->category->name }}
              </a>
            </div>
            <div class="badge badge-default">
              Last updated
              {{ $post->created_at->diffForHumans() }}.
            </div>
          </div>


          <div class="card-actions justify-end">
            <a class="btn btn-default font-bold" href="/posts/{{ $post->slug }}">
              see more
            </a>
          </div>

        </div>
      </div>
    @endforeach

  </div>

  @else
    <p class="text-center text-4xl mt-8">No Post Found.</p>
  @endif

  <div class="grid justify-center items-center m-10">
    {{ $posts->links() }}
  </div>

@endsection
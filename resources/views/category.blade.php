@extends('layout.main')

@section('contain')

  <div class="grid grid-flow-row place-content-center gap-10 mt-28 lg:grid-flow-col">

    @foreach ($categories as $category)
    <div class="card w-96 shadow-xl image-full">
      <figure><img src="https://source.unsplash.com/900x500?{{ $category->slug }}" alt="Shoes" /></figure>
      <div class="card-body text-center">
        <div class="card-actions justify-center mt-14">
          <a class="btn px-12" href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>

@endsection
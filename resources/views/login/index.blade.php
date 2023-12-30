@extends('layout.main')

@section('contain')

<div class="flex items-center justify-center mt-10">
  
  <div class="card card-compact w-96 bg-slate-50 shadow-xl text-black">
    <div class="card-body">

        <h2 class="font-bold text-center text-2xl">Login</h2>

        <form action="/login" method="post">
          @csrf
          <input 
           type="email"
           placeholder="example@gmail.com"
           class="input input-bordered bg-slate-200 w-full mt-3  @error('email') is-invalid @enderror"
           name="email"
           id="email"
           required
           autofocus
           value="{{ old('email') }}"
          />
          @error('email')
          <div role="alert" class="alert alert-warning p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
          @enderror

          <input 
           type="password"
           placeholder="password"
           class="input input-bordered bg-slate-200 w-full mt-3 mb-3"
           name="password"
           id="password"
           required
          />

          <p class="text-gray-800 my-3">
            not Registered?
            <a href="/register" class="text-blue-700 link-hover">Register now!</a>
          </p>
          <div class="card-actions justify-center">
            <button class="btn btn-default px-7" type="submit">Login</button>
          </div>
        </form>

    </div>
  </div>

</div>

@if (session()->has('success'))
<div class="toast">
  <div class="alert alert-success">
    <span>{{ session('success') }}</span>
  </div>
</div>
@endif

@if (session()->has('loginError'))
<div class="toast">
  <div class="alert alert-success">
    <span>{{ session('loginError') }}</span>
  </div>
</div>
@endif

@endsection
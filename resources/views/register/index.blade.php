@extends('layout.main')

@section('contain')

<div class="flex items-center justify-center mt-10">
  
  <div class="card card-compact w-96 bg-slate-50 shadow-xl text-black">
    <div class="card-body">

        <h2 class="font-bold text-center text-2xl my-4">registration form</h2>

        <form action="/register" method="post">
          @csrf
          <input 
            type="text" 
            placeholder="name" 
            class="input input-bordered bg-slate-200 w-full my-3 @error('name') is-invalid @enderror" 
            name="name"
            id="name"
            value="{{ old('name') }}"
            required 
          />
          @error('name')
          <div role="alert" class="alert alert-warning p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
          @enderror

          <input 
            type="text" 
            placeholder="username" 
            class="input input-bordered bg-slate-200 w-full my-3 @error('username') is-invalid @enderror" 
            name="username"
            id="username"
            value="{{ old('username') }}"
            required 
          />
          @error('username')
          <div role="alert" class="alert alert-warning p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
          @enderror

          <input 
            type="email" 
            placeholder="example@gmail.com" 
            class="input input-bordered bg-slate-200 w-full my-3 @error('email') is-invalid @enderror" 
            name="email"
            id="email"
            value="{{ old('email') }}"
            required 
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
            class="input input-bordered bg-slate-200 w-full my-3 @error('password') is-invalid @enderror" 
            name="password"
            id="password"
            required 
          />
          @error('password')
          <div role="alert" class="alert alert-warning p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ $message }}</span>
          </div>
          @enderror

          <div class="card-actions justify-center my-2">
            <button class="btn btn-default px-7">register</button>
          </div>
        </form>

    </div>
  </div>

</div>

@endsection
<div class="navbar bg-base-300">

  <div class="flex-1">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-300 rounded-box w-52">
        <li><a href="/posts">blog</a></li>
        <li><a href="/category">categories</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl" href="/posts">
      <svg width="32" height="32" viewBox="0 0 415 415" xmlns="http://www.w3.org/2000/svg"><rect x="82.5" y="290" width="250" height="125" rx="62.5" fill="#1AD1A5"></rect><circle cx="207.5" cy="135" r="130" fill="black" fill-opacity=".3"></circle><circle cx="207.5" cy="135" r="125" fill="white"></circle><circle cx="207.5" cy="135" r="56" fill="#FF9903"></circle></svg>
        Blogger
    </a>
    <a class="btn btn-ghost text-xl hidden lg:inline-flex" href="/posts">blog</a>
    <a class="btn btn-ghost text-xl hidden lg:inline-flex" href="/category">categories</a>
  </div>

  @auth
    <div class="flex-none gap-2">

      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button">
          <a class="btn btn-ghost text-xl">
            {{ auth()->user()->username }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </a>
        </div>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content rounded-box w-52 bg-base-300">
          <li>
            <a href="/dashboard">dashboard</a>
          </li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit">logout</button>
            </form>
          </li>
        </ul>
      </div>

    </div>
  @else
    <div class="flex-none">
      <a class="btn btn-ghost text-xl" href="/login">log In</a>
    </div>
  @endauth

</div>
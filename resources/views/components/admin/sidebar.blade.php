<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="{{ route('admin.index') }}">
                        @if(request()->routeIs('admin.index'))
                            <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#house"/></svg>
                        @endif
{{--                            <svg class="bi"><use xlink:href="#house"/></svg>--}}
                        Admin main page
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.categories.index') }}">
                        <svg class="bi"><use xlink:href="#categories"/></svg>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.news.index') }}">
                        {{--@if(request()->routeIs('admin.news.index'))
                            <svg class="bi"><use xlink:href="#cart-fill"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#cart"/></svg>
                        @endif--}}
                            <svg class="bi"><use xlink:href="#newspaper"/></svg>
                        News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.users.index') }}">
                        @if(request()->routeIs('admin.users.index'))
                            <svg class="bi"><use xlink:href="#people-fill"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#people"/></svg>
                        @endif

{{--                        <svg class="bi"><use xlink:href="#people"/></svg>--}}
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#resourses"/></svg>
                       Resourses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#graph-up"/></svg>
                        Parser
                    </a>
                </li>


            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        Logout
                    </a>



                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>




















{{--

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page"
                   href="{{route('admin.index')}}">
                    <span data-feather="home"></span>
                    Main
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif"
                href="{{route('admin.categories.index')}}">
                    <span data-feather="file"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.index')) active @endif"
                   href="{{route('admin.news.index')}}">
                    <span data-feather="layers"></span>
                    News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>
--}}

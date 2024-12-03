<section class="hero-banner-inner">

    <div class="container">
        <div class="row align-items-cneter justify-content-center pt-5">
            <div class="col-md-7">
                <div class="heading-wrapper">
                    <div class="text-center text-white">
                        
                        @if (Request::is('user-profile'))
                            <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">User Profile</h1>
                        @endif
                        @if (Request::is('change-password'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Change Password</h1>
                        @endif
                        @if (Request::is('user-review'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Reviews</h1>
                        @endif
                        @if (Request::is('user-business'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Business</h1>
                        @endif
                        @if (Request::is('user-business/add'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Business</h1>
                        @endif
                        @if (Request::is('business/edit/*'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Business</h1>
                        @endif
                        @if (Request::is('blogs'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Blogs</h1>
                        @endif
                        @if (Request::is('blogs/add'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Blogs</h1>
                        @endif
                        @if (Request::is('blogs/edit/*'))
                        <h1 class="fw-semibold px-4 px-lg-0 fs-4 text-uppercase text-white">Blogs</h1>
                        @endif
                        <p>&nbsp;</p>
                    </div>

                </div>
                <div class="navbars pt-4">
                    <ul>
                        <li><a href="/">Home</a></li>
                        {{-- @if ($category->parent)
          <li><a href="{{ url('sub-category',$category->parent->slug) }}">{{ $category->parent->name ??'' }}</a></li>
          @endif --}}

                        @if (Request::is('user-profile'))
                            <li>User Profile</li>
                        @endif
                        @if (Request::is('change-password'))
                        <li>Change Password</li>
                        @endif
                        @if (Request::is('user-review'))
                        <li>User Review</li>
                        @endif
                        @if (Request::is('user-business'))
                        <li>Business</li>
                        @endif
                        @if (Request::is('user-business/add'))
                        <li>Business</li>
                        @endif
                        @if (Request::is('business/edit/*'))
                        <li>Business</li>
                        @endif
                        @if (Request::is('blogs'))
                        <li>Blogs</li>
                        @endif
                        @if (Request::is('blogs/add'))
                        <li>Blogs</li>
                        @endif
                        @if (Request::is('blogs/edit/*'))
                        <li>Blogs</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <span class="text-success"> {{ session('success') }} </span>
            </div>
        @endif
        <div class="row">
            <div class="col-mb-12">
                <div class="row g-4 align-items-start">
                    <div class="col-md-3">
                        <div class="bg-light p-4 rounded-3">
                            <h3 class="mb-4">My Dashboard</h3>
                            <div class="border p-4 text-center mb-4 bg-white rounded-4">
                                @if ($user->profile && file_exists(public_path('images/profile/' . $user->profile)))
                                    <img src="{{ asset('images/profile/' . $user->profile) }}"
                                        class="rounded-1 border-2 border-light" width="100%" height="120px"
                                        style="object-fit: cover;" alt="">
                                @else
                                    <img src="{{ asset('assets/images/user.jpg') }}"
                                        class="rounded-1 border-2 border-light" width="100%" height="120px"
                                        style="object-fit: cover;" alt="">
                                @endif
                                <span class="d-block w-75 m-auto mt-4">{{ $user->name }}</span>
                            </div>
                            <div class="nav flex-column nav-pills me-3 text-start border-bottom lh-lg" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <a href="{{ route('user.profile') }}"
                                    class="nav-link text-start {{ Request::is('user-profile') ? 'active' : '' }} border-bottom lh-lg"
                                    type="button" aria-selected="true">My Profile</a>

                                <a href="{{ route('user.profile.password') }}"
                                    class="nav-link text-start border-bottom lh-lg {{ Request::is('change-password') ? 'active' : '' }}"
                                    type="button" aria-selected="true">Change Password</a>
                                <a href="{{ route('user.review') }}" class="nav-link text-start border-bottom lh-lg {{ Request::is('user-review') ? 'active' : '' }}"
                                    type="button" aria-selected="true">My Reviews</a>
                                <a href="{{ route('user.business') }}" class="nav-link text-start border-bottom lh-lg {{ Request::is('user-business') || Request::is('user-business/add') || Request::is('user-business/edit/*') ? 'active' : '' }}"
                                    type="button" aria-selected="true">My Business</a>
                                <a href="{{ route('user.blogs') }}"
                                    class="nav-link text-start border-bottom lh-lg {{ Request::is('blogs') || Request::is('blogs/add') || Request::is('blogs/edit/*') ? 'active' : '' }}"
                                    type="button" aria-selected="true">My Blogs</a>
                                <a href="{{ url('logout') }}" class="nav-link text-start border-bottom lh-lg"
                                    type="button" aria-selected="true">Logout</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">

                            @if (Request::is('user-profile'))
                                @include('frontend.inc.editprofile')
                            @endif
                            @if (Request::is('change-password'))
                                @include('frontend.inc.changepassword')
                            @endif
                            @if (Request::is('user-review'))
                                @include('frontend.inc.myreview')
                            @endif
                            @if (Request::is('user-business'))
                                @include('frontend.inc.mybusiness')
                            @endif
                            @if (Request::is('user-business/add'))
                                @include('frontend.inc.addbusiness')
                            @endif
                            @if (Request::is('business/edit/*'))
                                @include('frontend.inc.editbusiness')
                            @endif
                            @if (Request::is('blogs'))
                                @include('frontend.inc.myblog')
                            @endif
                            @if (Request::is('blogs/add'))
                                @include('frontend.inc.addblog')
                            @endif
                            @if (Request::is('blogs/edit/*'))
                                @include('frontend.inc.editblog')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

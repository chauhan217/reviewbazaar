<header class="bg-light header" id="myHeader">
<nav class="navbar navbar-expand-lg bg-white py-3">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo.png')}}" width="240px" alt="logo"></a>
   <div class="d-flex align-items-center">
    <div class="d-flex ps-5 d-lg-none pe-2">
        @if(Auth::user())
            <div class="dropdown p-2 bg-primary rounded-3 text-white">
                <a href="#" style="text-decoration: none" class="mx-1 text-white" id="userDropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->getInitials() }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
           @else
            <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="{{ asset('assets/images/icons/user.png')}}" width="20px">
            </a>
        @endif
     </div> 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
   </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navigation">
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="about-us">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ route('category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ route('blog') }}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link position-relative text-uppercase" href="{{ route('company.review') }}">Company Review
            <span class="position-absolute top-25 start-100 translate-middle badge rounded-pill bg-danger">
           WR
          </span>
          </a>
        </li>
      </ul>
      <div class="ps-5 d-none d-lg-flex">
        @if(Auth::user())
            <div class="dropdown p-2 bg-primary rounded-3 text-white">
                <a href="#" style="text-decoration: none" class="mx-1 text-white" id="userDropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->getInitials() }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
           @else
            <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="{{ asset('assets/images/icons/user.png')}}" width="20px">
            </a>
        @endif
     </div>    
    </div>
  </div>
</nav>
</header>
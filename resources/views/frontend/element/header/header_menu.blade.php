<div id="navbar" class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('public/frontend') }}/assets/img/logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 d-xl-none d-lg-none d-block">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9">
                <div class="mainmenu">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/') }}">
                                      Home
                                    </a>
                                  </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                </li>
                                
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="blog.html">Blog Post</a>
                                        <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact US</a>
                                </li>
                            </ul>
                        </div>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand">
            <a href="#">
                <img src="{{ asset('images/logo.png') }}" width="110" height="32" alt="Tabler"
                     class="navbar-brand-image">
                <span>Profit Work-BD</span>
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Paweł Kuna</div>
                        <div class="mt-1 small text-muted">UI Designer</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Status</a>
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <a href="./sign-in.html" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link p-3" href="{{ route('admin.dashboard') }}">
                          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                   viewBox="0 0 24 24"
                                   stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                   stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                      d="M5 12l-2 0l9 -9l9 9l-2 0"/><path
                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path
                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                              </svg>
                          </span>
                        <span class="nav-link-title">
                        Dashboard
                      </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-3" href="{{ route('admin.users.index') }}">
                          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                   <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                   <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                              </svg>
                          </span>
                          <span class="nav-link-title">
                            Users
                          </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-3" href="{{ route('admin.dashboard') }}">
                          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-stack"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                   <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                                   <path d="M5 21h14"></path>
                                   <path d="M5 18h14"></path>
                                   <path d="M5 15h14"></path>
                              </svg>
                          </span>
                          <span class="nav-link-title">
                            Task
                          </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>

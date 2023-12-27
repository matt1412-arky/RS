<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
        <button href="javascript:;" class="nav-link text-white p-0 btn border-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner" id="sidebar" hidden>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
            </div>
            </a>
    </li>
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="row w-100 align-items-center">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Cari Dokter atau Faskes">
                    </div>
                </div>
                <div class="col-auto" id="loginSection">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0"
                                onclick="openLoginModal()">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0"
                                onclick="openModalRegisEmailVerif()">
                                <i class="fa fa-user-plus"></i>
                                <span class="d-sm-inline d-none">Daftar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto" id="userSection">
                    <div class="btn-group navbar-nav">
                        <button type="button" class="btn btn-link dropdown-toggle m-0" data-bs-toggle="dropdown">
                            <img src="{{ asset('support/img/user.png') }}" width="40" alt="logo" />
                            <span class="me-2 text-dark" id="name"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button class="dropdown-item w-100 text-start" type="button" onclick="openProfile()">
                                    <i class="fas fa-user-circle"></i> Profil
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item w-100 text-start" type="submit"
                                    onclick="logoutConfirmation()">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                        width="18" height="18" viewbox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="{{ asset('support/img/user.png') }}" width="40" alt="logo" />
                                <span class="me-2" id="name"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <button class="btn w-100 text-start" type="submit" onclick="logoutConfirmation()">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                        width="18" height="18" viewbox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Logout
                                </button>
                            </div>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</nav>

<header>
    <!-- header inner -->
{{--    <div class="header">--}}
{{--        <div class="head_top">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ">--}}
{{--                        <div class="limit-box">--}}
{{--                            <nav class="main-menu">--}}
{{--                                <ul class="menu-area-main mb-4">--}}
{{--                                    <li class="active"> <a href="/">Home</a> </li>--}}
{{--                                    <li class="active"> <a href="/product">Products</a> </li>--}}


{{--                                </ul>--}}


{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
{{--                        <div class="search top-box">--}}
{{--                            <form class="form-inline my-2 my-lg-0" action="{!! route('search') !!}" method="get">--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Rahim Store</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
                            <ul class="navbar-nav margin-left">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/product">Product</a>
                                </li>

                            </ul>
                            <form class="form-inline mt-4 my-2 my-lg-0" action="{!! route('search') !!}" method="get">
                                <div class="input-group mt-1">
                                    <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </nav>
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    <!--end header inner-->


</header>
<!-- end header -->

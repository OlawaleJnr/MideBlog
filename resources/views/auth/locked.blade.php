<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Unlock your profile - {{ Auth::user()->name }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <!-- Unlock page start-->
            <div class="authentication-main mt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="login-card">
                            <div>
                                <div>
                                    <a class="logo" href="javascript:void(0)">
                                        <img class="img-fluid for-light" src="../assets/images/logo/login.png" alt="looginpage">
                                        <img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage">
                                    </a>
                                </div>
                                <div class="login-main">
                                    <div class="media pb-4">
                                        <div class="media-size-email">
                                            <img class="mr-3 rounded-circle" style="width:70px; height:70px" src="{{ Auth::user()->avatar->filename }}" alt="" data-original-title="" title="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="f-w-600 text-uppercase">{{ Auth::user()->name }}</h6>
                                            <p>{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <form class="theme-form" action="{{ route('login.unlock') }}"  method="POST">
                                        @csrf
                                        <h5>Unlock</h5>
                                        <div class="form-group">
                                            <label class="col-form-label">Enter your Password</label>
                                            <input class="form-control" type="password" name="passsword" class="@error('password') is-invalid @enderror" placeholder="*********">
                                            <div class="show-hide"><span class="show"></span></div>
                                            @error('password')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="checkbox p-0">
                                            <input id="checkbox1" type="checkbox">
                                            <label class="text-muted" for="checkbox1">Remember password</label>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">Unlock</button>
                                        </div>
                                        <p class="mt-4 mb-0">Already Have an account?<a class="ml-2" href="login.html">Sign in</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Unlock page end-->
      </div>
    </div>

    <!-- jquery & Bootstrap Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>

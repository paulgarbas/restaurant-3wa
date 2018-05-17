<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Taste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/#section-about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/#section-offer" class="nav-link">Offer</a></li>
                <li class="nav-item"><a href="/#section-menu" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{ route('dishes.page') }}" class="nav-link">Dishes</a></li>
                <li class="nav-item"><a href="/#section-news" class="nav-link">News</a></li>
                <li class="nav-item"><a href="/#section-gallery" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="/#section-contact" class="nav-link">Contact</a></li>
                <li class="nav-item">
                    <a href="{{ route('show.cart') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>

                        <span class="ml-1">Cart</span>

                        @auth
                            <span class="badge badge-secondary ml-2" id="totalQty">
                                {{  $totalItems }}
                                {{-- {{ $totalItems }} --}}
                                {{-- @if (Session::has('cart'))

                                    {{ Session::get('cart')->totalQty }}

                                @else 0

                                @endif --}}
                            </span>
                        @else
                            0
                        @endauth
                    </a>
                </li>
                @guest
                    <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#login">{{ __('Login') }}</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" data-toggle="modal" data-target="#register">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin') }}">Admin panel</a>
                            @else
                                <a class="dropdown-item" href="{{ route('user.profile.orders') }}">Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>

<!-- Modal Login-->
<div class="modal fade bd-example-modal-lg" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
              <div class="row">
                  <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);"></div>
                  <div class="col-md-8 p-5">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <small>CLOSE </small><span aria-hidden="true">&times;</span>
                      </button>
                      <h1 class="mb-4">Login</h1>
                          <form method="POST" action="{{ route('login') }}">
                              @csrf

                              <div class="col-md-12 form-group">
                                  <label for="email">{{ __('E-Mail Address') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="col-md-12 form-group">
                                  <label for="password">{{ __('Password') }}</label>

                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="col-md-12 form-group">
                                  <div class="col-md-6 offset-md-4">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                          </label>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-12 form-group">
                                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                                      {{ __('Login') }}
                                  </button>

                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              </div>
                          </form>



                  </div>
              </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Register-->
<div class="modal fade bd-example-modal-lg" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="row">
              <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);"></div>
              <div class="col-lg-8 p-5">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small>CLOSE </small><span aria-hidden="true">&times;</span>
                  </button>
                  <h1 class="mb-4">Registration</h1>
                      <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <div class="row">
                              <div class="col-md-6 form-group">
                              <label for="name">{{ __('Name') }}</label>
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-6 form-group">
                              <label for="surname">{{ __('Surname') }}</label>
                              <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                              @if ($errors->has('surname'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('surname') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-6 form-group">
                              <label for="birthday">{{ __('Date of Birth') }}</label>
                              <input id="birthday" type="text" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday') }}" required autofocus>

                              @if ($errors->has('birthday'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('birthday') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-6 form-group">
                              <label for="phone">{{ __('Phone Number') }}</label>
                              <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                              @if ($errors->has('phone'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-12 form-group">
                              <label for="email">{{ __('E-Mail Address') }}</label>
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-12 form-group">
                              <label for="password">{{ __('Password') }}</label>
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-12 form-group">
                              <label for="password-confirm">{{ __('Confirm Password') }}</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>

                          <div class="col-md-12 form-group">
                              <label for="address">{{ __('Address') }}</label>
                              <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                              @if ($errors->has('address'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-6 form-group">
                              <label for="city">{{ __('City') }}</label>
                              <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                              @if ($errors->has('city'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-6 form-group">
                              <label for="zip">{{ __('Zip Code') }}</label>
                              <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}" required autofocus>

                              @if ($errors->has('zip'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('zip') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-12 form-group">
                              <label for="country">{{ __('Country') }}</label>
                              <select class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country">
                                  @foreach($countries as $country)
                                      @if (old('country') == $country->name->common)
                                          <option selected value="{{ $country->name->common }}">{{ $country->name->common }}</option>
                                      @else
                                          <option value="{{ $country->name->common }}">{{ $country->name->common }}</option>
                                      @endif
                                  @endforeach
                              </select>
                              @if ($errors->has('country'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('country') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-12 form-group">
                              <button type="submit" class="btn btn-primary btn-lg btn-block">
                                  {{ __('Register') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

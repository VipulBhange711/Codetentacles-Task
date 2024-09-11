<x-head />

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Syn</b>Karma</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{route('register.post')}}" method="post">
          @csrf

          <div class="btn-group btn-group-toggle mb-3 offset-3" data-toggle="buttons">
            <label class="btn bg-olive">
              <input type="radio" name="type" id="option_b2" value="employee"  autocomplete="off"> Employee
            </label>
            <label class="btn bg-olive">
              <input type="radio" name="type" id="option_b3" value="dealer" autocomplete="off"> Dealer
            </label>
          </div>

          @if($errors->has('type'))
          <div class="text-danger">
            {{$errors->first('type')}}
          </div>
          @endif

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if($errors->has('name'))
            <div class="text-danger">
              {{$errors->first('name')}}
            </div>
            @endif

          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          @if($errors->has('email'))
            <div class="text-danger">
              {{$errors->first('email')}}
            </div>
            @endif


          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          @if($errors->has('password'))
            <div class="text-danger">
              {{$errors->first('password')}}
            </div>
            @endif

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          @if($errors->has('password_confirmation'))
            <div class="text-danger">
              {{$errors->first('password_confirmation')}}
            </div>
            @endif


          <div class="row">

            <!-- /.col -->
            <div class="offset-8 col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="{{route('login.get')}}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  @if ($errors->has('email_already_register'))
    <div class="alert alert-danger">
        {{ $errors->first('email_already_register') }}
    </div>
@endif


  <x-foot />
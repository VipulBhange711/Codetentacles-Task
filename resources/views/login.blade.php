<x-head />


<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Syn</b>Karma</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to As Employee  or Dealer</p>

        <form action="{{route('login.post')}}" method="post">
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

          <div class="row">

            <!-- /.col -->
            <div class="col-4 offset-8">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->


        <p class="mb-0">
          <a href="{{route('register.get')}}" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->



  <x-foot />
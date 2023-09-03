@include('layout.Header')

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>LOGIN</h3>
            <p>Silahkan login terlebih dahulu</p>
        </div>
        <div class="content-error">
            @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                  @endif
            <div class="hpanel">
                <div class="panel-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you username" value="" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" value="" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
        </div>
    </div>   
</div>

@include('layout.Footer')
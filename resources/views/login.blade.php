<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $title = 'Login';
            $version=2.6;
        ?>
        @include('includes/head')
    </head>
    <body>
        <div class="signin-box">
            <div class="panel panel-default mb15">
                <div class="panel-heading text-center">
                    <h2>Sign in</h2>
                </div>
                <div class="panel-body p30">
                    <form action="{{url('/login')}}" id="signin-form" class="general-form" role="form" method="post" accept-charset="utf-8" novalidate="novalidate">
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text" name="username" value="" id="username" class="form-control p10" placeholder="Username" autofocus="1" data-rule-required="1" data-msg-required="This field is required." aria-required="true">
                            <p class="text-danger">{{$errors->has('username') ? $errors->first('username') : ''}}</p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" id="password" class="form-control p10" placeholder="Password" data-rule-required="1" data-msg-required="This field is required." aria-required="true">
                            <p class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                        </div>
                        <div class="form-group mb0">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>

                        <div class="form-group mb0">
                            <button class="btn btn-lg btn-primary btn-block mt15" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

@extends('layouts.admin')

@section('content')

<!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="/" class="logo pull-left">
                    {{-- <img src="assets/images/logo.png" height="54" alt="GTP Admin" /> --}}
                    <h3>GTP ADMIN</h3>
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('/gtpadmin/login') }}" method="POST">
                            <div class="form-group mb-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                <div class="input-group input-group-icon">
                                    <input name="email" type="text" value="{{ old('email') }}" class="form-control input-lg" />
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-lg {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    <a href="{{ url('/gtpadmin/password/reset') }}" class="pull-right">Lost Password?</a>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="password" type="password" class="form-control input-lg" />
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="remember" type="checkbox"/>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright {{date('Y')}}. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->
@endsection

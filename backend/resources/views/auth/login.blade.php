@extends('layouts.auth')

@section('content')
    <div class="slider-typography">
        <div class="slider-text-middle-main">
            <div class="slider-text-middle">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="col-md-6 wow fadeIn center-col">
                        <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">
                            <div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">
                                Вход
                            </div>

                            @if ($errors->has('identity'))
                                <div class="alert alert-danger alert-dismissable border-none box-shadow">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4 class="alert-heading">Ошибка</h4>
                                    <p>{{ $errors->first('identity') }}</p>
                                </div>
                            @endif


                            <div id="success-contact-form-3" class="no-margin-lr"></div>
                            <input placeholder="E-mail\логин" id="email" type="text"
                                   class="input-bg{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity"
                                   value="{{ old('identity') }}" required autofocus>
                            <input placeholder="Пароль" type="password"
                                   class="input-bg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                   required>

                            @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissable border-none box-shadow">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4 class="alert-heading">Ошибка</h4>
                                    <p>{{ $errors->first('password') }}</p>
                                </div>
                            @endif
                            <div class="form-check row">
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="remember"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember"> Запомнить меня </label>
                                </div>
                                <div class="col-md-6">
                                    <a class="text-dark-gray text-small" href="{{ route('password.request') }}">
                                        Забыли пароль?
                                    </a>
                                </div>
                            </div>
                            <div class="btn-group border-radius-4 overflow-hidden btn-group-justified">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-medium border-radius-4 btn-dark-gray">вход</button>
                                </div>
                                <a class="btn btn-medium btn-light-gray" href="{{ route('register') }}">регистрация</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
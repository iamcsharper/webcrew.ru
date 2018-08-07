@extends('layouts.auth')

@section('content')
    <div class="slider-typography">
        <div class="slider-text-middle-main">
            <div class="slider-text-middle">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-md-6 wow fadeIn center-col">
                        <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">
                            <div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">
                                Регистрация аккаунта
                            </div>
                            <div id="success-contact-form-3" class="no-margin-lr"></div>
                            <p class="no-margin-bottom text-black">Кто вы?</p>
                            <div class="btn-group btn-group-toggle border-radius-6" data-toggle="buttons" style="margin-bottom: 15px;overflow:hidden">
                                <label class="btn btn-dark-gray">
                                    <input type="radio" name="account_type" id="student" value="student" autocomplete="off"> Ученик
                                </label>
                                <label class="btn btn-dark-gray" style="border-left: 1px white!important;">
                                    <input type="radio" name="account_type" id="teacher" value="teacher" autocomplete="off"> Учитель
                                </label>
                            </div>
                            <input placeholder="Имя" id="name" type="text"
                                   class="input-bg{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif

                            <input placeholder="E-mail" type="email"
                                   class="input-bg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                            <input placeholder="Пароль" id="password" type="password"
                                   class="input-bg{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" autocomplete="off" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                            <input id="password-confirm" placeholder="Повторите пароль" type="password" class="input-bg"
                                   name="password_confirmation" autocomplete="off" required>
                            <button type="submit"
                                    class="btn btn-medium border-radius-4 btn-block btn-dark-gray">зарегистрироваться
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-medium border-radius-4 btn-block btn-light-gray">у меня уже есть аккаунт</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

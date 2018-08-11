<body style="background:#ff6248;color:white; padding: 15px; font-size: 30px">
    <div style="text-align: center;">
        <h1 style="font-size: 40px">Уважаемый {{$user->name}}!</h1>
        <p>Для продолжения регистрации в роли <b>{{ $role === 'teacher' ? 'учителя' : 'ученика' }}</b> необходимо подтвердить свой e-mail.</p>
        <p>Чтобы подтвердить его, нажмите <a href="{{ $url }}">здесь</a></p>
        <p style="font-size: 40px">Ваш персональный код регистрации: <span style="padding: 10px;background: #df543d;border-radius: 10px;" onclick='document.getElementById("field").style.display="block";this.style.display="none";'>{{ $user->email_token }}</span><input type="text" style="display:none;padding: 10px;background: #df543d;border-radius: 10px;border-color:transparent;outline:none!important;" id="field" value="{{ $user->email_token }}"/></p>
    </div>
</body>
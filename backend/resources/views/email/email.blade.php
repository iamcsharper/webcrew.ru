<body style="background:royalblue;color:white; padding: 15px">
    <div style="text-align: center;">
        <h1>Уважаемый {{$user->name}}!</h1>
        <p>Для продолжения регистрации в роли <b>{{ $role === 'teacher' ? 'учителя' : 'ученика' }}</b> необходимо подтвердить свой e-mail.</p>
        <p>Чтобы подтвердить его, нажмите <a href="{{ $url }}">здесь</a></p>
    </div>
</body>
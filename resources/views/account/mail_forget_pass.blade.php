<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="wrapper_verify" style="display: flex; justify-content: center;">
        <div class="verify_account" style="width: 500px; height: auto; border: 1px dashed;
        border-radius: 20px; padding: 10px; text-align: center;">
            <h2>Xin chào: {{$account->fullname}}</h2>
            <a href="{{route('acc.reset.pass', ["email" => $account->email, "token" => $token])}}" type="button" style="text-decoration: none; color: black;
            padding: 10px; background-color: #c9e6c0; border-radius: 8px;">
                Vui lòng click vào đây để thay đổi mật khẩu
            </a>
            <p>Nếu không phải bạn, vui lòng bỏ qua email này. Trân trọng!</p>
            <br>
            <br>
            <p style="font-style: italic;">---------- Tiếng Trung SuYan ----------</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="./webProject/icofont/css/icofont.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}" />
    <style media="screen">
        :root {
            --color-inp: #e9fefd;
            --main-color: #048e81;
            --section-color: #ecf8ff;
            --main-transition: 300ms;
            --color-blue: #0490cd;
            --color-text: #838689;
            --color-p: #4e5567;
            --color-green: #048fa6;
        }

        section.login {
            background-color: var(--section-color);
            min-height: 100vh;
            z-index: 1;
            position: relative;
        }

        section.login::before {
            content: "";
            background-image: url(../../assets/images/bgOverlay.png);
            right: 0;
            opacity: 0.1;
            bottom: 0;
            background-repeat: no-repeat;
            background-size: cover;
            width: 400px;
            height: 400px;
            z-index: -1;
            position: absolute;
        }

        @media (min-width: 1200px) {
            .info {
                margin-top: 4.2rem;
            }
        }

        .info h5 {
            color: var(--color-blue);
            margin-bottom: 3rem;
        }

        .info ul li {
            margin: 25px 0;
            color: var(--color-p);
            display: flex;
            align-items: center;
        }

        .info ul li .icon {
            margin-left: 10px;
            width: 40px;
            color: white;
            border-radius: 5px;
            height: 40px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: var(--color-green);
        }

        .info ul li svg {
            color: white;
            font-size: 18px;
        }

        .info .photo {
            width: 225px;
            max-height: 225px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
        }

        .info .photo .overlay {
            width: 100%;
            height: 100%;
            color: var(--color-green);
            content: "";
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            left: 0;
            font-size: 35px;
            top: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .info .btn {
            color: var(--color-blue);
            background-color: white;
            border-radius: 15px;
            font-size: 14px;
            width: 250px;
            margin-right: auto;
            column-gap: 10px;
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }

        .info .btn:hover {
            color: var(--color-blue);
        }

        .info .btn svg {
            margin-right: 10px;
            font-size: 18px;
        }

        .info .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .info .logo img {
            width: 50px;
        }

        .info .logo h5 {
            margin: 0;
            margin-bottom: 7px;
        }

        .info .logo p {
            color: var(--color-text);
            font-size: 13px;
        }

        form .logo {
            letter-spacing: 1px;
            margin-bottom: 2rem;
        }

        form .logo h1 {
            font-size: 30px;
            color: var(--main-color);
        }

        form .logo p {
            font-size: 19px;
            color: var(--color-text);
        }

        form>h5 {
            color: var(--color-blue);
            margin-bottom: 4rem;
        }

        .lable {
            color: var(--color-p);
            font-size: 15px;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            column-gap: 10px;
        }

        .lable svg {
            margin-left: 7px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="number"],
        form input[type="password"] {
            border: 1px solid var(--main-color);
            background-color: var(--color-inp);
            border-radius: 13px;
            width: 100%;
            padding: 13px 20px;
        }

        .messag {
            font-size: 13px;
            display: flex;
            justify-content: space-between;
        }

        .messag .lable {
            display: inline-block;
            color: var(--color-green);
            margin-right: 6px;
        }

        .messag .count {
            color: red;
        }

        form input[type="submit"] {
            background-color: var(--main-color);
            color: white;
            border: none;
            box-shadow: none;
            outline: none;
            border-radius: 13px;
            padding: 10px 7rem;
            display: block;
            margin: 7rem auto 0;
        }

        .sgin {
            text-align: center;
            font-size: 13px;
            margin-top: 2rem;
        }

        .sgin a {
            color: var(--color-blue);
            text-decoration: none;
        }

        .logo-sgin img {
            width: 40px;
            margin-bottom: 5px;
        }

        .logo-sgin h1 {
            margin-bottom: 3px;
            font-size: 16px;
            color: var(--main-color);
        }

        .logo-sgin p {
            margin-bottom: 1.5rem;
            font-size: 11px;
            color: var(--color-text);
        }

        .sgin-sec form>h5 {
            margin-bottom: 1.5rem;
        }

        .group-btn a {
            background-color: white;
            padding: 0.7rem 1.5rem;
            color: black;
            margin: 5px;
        }

        .sgin-sec form input[type="text"],
        .sgin-sec form input[type="email"],
        form input[type="number"],
        form input[type="password"] {
            margin-bottom: 20px;
        }

        .sgin-sec form input[type="submit"] {
            margin-top: 2rem;
        }

        .wrap {
            display: flex;
            flex-direction: column;

        }

        .part {
            border-left: 1px solid #eee;
        }

        .parent_all {
            display: flex;
            align-items: center;
            flex-direction: column;
            row-gap: 25px;
        }

        .parent_all p {
            max-width: 400px;
            width: 100%;
            margin: auto;
            color: #4E5567;
        }

        .parent_all .first_group {
            display: flex;
            align-items: center;
            flex-direction: column;
            row-gap: 10px;
        }

        .parent_all .last_group {
            display: flex;
            align-items: center;
            flex-direction: column;
            row-gap: 10px;
        }

        .parent_all .last_group .group {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 10px;
            width: 200px;
            background: white;
        }

        .parent_all .last_group .group input {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
        }

        .parent_all .last_group .group label {
            color: #4E5567;
        }

        .submit {
            border: 0;
            padding: 10px 20px;
            background: #028e80;
            border-radius: 5px;
            color: white;
            width: 100px;
            outline: none;
        }

        .parent_all .last_group .group label {
            color: #4E5567;
            margin-right: 30px;
        }

        label {
            background-color: transparent
        }

    </style>
    <title>title</title>
    @livewireStyles
</head>

<body>

    @livewire('form-register')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
</body>

</html>

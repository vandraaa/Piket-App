<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeSavvy</title>
    <link rel="stylesheet" href="{{ asset('Assets/style.css') }}">
    <link rel="shortcut icon" href="Assets/img/logo-black.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .body {
            font-family: 'Poppins', sans-serif;
        }

        .modal {
            display: block;
            position: fixed;
            min-height: 100vh;
            width: 100%;
            z-index: 100;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .notif-error {
            z-index: 101;
            position: fixed;
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
                /* Skala awal */
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
                /* Skala akhir */
            }
        }

        .notif-error h2 {
            line-height: 0.4;
        }

        .close-btn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>

<body style="background-color: #F3F1F1;">
    {{-- @if ($errors->has('error'))
        <div>
            <script>
                alert("{{ $errors->first('error') }}")
            </script>
        </div>
    @endif --}}

    <section class="login-form">
        <div class="card bg-white shadow" style="padding: 3rem 14rem; border-radius: 12px;">
            <h1 class="text-center">Login <span class="text-success">TimeSavvy</span></h1>
            <form class="" method="POST" action="">
                @csrf
                <div class="mx-auto mt-2">
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <label for="username" class="fw-medium">Username :</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username..." autocomplete="off">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="fw-medium">Password :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password...">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-100 fw-medium">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


    @if ($errors->any())
        <div class="modal">
            <div class="notif-error" id="errorNotification">
                <span class="close-btn" onclick="closeNotification()">&times;</span>
                <h2>{{ $errors->first() }}</h2>
                <img src="Assets/img/error.png" alt="" height="220px">
                <p style="width: 80%; margin: 0 auto;">Please Check Your Username and Password Again</p>
            </div>
        </div>
    @endif
</body>

<script src="Assets/script.js"></script>

</html>

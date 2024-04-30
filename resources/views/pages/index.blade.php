<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TimeSavvy</title>
    <link rel="icon" href="Assets/img/logo-black.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-...." crossorigin="anonymous">

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        background-color: #f3f1f1;
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        background-color: #fff;
        padding: 15px 5px;
        box-shadow: 1px solid;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 2;
        display: flex;
        justify-content: space-between;
    }

    .navbar img {
        height: 40px;
    }

    .navbar h5 {
        padding-top: 2px;
        margin-left: 10px;
    }

    .navbar a {
        text-decoration: none;
    }

    .side-navbar {
        top: 0;
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        background-color: #fff;
    }

    .side-navbar a {
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
        color: #000;
        display: block;
        padding-left: 45px;
    }

    .side-navbar a:hover {
        background-color: #f8f9fa;
    }

    .content {
        margin-top: -50px;
        /* margin-left: 240px; */
        z-index: 1;
        padding-left: 16px;
        padding-right: 16px;
        transition: margin-left 0.3s ease-in-out;
    }

    .content .card-resp {
        width: calc(32% - 25px);
        margin: 10px 10px 10px 10px;
        transition: 0.3s ease-in-out;
    }

    .content .card-resp:hover {
        transform: scale(1.015);
    }

    .side-navbar a.active {
        background-color: #f8f9fa;
        color: #007bff;
    }

    #contentHome .cardresp {
        border: none;
        width: 100%;
    }

    #contentHome .font,
    #contentJadwal .font {
        font-size: 50px;
    }

    .sign-out {
        display: block;
    }

    .isi-content {
        margin-top: 55px;
        margin-left: 250px;
        padding: 16px;
    }

    .gap-dashboard {
        gap: 0.3rem 1.6rem;
    }

    .modal {
        z-index: 99;
        position: fixed;
        display: none;
        min-height: 100vh;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hamburger-icon {
        display: none;
        cursor: pointer;
    }

    .side-navbar {
        /* z-index: 2; */
        top: 10px;
        background-color: #fff;
        left: 0;
        padding-top: 5px;
        transition: left 0.3s ease-in-out;
    }

    .side-navbar.active {
        left: 0;
    }

    .notif-confirm {
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

    .notif-confirm h4 {
        width: 85%;
        margin: 0 auto;
        padding: 10px 15px;
        font-weight: bold;
    }

    .hello {
        width: 98.6%;
        margin-top: 80px;
    }

    @media (max-width: 768px) {

        .hello {
            margin-top: 0;
        }

        #contentUser,
        #contentRuang,
        #contentLaporan {
            margin-left: 0;
        }

        .sign-out {
            display: none;
        }

        .navbar {
            justify-content: space-between;
            z-index: 3;
        }

        .hamburger-icon {
            display: block;
        }
        .side-navbar {
            z-index: 2;
            top: 0;
            background-color: #fff;
            left: -250px;
            padding-top: 15px;
            transition: left 0.3s ease-in-out;
        }

        .content {
            margin-left: 0;
            margin-top: 70px;
            padding-left: 20px;
        }

        .content .card-resp {
            width: calc(30% - 18px);
            margin: 10px;
        }

        .side-navbar.active {
            left: 0;
        }

        .content.active {
            margin-left: 250px;
            padding-left: 270px;
        }

        .font i {
            font-size: 36px;
        }

        .isi-content {
            margin-top: 0;
            overflow-x: auto;
        }
    }

    @media (max-width: 450px) {
        .content .card-resp {
            width: calc(80% - -40px);
            margin: 10px;
        }

        .content .card-resp p {
            font-size: 15px;
        }

        .font i {
            font-size: 32px;
        }

        .gap-dashboard {
            gap: 1rem;
        }

        #contentUser,
        #contentRuang,
        #contentLaporan {
            margin-left: 0;
        }
    }

    .modal {
        z-index: 99;
        position: fixed;
        display: none;
        padding: 1rem 0;
        min-height: 100vh;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .notif-confirm {
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

    .notif-confirm h4 {
        width: 85%;
        margin: 0 auto;
        padding: 10px 15px;
        font-weight: bold;
    }

    .form-add {
        position: relative;
        /* position: absolute; */
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: auto;
        /* top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); */
        max-width: 400px;
        width: 100%;
        /* animation: fadeIn 0.3s ease; Animasi muncul */
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 18px;
        color: #666;
    }

    .close-btn:hover {
        color: #000;
    }

</style>

<body>
    @include('pages.sidebar')

    {{-- @include('pages.dashboard') --}}
    @yield('dashboard')

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        function showHome() {
            setActive("navHome");
        }

        function showRuang() {
            setActive("navRuang");
        }

        function showUser() {
            setActive("navUser");
        }

        function showJadwal() {
            setActive("navJadwal");
        }

        function showLaporan() {
            setActive("navLaporan");
        }

        function showActivity() {
            setActive("navActivity");
        }

        function setActive(activeLinkId) {
            // Remove "active" class from all links
            const links = document.querySelectorAll('.side-navbar a');
            links.forEach(link => link.classList.remove('active'));
            // Add "active" class to the clicked link
            const activeLink = document.getElementById(activeLinkId);
            activeLink.classList.add('active');
        }

        // document.addEventListener("DOMContentLoaded", function() {
        //     showHome();
        // });

        // Fungsi untuk menutup/membuka sidebar
        function toggleSidebar() {
            var sidebar = document.querySelector('.side-navbar');
            sidebar.classList.toggle('active');
        }
    </script>

</body>

</html>

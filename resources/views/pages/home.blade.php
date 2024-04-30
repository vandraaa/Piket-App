{{-- @include('pages.jadwal') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>TimeSavvy</title>
    {{-- Icon --}}
    <link rel="icon" href="Assets/img/logo-black.png" type="image/x-icon">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- AOS Animate --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            background-color: #fff;
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .card-hover {
            transition: 0.3s ease-in-out;
        }

        .card-body {
            min-height: 180px;
        }

        .card {
            cursor: default;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card h4 {
            font-weight: bold;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .shadow-custom {
            box-shadow: 0 10px 12px rgba(0, 0, 0, 0.1);
        }

        .tentang .about-desc {
            padding-top: 20px;
        }

        @media screen and (max-width: 768px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                height: 250%;
                width: 100%;
                transition: 0.3s;
            }

            header {
                padding-top: 1rem;
            }

            header .container-fluid {
                flex-direction: column-reverse;
                align-items: center;
                text-align: center;
            }

            header img {
                margin-top: 2rem;
                max-width: 100%;
                height: auto;
            }

            .btn-header {
                justify-content: center;
            }

            .tentang {
                display: flex;
                flex-direction: column;
            }

            .tentang .about-desc {
                padding-top: 20px;
            }

            .card-advantages {
                display: grid;
                grid-template-columns: 1fr;
                /* Satu kolom */
                gap: 2rem;
                text-align: center;
            }

            .card-advantages .col-md-4 {
                margin-bottom: 2rem;
                max-width: calc(100%);
                width: 100%;
            }

            .card-advantages .card {
                width: 100%;
                /* Kartu memenuhi lebar layar */
            }
        }

        @media screen and (max-width: 450px) {
            .img-logo img {
                height: 400px;
            }

            #advantages h1 {
                line-height: 0.95;
            }

            .tb {
                margin-top: 2rem;
            }

            .isi-content {
                margin-top: 1rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 1rem;
            }

            .input-group {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-5 fixed-top" style="margin-top: -8px">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Assets/img/logo-black.png" alt="" height="35px" class="me-2">
                TimeSavvy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="background-color: #fff">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#advantages">Advantages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login">
                            <button class="btn btn-sm btn-primary">Login</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Home --}}
    <header style="min-height: 100vh; display: flex; justify-content: center; align-items: center;" class="container">
        <div class="d-flex justify-content-center align-items-center container-fluid">
            <div data-aos="fade-right" data-aos-duration="1500">
                <h1 style="font-weight: bold;"><i class="fas fa-rocket"></i> Tingkatkan Efisiensi, Keterlibatan, dan
                    Akurasi dengan
                    <span class="text-success">TimeSavvy</span>
                </h1>
                <p>TimeSavvy adalah Solusi modern untuk manajemen piket kelas yang efisien dan akurat, meningkatkan
                    akurasi dan keterlibatan siswa dengan keakuratan dan kemudahan penggunaan</p>
                <div class="d-flex btn-header" style="gap: 1em;" data-aos="fade-right" data-aos-duration="1000">
                    <a href="/login">
                        <button class="btn btn-success text-white">Use Now!</button>
                    </a>
                    <a href="#schedule">
                        <button class="btn btn-outline-secondary">View Schedule</button>
                    </a>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="2000">
                <img src="Assets/img/6983280.webp" alt="" height="480px">
            </div>
        </div>
    </header>

    {{-- About --}}
    <section class="d-flex bg-success bg-gradient justify-content-center align-items-center w-full"
        style="min-height: 100vh;" id="about">
        <div class="container text-white py-5" style="height: 100%">
            <div class="container-fluid d-flex justify-content-center align-items-center tentang" style="gap: 2em;">
                <div class="img-logo">
                    <img src="Assets/img/logo-white-name.png" height="450px" data-aos="fade-up"
                        data-aos-duration="1000">
                </div>
                <div data-aos="fade-left" data-aos-duration="1200">
                    <h1 style="font-weight: bold;">Tentang <span
                            class="border-bottom border-white border-5">TimeSavvy</span></h1>
                    <p class="about-desc">TimeSavvy adalah platform inovatif yang dirancang untuk mempermudah manajemen
                        jadwal piket kelas
                        secara efisien dan akurat. Dengan menggabungkan teknologi digital dan prinsip manajemen modern,
                        kami bertujuan untuk meningkatkan produktivitas dan keterlibatan siswa dalam proses piket.</p>
                    <p>Tujuan utama E-Piket adalah menyediakan solusi yang praktis dan efektif untuk tugas-tugas piket
                        kelas. Kami berkomitmen untuk memberikan pengalaman pengguna yang intuitif dan efisien, sehingga
                        staf sekolah dapat dengan mudah mengelola dan mengatur jadwal piket dengan akurat</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Advantages --}}
    <section class="container py-5" style="min-height: 90vh;" id="advantages">
        <div class="container-fluid text-center py-5">
            <h1 style="font-weight: bold; font-size: 42px;" data-aos="fade-up" data-aos-duration="1000"
                class="text-advantages">Keuntungan TimeSavvy</h1>
            <p data-aos="fade-down" data-aos-duration="1500">Advantages of TimeSavvy</p>
            <div class="row mt-2 card-advantages">
                {{-- Advantages 1 --}}
                <div class="col-md-4" data-aos="fade-right" data-aos-duration="2000">
                    <div class="card bg-white shadow-custom card-hover" style="border: none">
                        <img src="Assets/img/manage.jpg" class="mx-auto pt-4" style="width: 40%">
                        <div class="card-body">
                            <h4 class="card-title">Pengelolaan Jadwal yang Efisien</h4>
                            <p class="card-text m-auto" style="width: 95%;">Timesavvy memungkinkan pengguna untuk
                                dengan mudah membuat, mengatur,
                                dan mengelola jadwal piket secara online.</p>
                        </div>
                    </div>
                </div>
                {{-- Advantages 2 --}}
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="2500">
                    <div class="card bg-white shadow-custom card-hover" style="border: none">
                        <img src="Assets/img/download.jpg" class="mx-auto pt-4" style="width: 60%">
                        <div class="card-body">
                            <h4 class="card-title">Download Jadwal & Laporan</h4>
                            <p class="card-text" style="width: 96%">Timesavvy menyediakan fitur download jadwal dan laporan dalam bentuk file xslx atau excel</p>
                        </div>
                    </div>
                </div>
                {{-- Advantages 3 --}}
                <div class="col-md-4" data-aos="fade-left" data-aos-duration="2000">
                    <div class="card bg-white shadow-custom card-hover" style="border: none">
                        <img src="Assets/img/update.jpg" class="w-25 mx-auto pt-4 h-50 w-50">
                        <div class="card-body">
                            <h4 class="card-title">Pembaruan Real-Time</h4>
                            <p class="card-text m-auto" style="width: 96%">Timesavvy memungkinkan pengguna untuk
                                dengan cepat menyesuaikan jadwal
                                piket dengan perubahan yang terjadi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Schedule --}}
    <section class="d-flex justify-content-center align-items-center py-5" style="min-height: 90vh;" id="schedule">
        <div class="container py-5" style="height: 100%">
            <div class="container-fluid" style="gap: 2em;">
                <div class="text-center">
                    <h1 style="font-weight: bold; font-size: 42px;" data-aos="fade-up" data-aos-duration="1000">Pilih
                        Jadwal Piket Kelasmu</h1>
                    <p data-aos="fade-down" data-aos-duration="1500">Choose your class picket schedule</p>
                </div>
                <div class="tb" style="width: 100%; margin-top: 3.4rem;">
                    <div class="mx-auto d-flex justify-content-center gap-4 mb-5">
                        <button class="btn btn-lg btn-secondary btn-tbA" onclick="showtbA()" data-aos="fade-right"
                            data-aos-duration="1200">XI RPL A</button>
                        <button class="btn btn-lg btn-secondary btn-tbB" onclick="showtbB()" data-aos="fade-up"
                            data-aos-duration="1500">XI RPL B</button>
                        <button class="btn btn-lg btn-secondary btn-tbC" onclick="showtbC()" data-aos="fade-left"
                            data-aos-duration="1200">XI RPL C</button>
                    </div>
                    {{-- Tabel RPL A --}}
                    <div class="isi-content mx-auto" style="display: none; overflow-x: auto;" id="tbA">
                        <h2 class="text-center">Kelas XI RPL A</h2>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>Hari</th>
                                        <th>Siswa 1</th>
                                        <th>Siswa 2</th>
                                        <th>Siswa 3</th>
                                        <th>Siswa 4</th>
                                        <th>Siswa 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rpla as $ra)
                                        <tr class="text-center align-middle" style="font-size: 13px;">
                                            <td>{{ $ra->hari }}</td>
                                            <td>{{ $ra->siswa_1 }}</td>
                                            <td>{{ $ra->siswa_2 }}</td>
                                            <td>{{ $ra->siswa_3 }}</td>
                                            <td>{{ $ra->siswa_4 }}</td>
                                            <td>{{ $ra->siswa_5 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="text-start">
                                <a href="{{ route('jadwal-rpla.download-excel') }}" class="btn btn-primary">Download
                                    Jadwal</a>
                            </div>
                        </div>
                    </div>
                    {{-- Tabel RPL B --}}
                    <div class="isi-content mx-auto" style="display: none" id="tbB">
                        <h2 class="text-center">Kelas XI RPL B</h2>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>Hari</th>
                                        <th>Siswa 1</th>
                                        <th>Siswa 2</th>
                                        <th>Siswa 3</th>
                                        <th>Siswa 4</th>
                                        <th>Siswa 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rplb as $ra)
                                        <tr class="text-center align-middle" style="font-size: 13px;">
                                            <td>{{ $ra->hari }}</td>
                                            <td>{{ $ra->siswa_1 }}</td>
                                            <td>{{ $ra->siswa_2 }}</td>
                                            <td>{{ $ra->siswa_3 }}</td>
                                            <td>{{ $ra->siswa_4 }}</td>
                                            <td>{{ $ra->siswa_5 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="text-start">
                                <a href="{{ route('jadwal-rplb.download-excel') }}" class="btn btn-primary">Download
                                    Jadwal</a>
                            </div>
                        </div>
                    </div>
                    {{-- Tabel RPL C --}}
                    <div class="isi-content mx-auto" style="display: none" id="tbC">
                        <h2 class="text-center">Kelas XI RPL B</h2>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>Hari</th>
                                        <th>Siswa 1</th>
                                        <th>Siswa 2</th>
                                        <th>Siswa 3</th>
                                        <th>Siswa 4</th>
                                        <th>Siswa 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rplc as $ra)
                                        <tr class="text-center align-middle" style="font-size: 13px;">
                                            <td>{{ $ra->hari }}</td>
                                            <td>{{ $ra->siswa_1 }}</td>
                                            <td>{{ $ra->siswa_2 }}</td>
                                            <td>{{ $ra->siswa_3 }}</td>
                                            <td>{{ $ra->siswa_4 }}</td>
                                            <td>{{ $ra->siswa_5 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="text-start">
                                <a href="{{ route('jadwal-rplc.download-excel') }}" class="btn btn-primary">Download
                                    Jadwal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Schedule --}}

    {{-- Footer --}}
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="d-flex justify-content-sm-around flex-wrap align-items-center">
                <div>
                    <div class="d-flex align-items-center">
                        <img src="assets/img/logo-white.png" alt="" height="65px">
                        <h5 class="mt-3">TimeSavvy</h5>
                    </div>
                    <p class="ms-3">More Efficient Time, <br>
                        More Effective Education</p>
                </div>
                <div>
                    <h5>Link</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-white">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-decoration-none text-white">Ketentuan Layanan</a></li>
                        <li><a href="#" class="text-decoration-none text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h5>Ikuti Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" target="_blank" class="text-decoration-none text-white">Facebook</a>
                        </li>
                        <li><a href="#" target="_blank" class="text-decoration-none text-white">Twitter</a>
                        </li>
                        <li><a href="#" target="_blank" class="text-decoration-none text-white">Instagram</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled cursor-pointer">
                        <li>Email: timesavvy@gmail.com</li>
                        <li>Telepon: 123-456-7890</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <p>&copy; 2024 TimeSavvy. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>
    {{-- End Footer --}}

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    {{-- AOS Animate --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function showtbA() {
            var buttons = document.querySelectorAll('.btn-secondary');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });
            document.querySelector('.btn-tbA').classList.add('active');
            document.getElementById('tbA').style.display = 'block';
            document.getElementById('tbB').style.display = 'none';
            document.getElementById('tbC').style.display = 'none';
        }

        function showtbB() {
            var buttons = document.querySelectorAll('.btn-secondary');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });
            document.querySelector('.btn-tbB').classList.add('active');
            document.getElementById('tbA').style.display = 'none';
            document.getElementById('tbB').style.display = 'block';
            document.getElementById('tbC').style.display = 'none';
        }

        function showtbC() {
            var buttons = document.querySelectorAll('.btn-secondary');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });
            document.querySelector('.btn-tbC').classList.add('active');
            document.getElementById('tbA').style.display = 'none';
            document.getElementById('tbB').style.display = 'none';
            document.getElementById('tbC').style.display = 'block';
        }
    </script>
</body>

</html>

@extends('pages.index')
@section('content')
    <style>
        .isi-content {
            margin-top: 55px;
            margin-left: 250px;
            padding: 16px;
        }
    </style>

    {{-- Tabel RPL A --}}
    <div class="isi-content">
        <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
            <a href="/dashboard" class="text-black text-decoration-none">Dashboard > </a>
            <a data-bs-toggle="collapse" href="#jadwalContent" role="button"
            aria-expanded="false" aria-controls="jadwalContent"class="text-black text-decoration-none">Jadwal > XI RPL A</a>
        </a>
        <div class="w-100 mx-auto" id="contentA">
            <h2 class="text-center text-3xl fw-bold">Kelas XI RPL A</h2>
            <div class="d-flex justify-content-between">
                @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST')
                    <button onclick="openFormJadwal()" class="btn btn-primary">+</button>
                @endif
            </div>
            <div class="overflow-x-auto">
                <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                    <thead>
                        <tr class="text-center align-middle">
                            <th>Hari</th>
                            <th>Siswa 1</th>
                            <th>Siswa 2</th>
                            <th>Siswa 3</th>
                            <th>Siswa 4</th>
                            <th>Siswa 5</th>
                            @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST')
                                <th style="width: 150px; height: auto;">Action</th>
                            @endif
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
                                @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST')
                                    <td class="">
                                        <div class="action d-flex justify-content-center gap-2">
                                            <a href="{{ route('jadwal_rpla.edit', $ra->id) }}">
                                                <button class="btn btn-success"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                            </a>
                                            <form action="{{ route('jadwal.rpla.destroy', $ra->id) }}" method="POST"
                                                class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('jadwal-rpla.download-excel') }}" class="btn btn-primary">Download Jadwal</a>
                    </div>
                    @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST')
                        <button onclick="confirmClearA()" class="btn btn-danger">Clear Data</button>
                    @endif
                </div>
            </div>
        </div>
    </div>



    @include('pages.succes')

    <div class="modal" id="addFormJadwal">
        <div class="form-add">
            <button class="close-btn" onclick="closeFormJadwal()">&times;</button>
            <h2 class="mb-4 text-2xl">Tambah Siswa Piket</h2>
            <form id="studentForm" class="text-start mx-auto" method="POST" action="{{ route('jadwal.rpla.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="hari_piket" class="form-label">Hari Piket :</label>
                    <select class="form-select" name="hari" aria-label="Default select example" required>
                        <label for="hari_piket" class="form-label">Hari Piket :</label>
                        <option selected value="">Pilih Hari Piket</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Siswa 1 :</label>
                    <select name="siswa1a" id="siswa1a" class="form-select" required>
                        <option selected value="">Pilih Siswa</option>
                        @foreach ($a as $sa)
                            <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Siswa 2 :</label>
                    <select name="siswa2a" id="siswa2a" class="form-select" required>
                        <option selected value="">Pilih Siswa</option>
                        @foreach ($a as $sa)
                            <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Siswa 3 :</label>
                    <select name="siswa3a" id="siswa3a" class="form-select" required>
                        <option selected value="">Pilih Siswa</option>
                        @foreach ($a as $sa)
                            <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Siswa 4 :</label>
                    <select name="siswa4a" id="siswa4a" class="form-select" required>
                        <option selected value="">Pilih Siswa</option>
                        @foreach ($a as $sa)
                            <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Siswa 5 :</label>
                    <select name="siswa5a" id="siswa5a" class="form-select" required>
                        <option selected value="">Pilih Siswa</option>
                        @foreach ($a as $sa)
                            <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>


    <style>
        .modal {
            position: fixed;
            min-height: 100vh;
            width: 100%;
            z-index: 100;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .notif-success {
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
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
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
    <script>
        function openFormJadwal() {
            document.getElementById('addFormJadwal').style.display = 'block';
        }

        function closeFormJadwal() {
            document.getElementById('addFormJadwal').style.display = 'none';
        }

        function openFormJadwalB() {
            document.getElementById('addFormJadwalB').style.display = 'block';
        }

        function closeFormJadwalB() {
            document.getElementById('addFormJadwalB').style.display = 'none';
        }

        function openFormJadwalC() {
            document.getElementById('addFormJadwalC').style.display = 'block';
        }

        function closeFormJadwalC() {
            document.getElementById('addFormJadwalC').style.display = 'none';
        }


        function showA() {
            localStorage.setItem('selectedOption', 'A'); // Simpan status terkini ke localStorage
            document.getElementById('opsi').style.display = 'none';
            document.getElementById('contentA').style.display = 'block';
            document.getElementById('contentB').style.display = 'none';
            document.getElementById('contentC').style.display = 'none';
        }

        function showB() {
            localStorage.setItem('selectedOption', 'B'); // Simpan status terkini ke localStorage
            document.getElementById('opsi').style.display = 'none';
            document.getElementById('contentA').style.display = 'none';
            document.getElementById('contentB').style.display = 'block';
            document.getElementById('contentC').style.display = 'none';
        }

        function showC() {
            localStorage.setItem('selectedOption', 'C'); // Simpan status terkini ke localStorage
            document.getElementById('opsi').style.display = 'none';
            document.getElementById('contentA').style.display = 'none';
            document.getElementById('contentB').style.display = 'none';
            document.getElementById('contentC').style.display = 'block';
        }

        function showSuccess() {
            document.getElementById('success').style.display = 'block';
        }

        function closeSuccess() {
            document.getElementById('success').style.display = 'none';
        }

        function openClearModal() {
            document.getElementById('confirmrplb').style.display = 'block';
        }

        function closeClearModal() {
            document.getElementById('confirmrplb').style.display = 'none';
        }

        function confirmClearB() {
            openClearModal();
        }

        function closeClearB() {
            closeClearModal();
        }



        function openClearModalA() {
            document.getElementById('confirmrpla').style.display = 'block';
        }

        function closeClearModalA() {
            document.getElementById('confirmrpla').style.display = 'none';
        }

        function confirmClearA() {
            openClearModalA();
        }

        function closeClearA() {
            closeClearModalA();
        }


        function openClearModalC() {
            document.getElementById('confirmrplc').style.display = 'block';
        }

        function closeClearModalC() {
            document.getElementById('confirmrplc').style.display = 'none';
        }

        function confirmClearC() {
            openClearModalC();
        }

        function closeClearC() {
            closeClearModalC();
        }
    </script>
@endsection

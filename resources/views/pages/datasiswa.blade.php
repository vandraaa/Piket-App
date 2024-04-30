@extends('pages.index')
@section('content')
    <style>
        .form-add {
            position: fixed;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            width: 100%;
            /* animation: fadeIn 0.3s ease-out; Animasi muncul */
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
                /* Skala awal */
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
                /* Skala akhir */
            }
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

    <div class="isi-content" id="contentRuang">
        <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
            <a href="/dashboard" class="text-black text-decoration-none">Dashboard > </a>
            <a href="#" class="text-black text-decoration-none">Datasiswa > </a>
        </a>
        <h2 class="text-center text-3xl" style="font-weight: bold;">Data Siswa</h2>
        <div class="d-flex justify-content-between">
            @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST' && $user->role != 'ADMIN A')
                <button onclick="openForm()" class="btn btn-primary">+</button>
            @endif
            <div class="input-group w-25" style="z-index: 1;">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari siswa...">
                <button class="btn btn-outline-secondary" type="button">Cari</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                <thead>
                    <tr class="text-center">
                        <th style="width: 50px;">No.</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST' && $user->role != 'ADMIN A')
                            <th style="width: 200px">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $s)
                        <tr class="text-center align-middle">
                            <td>{{ ( $student->currentPage()-1 ) * $student->perPage() + $loop->iteration }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->kelas }}</td>
                            <td>{{ $s->nis }}</td>
                            @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST' && $user->role != 'ADMIN A')
                                <td class="d-flex justify-content-center" style="gap: 5px;">
                                    <a href="{{ route('datasiswa.edit', $s->id) }}">
                                        <button class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                    <form action="{{ route('student.destroy', $s->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
                {{ $student->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="modal" id="addForm">
        <div class="form-add">
            <button class="close-btn" onclick="closeForm()">&times;</button>
            <h2 class="mb-4 text-2xl">Tambah Data Siswa</h2>
            <form id="studentForm" class="text-start mx-auto" action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" autocomplete="off" class="form-control" value="" required>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <select class="form-select" aria-label="Default select example" name="kelas" required>
                        <option selected value="">Pilih Kelas</option>
                        <option value="XI RPL A">XI RPL A</option>
                        <option value="XI RPL B">XI RPL B</option>
                        <option value="XI RPL C">XI RPL C</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" id="nis" name="nis" autocomplete="off" class="form-control" value="" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    @if (session('showSuccessPopup'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl">SUCCESS!!</h2>
                <p style="width: 190px;" class="mx-auto">Your data has been updated successfully</p>
            </div>
        </div>
    @endif

    @if (session('showSuccessAdd'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl">SUCCESS!!</h2>
                <p style="width: 170px;" class="mx-auto">Your data has been successfully created</p>
            </div>
        </div>
    @endif

    @if (session('showSuccessDelete'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl">DELETED!!</h2>
                <p style="width: 170px;" class="mx-auto">Your data has been successfully deleted</p>
            </div>
        </div>
    @endif

    <script>
        // Fungsi untuk membuka form tambah data siswa
        function openForm() {
            document.getElementById("addForm").style.display = "flex";
        }

        // Fungsi untuk menutup form tambah data siswa
        function closeForm() {
            document.getElementById("addForm").style.display = "none";
        }

        function showSuccess() {
            document.getElementById('success').style.display = 'block';
        }

        function closeSuccess() {
            document.getElementById('success').style.display = 'none';
        }
    </script>

    {{-- Search Function --}}
    <script>

        function search() {

            var searchText = document.getElementById('searchInput').value.toLowerCase();

            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var username = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                var username2 = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
                var username3 = row.querySelector('td:nth-child(4)').innerText.toLowerCase();

                if (username.includes(searchText)) {
                    row.style.display = 'table-row';
                } else if (username2.includes(searchText)) {
                    row.style.display = 'table-row';
                } else if (username3.includes(searchText)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        document.getElementById('searchInput').addEventListener('input', search);
    </script>
@endsection

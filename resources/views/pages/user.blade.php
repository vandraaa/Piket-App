@extends('pages.index')
@section('content')
    <style>
        .modal {
            z-index: 99;
            position: fixed;
            display: none;
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

        .notif-confirm h4 {
            width: 85%;
            margin: 0 auto;
            padding: 10px 15px;
            font-weight: bold;
        }

        .form-add {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div class="isi-content" id="contentUser">
        <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
            <a href="/dashboard" class="text-black text-decoration-none">Dashboard > </a>
            <a href="#" class="text-black text-decoration-none">Pengguna > </a>
        </a>
        <h2 class="text-center text-3xl" style="font-weight: bold;">Data Pengguna</h2>
        <div class="d-flex justify-content-between">
            @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN C' && $user->role != 'GUEST' && $user->role != 'ADMIN A')
                <button onclick="openUser()" class="btn btn-primary">+</button>
            @endif
            <div class="input-group w-25">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari pengguna...">
                <button class="btn btn-outline-secondary" type="button">Cari</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-bordered table-striped w-100 mx-auto mt-4">
                <thead>
                    <tr class="text-center">
                        <th style="width: 50px;">No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($account as $a)
                        <tr class="text-center align-middle">
                            <td>{{ ( $account->currentPage()-1 ) * $account->perPage() + $loop->iteration }}</td>
                            <td>{{ $a->nama }}</td>
                            <td>{{ $a->username }}</td>
                            <td>{{ $a->password }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm w-50">{{ $a->role }}</button>
                            </td>
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                <a href="{{ route('account.edit', $a->id) }}">
                                    <button class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
                                </a>
                                <form action="{{ route('account.destroy', $a->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#">
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
                {{ $account->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="modal" id="formUser">
        <div class="form-add">
            <button class="close-btn" onclick="closeUser()">&times;</button>
            <h2 class="mb-4 text-2xl">Tambah Data Pengguna</h2>
            <form id="accountForm" class="text-start mx-auto" action="{{ route('account.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" name="username" class="form-label">Nama :</label>
                    <input type="text" id="username" name="nama" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="username" name="username" class="form-label">Username :</label>
                    <input type="text" id="username" name="username" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password" name="password" class="form-label">Password :</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" name="role" class="form-label">Role :</label>
                    <select name="role" id="" class="form-select" required>
                        <option value="" selected>Pilih Role</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="ADMIN A">ADMIN A</option>
                        <option value="ADMIN B">ADMIN B</option>
                        <option value="ADMIN C">ADMIN C</option>
                        <option value="GUEST">GUEST</option>
                    </select>
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
                <h2 class="fw-bold text-3xl mb-2">SUCCESS!!</h2>
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
                <h2 class="fw-bold text-3xl mb-2">SUCCESS!!</h2>
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
                <h2 class="fw-bold text-3xl mb-2">DELETED!!</h2>
                <p style="width: 170px;" class="mx-auto">Your data has been successfully deleted</p>
            </div>
        </div>
    @endif

    <script>
        // Fungsi untuk membuka form tambah data siswa
        function openUser() {
            document.getElementById("formUser").style.display = "block";
        }

        // Fungsi untuk menutup form tambah data siswa
        function closeUser() {
            document.getElementById("formUser").style.display = "none";
        }

        function showSuccess() {
            document.getElementById('success').style.display = 'block';
        }

        function closeSuccess() {
            document.getElementById('success').style.display = 'none';
        }
    </script>


<script>

    function search() {
        var searchText = document.getElementById('searchInput').value.toLowerCase();

        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var username = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
            var username2 = row.querySelector('td:nth-child(4)').innerText.toLowerCase();

            if (username.includes(searchText)) {
                row.style.display = 'table-row';
            } else if (username2.includes(searchText)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('searchInput').addEventListener('input', search);
</script>


@endsection

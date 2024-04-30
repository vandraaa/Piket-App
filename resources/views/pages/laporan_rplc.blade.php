@extends('pages.index')
@section('content')
    <style>
        #contentAj,
        #contentBj,
        #contentCj {
            display: none;
        }

        #contentJadwal {
            transition: none;
        }

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


    <div class="isi-content">
        <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
            <a href="/dashboard" class="text-black text-decoration-none">Dashboard > </a>
            <a data-bs-toggle="collapse" href="#laporanContent" role="button"
            aria-expanded="false" aria-controls="jadwalContent" class="text-black text-decoration-none">Laporan > XI RPL B</a>
        </a>
        <h2 class="text-center text-3xl fw-bold">Laporan Jadwal Piket RPL C</h2>
        <div class="overflow-x-auto">
            <table class="table table-bordered table-striped mx-auto mt-4" style="width: max-content;">
                <thead>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Siswa 1</th>
                        <th>Status</th>
                        <th>Siswa 2</th>
                        <th>Status</th>
                        <th>Siswa 3</th>
                        <th>Status</th>
                        <th>Siswa 4</th>
                        <th>Status</th>
                        <th>Siswa 5</th>
                        <th>Status</th>
                        @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN A' && $user->role != 'GUEST')
                            <th>Edit</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanC as $la)
                        <tr class="text-center align-middle" style="font-size: 13px;">
                            <td>{{ $la->tanggal }}</td>
                            <td>{{ $la->hari }}</td>
                            <td>{{ $la->siswa_1 }}</td>
                            <td>{{ $la->status_1 }}</td>
                            <td>{{ $la->siswa_2 }}</td>
                            <td>{{ $la->status_2 }}</td>
                            <td>{{ $la->siswa_3 }}</td>
                            <td>{{ $la->status_3 }}</td>
                            <td>{{ $la->siswa_4 }}</td>
                            <td>{{ $la->status_4 }}</td>
                            <td>{{ $la->siswa_5 }}</td>
                            <td>{{ $la->status_5 }}</td>
                            @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN A' && $user->role != 'GUEST')
                                <td>
                                    <a href="{{ route('laporan_rplc.edit', $la->id) }}">
                                        <button class="btn btn-success btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div>
                    <a href="{{ route('laporan-rplc.download-excel') }}" class="btn btn-primary text-start">Download
                        Laporan</a>
                </div>
                @if ($user->role != 'ADMIN B' && $user->role != 'ADMIN A' && $user->role != 'GUEST')
                    <button class="btn btn-danger" onclick="confirmClearC()">Clear Data</button>
                @endif
            </div>
    </div>



    @if (session('showSuccessPopup'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" height="170px">
                </div>
                <h2 class="fw-bold">SUCCESS!!</h2>
                <p style="width: 190px;" class="mx-auto">Your data has been updated successfully</p>
            </div>
        </div>
    @endif

    @if (session('showSuccessClear'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" height="170px">
                </div>
                <h2 class="fw-bold">SUCCESS!!</h2>
                <p style="width: 190px;" class="mx-auto">Your data has been cleared successfully</p>
            </div>
        </div>
    @endif

    <div class="modal" id="confirmrplc" style="display: none;">
        <div class="notif-success">
            <div class="d-flex justify-content-end">
                <button class="close-btn" onclick="closeClearC()">&times;</button>
            </div>
            <h2 class="fw-bold text-4xl">Confirmation</h2>
            <div class="d-flex flex-column">
                <img src="Assets/Img/delete.png" alt="" height="230px">
            </div>
            <p style="width: 230px;" class="mx-auto mb-2">Are you sure you want to clear all data?</p>
            <form id="clearForm" action="{{ route('laporan_rplc.clear') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Clear Data</button>
            </form>
        </div>
    </div>
@endsection


<script>
    // Periksa apakah server memberitahu klien untuk menampilkan pop-up keberhasilan

    // Fungsi untuk menampilkan pop-up
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

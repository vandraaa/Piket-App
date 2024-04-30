<title>TimeSavvy</title>
    <link rel="icon" href="Assets/img/logo-smk.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-...." crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

body {
    background-color: #f3f1f1;
    padding: 0;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.isi-content {
        margin-top: 55px;
        padding: 16px;
    }

    form {
        width: 45%;
        padding: 20px;
    }
</style>


<div class="position-absolute pb-5">
    <a href="/laporanxirpla" class="btn btn-secondary top-0 ms-5">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div style="background-color: #f3f1f1;">
    <form id="studentForm" class="text-start mx-auto my-5 bg-white card" method="POST" action="{{ route('laporan_rpla.update', $laporan_rpla->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 class="fw-bold text-center">Edit Data Laporan XI RPL A</h2> <br>
            <label for="tanggal" class="form-label">Tanggal :</label>
            <input type="date" value="{{ $laporan_rpla->tanggal }}" class="form-control" name="tanggal">
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">hari :</label>
            <input type="text" name="hari" class="form-control" value="{{ $laporan_rpla->hari }}" readonly>
        </div>
        {{-- S1 --}}
        <div class="mb-3 d-flex justify-content-between gap-3">
            <div class="w-100">
                <label for="nama" class="form-label">Siswa 1 :</label>
                <input type="text" name="siswa_1" class="form-control" value="{{ $laporan_rpla->siswa_1 }}" readonly>
            </div>
            <div class="w-100">
                <label for="status_1" class="form-label">Status :</label>
                <select name="status_1" class="form-select">
                    <option value="">Pilih Status Siswa 1</option>
                    <option value="Hadir" {{ $laporan_rpla->status_1 == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $laporan_rpla->status_1 == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
            </div>
        </div>
        {{-- S2 --}}
        <div class="mb-3 d-flex justify-content-between gap-3">
            <div class="w-100">
                <label for="nama" class="form-label">Siswa 2 :</label>
                <input type="text" name="siswa_2" class="form-control" value="{{ $laporan_rpla->siswa_2 }}" readonly>
            </div>
            <div class="w-100">
                <label for="status_2" class="form-label">Status :</label>
                <select name="status_2" class="form-select">
                    <option value="">Pilih Status Siswa 2</option>
                    <option value="Hadir" {{ $laporan_rpla->status_2 == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $laporan_rpla->status_2 == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
            </div>
        </div>
        {{-- S3 --}}
        <div class="mb-3 d-flex justify-content-between gap-3">
            <div class="w-100">
                <label for="nama" class="form-label">Siswa 3 :</label>
                <input type="text" name="siswa_3" class="form-control" value="{{ $laporan_rpla->siswa_3 }}" readonly>
            </div>
            <div class="w-100">
                <label for="status_3" class="form-label">Status :</label>
                <select name="status_3" class="form-select">
                    <option value="">Pilih Status Siswa 3</option>
                    <option value="Hadir" {{ $laporan_rpla->status_1 == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $laporan_rpla->status_1 == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
            </div>
        </div>
        {{-- S4 --}}
        <div class="mb-3 d-flex justify-content-between gap-3">
            <div class="w-100">
                <label for="nama" class="form-label">Siswa 4 :</label>
                <input type="text" name="siswa_4" class="form-control" value="{{ $laporan_rpla->siswa_4 }}" readonly>
            </div>
            <div class="w-100">
                <label for="status_4" class="form-label">Status :</label>
                <select name="status_4" class="form-select">
                    <option value="">Pilih Status Siswa 4</option>
                    <option value="Hadir" {{ $laporan_rpla->status_4 == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $laporan_rpla->status_4 == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
            </div>
        </div>
        {{-- S5 --}}
        <div class="mb-3 d-flex justify-content-between gap-3">
            <div class="w-100">
                <label for="nama" class="form-label">Siswa 5 :</label>
                <input type="text" name="siswa_5" class="form-control" value="{{ $laporan_rpla->siswa_5 }}" readonly>
            </div>
            <div class="w-100">
                <label for="status_5" class="form-label">Status :</label>
                <select name="status_5" class="form-select">
                    <option value="">Pilih Status Siswa 5</option>
                    <option value="Hadir" {{ $laporan_rpla->status_5 == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $laporan_rpla->status_5 == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>




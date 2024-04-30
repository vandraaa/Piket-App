<title>TimeSavvy</title>
    <link rel="icon" href="Assets/img/logo-black.png" type="image/x-icon">
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
    <a href="/jadwalxirpla" class="btn btn-secondary top-0 ms-5">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div style="background-color: #f3f1f1;">
    <form id="studentForm" class="text-start mx-auto my-5 bg-white card" method="POST" action="{{ route('jadwal_rpla.update', $jadwal_rpla->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 class="fw-bold text-center">Edit Data Jadwal XI RPL A</h2> <br>
            <label for="hari_piket" class="form-label">Hari Piket :</label>
            <select class="form-select" name="hari" aria-label="Default select example">
                <option value="{{ $jadwal_rpla->hari }}" selected>{{ $jadwal_rpla->hari }}</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 1 :</label>
            <select name="siswa1a" id="siswa1a" class="form-select">
                <option value="{{ $jadwal_rpla->siswa_1 }}" selected>{{ $jadwal_rpla->siswa_1 }}</option>
                @foreach ($a as $sa)
                    <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 2 :</label>
            <select name="siswa2a" id="siswa2a" class="form-select">
                <option value="{{ $jadwal_rpla->siswa_2 }}" selected>{{ $jadwal_rpla->siswa_2 }}</option>
                @foreach ($a as $sa)
                    <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 3 :</label>
            <select name="siswa3a" id="siswa3a" class="form-select">
                <option value="{{ $jadwal_rpla->siswa_3 }}" selected>{{ $jadwal_rpla->siswa_3 }}</option>
                @foreach ($a as $sa)
                    <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 4 :</label>
            <select name="siswa4a" id="siswa4a" class="form-select">
                <option value="{{ $jadwal_rpla->siswa_4 }}" selected>{{ $jadwal_rpla->siswa_4 }}</option>
                @foreach ($a as $sa)
                    <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 5 :</label>
            <select name="siswa5a" id="siswa5a" class="form-select">
                <option value="{{ $jadwal_rpla->siswa_5 }}" selected>{{ $jadwal_rpla->siswa_5 }}</option>
                @foreach ($a as $sa)
                    <option value="{{ $sa->nama_siswa }}">{{ $sa->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>



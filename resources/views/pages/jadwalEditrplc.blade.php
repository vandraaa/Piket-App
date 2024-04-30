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
    <a href="/jadwalxirplc" class="btn btn-secondary top-0 ms-5">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div style="background-color: #f3f1f1;">
    <form id="studentForm" class="text-start mx-auto my-5 bg-white card" method="POST" action="{{ route('jadwal_rplc.update', $jadwal_rplc->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 class="fw-bold text-center">Edit Data Jadwal XI RPL C</h2> <br>
            <label for="hari_piket" class="form-label">Hari Piket :</label>
            <select class="form-select" name="hari" aria-label="Default select example">
                <option value="{{ $jadwal_rplc->hari }}" selected>{{ $jadwal_rplc->hari }}</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 1 :</label>
            <select name="siswa_1" id="siswa1a" class="form-select">
                <option value="{{ $jadwal_rplc->siswa_1 }}" selected>{{ $jadwal_rplc->siswa_1 }}</option>
                @foreach ($c as $sc)
                    <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 2 :</label>
            <select name="siswa_2" id="siswa2a" class="form-select">
                <option value="{{ $jadwal_rplc->siswa_2 }}" selected>{{ $jadwal_rplc->siswa_2 }}</option>
                @foreach ($c as $sc)
                    <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 3 :</label>
            <select name="siswa_3" id="siswa3a" class="form-select">
                <option value="{{ $jadwal_rplc->siswa_3 }}" selected>{{ $jadwal_rplc->siswa_3 }}</option>
                @foreach ($c as $sc)
                    <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 4 :</label>
            <select name="siswa_4" id="siswa4a" class="form-select">
                <option value="{{ $jadwal_rplc->siswa_4 }}" selected>{{ $jadwal_rplc->siswa_4 }}</option>
                @foreach ($c as $sc)
                    <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Siswa 5 :</label>
            <select name="siswa_5" id="siswa5a" class="form-select">
                <option value="{{ $jadwal_rplc->siswa_5 }}" selected>{{ $jadwal_rplc->siswa_5 }}</option>
                @foreach ($c as $sc)
                    <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>



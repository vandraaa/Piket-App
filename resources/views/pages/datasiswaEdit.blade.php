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

        /* .isi-content {
            margin-left: 255px;
            margin-top: 55px;
            padding: 16px;
        } */

        form {
            width: 45%;
            padding: 20px;
        }
    </style>

    <div class="position-absolute pb-5">
        <a href="/datasiswa" class="btn btn-secondary top-0 ms-5">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div style="background-color: #f3f1f1;">
        <form id="studentForm" class="text-start mx-auto my-5 bg-white card"
            action="{{ route('datasiswa.update', $s->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="fw-bold text-center">Edit Datasiswa</h2> <br>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" autocomplete="off"
                    value="{{ $s->nama_siswa }}" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select class="form-select" aria-label="Default select example" name="kelas">
                    <option value="{{ $s->kelas }}">{{ $s->kelas }}</option>
                    <option value="XI RPL A">XI RPL A</option>
                    <option value="XI RPL B">XI RPL B</option>
                    <option value="XI RPL C">XI RPL C</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" id="nis" name="nis" class="form-control" autocomplete="off"
                    value="{{ $s->nis }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>


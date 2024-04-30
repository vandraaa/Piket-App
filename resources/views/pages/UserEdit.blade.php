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
    <a href="/pengguna" class="btn btn-secondary top-0 ms-5">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div style="background-color: #f3f1f1;">
    <form id="studentForm" class="text-start mx-auto my-5 bg-white card" method="POST" action="{{ route('account.update', $account->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 class="fw-bold text-center">Edit Data Pengguna</h2> <br>
            <label for="username" class="form-label">Nama :</label>
            <input type="text" name="nama" class="form-control" autocomplete="off" value="{{ $account->nama }}">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <input type="text" name="username" class="form-control" autocomplete="off" value="{{ $account->username }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Password :</label>
            <input type="password" name="password" class="form-control" value="{{ $account->password }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Role :</label>
            <select name="role" id="siswa2a" class="form-select">
                <option value="{{ $account->role }}" selected>{{ $account->role }}</option>
                <option value="ADMIN">ADMIN</option>
                <option value="ADMIN A">ADMIN A</option>
                <option value="ADMIN B">ADMIN B</option>
                <option value="ADMIN C">ADMIN C</option>
                <option value="GUEST">GUEST</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>



{{-- Form A --}}
<div class="modal" id="addFormJadwal">
    <div class="form-add">
        <button class="close-btn" onclick="closeFormJadwal()">&times;</button>
        <h2 class="mb-4">Tambah Siswa Piket</h2>
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

{{-- Form B --}}
<div class="modal" id="addFormJadwalB">
    <div class="form-add">
        <button class="close-btn" onclick="closeFormJadwalB()">&times;</button>
        <h2 class="mb-4">Tambah Siswa Piket</h2>
        <form id="studentForm" class="text-start mx-auto" method="POST" action="{{ route('jadwal.rplb.store') }}">
            @csrf
            <div class="mb-3">
                <label for="hari_piket" name="hari" class="form-label">Hari Piket :</label>
                <select class="form-select" name="hari" aria-label="Default select example" required>
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
                <select name="siswa_1" id="siswa1b" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($b as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 2 :</label>
                <select name="siswa_2" id="siswa2b" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($b as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 3 :</label>
                <select name="siswa_3" id="siswa3b" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($b as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 4 :</label>
                <select name="siswa_4" id="siswa4b" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($b as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 5 :</label>
                <select name="siswa_5" id="siswa5b" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($b as $siswa)
                        <option value="{{ $siswa->nama_siswa }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

{{-- Form C --}}
<div class="modal" id="addFormJadwalC">
    <div class="form-add">
        <button class="close-btn" onclick="closeFormJadwalC()">&times;</button>
        <h2 class="mb-4">Tambah Siswa Piket</h2>
        <form id="studentForm" class="text-start mx-auto" method="POST" action="{{ route('jadwal.rplc.store') }}">
            @csrf
            <div class="mb-3">
                <label for="hari_piket" class="form-label">Hari Piket :</label>
                <select class="form-select" name="hari" aria-label="Default select example" required>
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
                <select name="siswa_1" id="siswa1c" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($c as $sc)
                        <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 2 :</label>
                <select name="siswa_2" id="siswa2c" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($c as $sc)
                        <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 3 :</label>
                <select name="siswa_3" id="siswa3c" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($c as $sc)
                        <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 4 :</label>
                <select name="siswa_4" id="siswa4c" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($c as $sc)
                        <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Siswa 5 :</label>
                <select name="siswa_5" id="siswa5c" class="form-select" required>
                    <option selected value="">Pilih Siswa</option>
                    @foreach ($c as $sc)
                        <option value="{{ $sc->nama_siswa }}">{{ $sc->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@extends('pages.index')
@section('dashboard')

    @if (isset($user))
        @if ($user->role == 'GUEST' || $user->role == 'ADMIN A' || $user->role == 'ADMIN B' || $user->role == 'ADMIN C')
            <style>
                #userCard,
                #history {
                    display: none;
                }
            </style>
        @endif
    @endif

    <div class="content" id="contentHome" style="margin-left: 250px">
        <div class="hello mx-auto">
            <div class="d-flex justify-content-between">
                <div class="ms-2">
                    <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
                        <a href="#" class="text-black text-decoration-none">Dashboard > </a>
                    </a>
                </div>
                <a href="#" onclick="showLogoutNotification()" class="me-2 text-black text-decoration-none">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Log Out
                </a>
            </div>
            @if (session('script'))
                {!! session('script') !!}
                <div class="mt-4" id="welcome-card">
                    <div class="card bg-white d-flex">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <p class="mb-0">Selamat datang di dashboard. Anda berhasil login!</strong></p>
                            <a onclick="deleteWelcome()" style="cursor: pointer;">
                                &times;
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-wrap gap-dashboard mt-2">
            <!-- User -->
            <div class="card shadow-sm card-resp" style="cursor: pointer;" id="userCard">
                <a href="/pengguna" onclick="showUser()" style="text-decoration: none; color: #000;">
                    <div class="d-flex align-items-center p-3 g-5">
                        <div class="card-body" style="gap: 1.5rem;">
                            <h4 class="card-title text-2xl">{{ $jumlahData }}</h4>
                            <p class="card-text mt-2">Pengguna</p>
                        </div>
                        <div class="font">
                            <i class="fa-solid fa-user me-2"></i>
                        </div>
                    </div>
                    <a href="/pengguna" class="bg-primary"
                        style="border-radius: 0 0 5px 5px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <p class="m-0 py-2 text-light">More Info <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </a>
            </div>

            {{-- Data Siswa --}}

            <div class="card shadow-sm card-resp" style="cursor: pointer;">
                <a href="/datasiswa" onclick="showRuang()" style="text-decoration: none; color: #000;">
                    <div class="d-flex align-items-center py-3 px-3 g-5">
                        <div class="card-body" style="gap: 1.5rem;">
                            <h4 class="card-title text-2xl">{{ $jumlahDataSiswa }}</h4>
                            <p class="card-text mt-2">Data Siswa</p>
                        </div>
                        <div class="font">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                    </div>
                    <a href="/datasiswa" onclick="showRuang()" class="bg-primary"
                        style="cursor: pointer; border-radius: 0 0 5px 5px; display: flex; align-items: center; justify-content: center;">
                        <p class="m-0 py-2 text-light">More Info <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </a>
            </div>

            {{-- Jadwal --}}

            <div class="card shadow-sm card-resp" style="cursor: pointer;">
                <a onclick="showJadwal()" style="text-decoration: none; color: #000;">
                    <div class="d-flex align-items-center py-3 px-3 g-5">
                        <div class="card-body" style="gap: 1.5rem;">
                            <h4 class="card-title text-2xl">3</h4>
                            <p class="card-text mt-2">Jadwal</p>
                        </div>
                        <div class="font">
                            <i class="fa-regular fa-calendar me-2"></i>
                        </div>
                    </div>
                    <a onclick="showJadwal()" class="bg-primary"
                        style="cursor: pointer; border-radius: 0 0 5px 5px; display: flex; align-items: center; justify-content: center;">
                        <p class="m-0 py-2 text-light">More Info <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </a>
            </div>


            {{-- Laporan --}}

            <div class="card shadow-sm card-resp" style="cursor: pointer">
                <a onclick="#showLaporan()" style="text-decoration: none; color: #000;">
                    <div class="d-flex align-items-center py-3 px-3 g-5">
                        <div class="card-body" style="gap: 1.5rem;">
                            <h4 class="card-title text-2xl">3</h4>
                            <p class="card-text mt-2">Laporan</p>
                        </div>
                        <div class="font">
                            <i class="fa-solid fa-file me-2"></i>
                        </div>
                    </div>
                    <a onclick="showLaporan()" class="bg-primary"
                        style="cursor: pointer; border-radius: 0 0 5px 5px; display: flex; align-items: center; justify-content: center;">
                        <p class="m-0 py-2 text-light">More Info <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </a>
            </div>


            {{-- History Aktivitas --}}

            <div class="card shadow-sm card-resp" style="cursor: pointer;" id="history">
                <a href="/riwayataktivitas" style="text-decoration: none; color: #000;">
                    <div class="d-flex align-items-center py-3 px-3 g-5">
                        <div class="card-body" style="gap: 1.5rem;">
                            <h4 class="card-title text-2xl">{{ $countActivity }}</h4>
                            <p class="card-text mt-2">Riwayat Aktivitas</p>
                        </div>
                        <div class="font">
                            <i class="fa-solid fa-history me-2"></i>
                        </div>
                    </div>
                    <a href="/riwayataktivitas" class="bg-primary"
                        style="cursor: pointer; border-radius: 0 0 5px 5px; display: flex; align-items: center; justify-content: center;">
                        <p class="m-0 py-2 text-light">More Info <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </a>
            </div>
        </div>
    </div>
@endsection


<script>
    function deleteWelcome() {
        var welcomeCard = document.getElementById('welcome-card');
        welcomeCard.style.display = 'none';
    }
</script>

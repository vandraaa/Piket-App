<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        background-color: #f3f1f1;
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .overflow-y-auto::-webkit-scrollbar {
        display: none;
    }
</style>


@if (isset($user))
    @if ($user->role == 'GUEST' || $user->role == 'ADMIN A' || $user->role == 'ADMIN B' || $user->role == 'ADMIN C')
        <style>
            #navUser,
            #navActivity {
                display: none;
            }
        </style>
    @endif
@endif

{{-- <div class="navbar px-5">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="hamburger-icon me-4" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <img src="Assets/img/logo-black.png" alt="logo">
            <h5 class="my-auto">TimeSavvy</h5>
            <p class="btn btn-primary my-auto ms-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">{{ $user->role }}</p>
        </div>
    </div>
    <div class="d-flex align-items-center mt-1">
        <h6 class="sign-out">{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d-m-Y') }}</h6>
    </div>
</div> --}}


{{-- <div class="side-navbar mt-5">
    <a href="/dashboard" onclick="showHome()" class="{{ request()->is('dashboard') ? 'active' : '' }}" id="navHome">
        <i class="fa-solid fa-house me-2"></i> Dashboard
    </a>
    <a href="/pengguna" onclick="showUser()" class="{{ request()->is('pengguna') ? 'active' : '' }}" id="navUser">
        <i class="fa-solid fa-user me-2"></i> Pengguna
    </a>
    <a href="/datasiswa" onclick="showRuang()" class="{{ request()->is('datasiswa') ? 'active' : '' }}" id="navRuang">
        <i class="fa-solid fa-user-group"></i> Data Siswa
    </a>
    <a href="/jadwal" onclick="showJadwal()" class="{{ request()->is('jadwal') ? 'active' : '' }}" id="navJadwal">
        <i class="fa-regular fa-calendar me-2"></i> Jadwal
    </a>
    <a href="/laporan" onclick="showLaporan()" class="{{ request()->is('laporan') ? 'active' : '' }}" id="navLaporan">
        <i class="fa-solid fa-file me-2"></i> Laporan
    </a>
    <a href="/riwayataktivitas" onclick="showActivity()" class="{{ request()->is('riwayataktivitas') ? 'active' : '' }}" id="navActivity">
        <i class="fa-solid fa-history me-2"></i> Riwayat
    </a>
    <a onclick="showLogoutNotification()">
        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Log Out
    </a>
</div> --}}


<div class="modal" id="showLogoutNotification">
    <div class="notif-confirm">
        <h5>Are you sure you want to log out?</h5>
        <div class="d-flex flex-column">
            <img src="Assets/img/logout.png" alt="" class="w-72">
            <div class="d-flex" style="margin: 5px auto; gap: 1rem;">
                <button class="btn btn-danger" onclick="logout()">Yes, Log Out</button>
                <button class="btn btn-secondary" onclick="closeLogoutModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<header>
    <nav class="fixed">
        <div class="bg-white px-10 w-64 h-screen overflow-y-auto">
            <div class="flex items-center mt-3">
                <img src="Assets/img/logo-black.png" style="height: 3rem;">
                <h1 class="font-semibold text-xl text-center">TimeSavvy</h1>
            </div>
            <div class="mt-8">
                <p class="text-sm font-medium mb-2">Dashboard</p>
                <a href="/dashboard" class="flex items-center">
                    <div
                        class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fas fa-chart-line pe-3"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </div>
            <div class="mt-4" id="navUser">
                <p class="text-sm font-medium mb-2">Pengguna</p>
                <a href="/pengguna" class="flex items-center">
                    <div
                        class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-solid fa-user pe-3"></i>
                        <span>Pengguna</span>
                    </div>
                </a>
            </div>
            <div class="mt-4">
                <p class="text-sm font-medium mb-2">Datasiswa</p>
                <a href="/datasiswa" class="flex items-center">
                    <div
                        class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-solid fa-user-group pe-3"></i>
                        <span>Datasiswa</span>
                    </div>
                </a>
            </div>
            <div class="mt-4">
                <p class="text-sm font-medium mb-2" data-bs-toggle="collapse" href="#jadwalContent" role="button"
                    aria-expanded="false" aria-controls="jadwalContent">
                    Jadwal <i class="fa-solid fa-caret-down ps-2"></i>
                </p>
                <div class="collapse" id="jadwalContent">
                    <a href="/jadwalxirpla" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-regular fa-calendar pe-3"></i>
                            <span>XI RPL A</span>
                        </div>
                    </a>
                    <a href="/jadwalxirplb" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-regular fa-calendar pe-3"></i>
                            <span>XI RPL B</span>
                        </div>
                    </a>
                    <a href="/jadwalxirplc" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-regular fa-calendar pe-3"></i>
                            <span>XI RPL C</span>
                        </div>
                    </a>
                </div>
            </div>
            {{-- <div class="mt-4">
                <p class="text-sm font-medium mb-2">Jadwal</p>
                <a href="/jadwalxirpla" class="flex items-center">
                    <div class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-regular fa-calendar pe-3"></i>
                        <span>XI RPL A</span>
                    </div>
                </a>
                <a href="/jadwalxirplb" class="flex items-center">
                    <div class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-regular fa-calendar pe-3"></i>
                        <span>XI RPL B</span>
                    </div>
                </a>
                <a href="/jadwalxirplc" class="flex items-center">
                    <div class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-regular fa-calendar pe-3"></i>
                        <span>XI RPL C</span>
                    </div>
                </a>
            </div> --}}
            <div class="mt-4">
                <p class="text-sm font-medium mb-2" data-bs-toggle="collapse" href="#laporanContent" role="button"
                    aria-expanded="false" aria-controls="jadwalContent">
                    Laporan <i class="fa-solid fa-caret-down ps-2"></i>
                </p>
                <div class="collapse" id="laporanContent">
                    <a href="/laporanxirpla" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-solid fa-file pe-3"></i>
                            <span>XI RPL A</span>
                        </div>
                    </a>
                    <a href="/laporanxirplb" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-solid fa-file pe-3"></i>
                            <span>XI RPL B</span>
                        </div>
                    </a>
                    <a href="/laporanxirplc" class="flex items-center">
                        <div
                            class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                            <i class="fa-solid fa-file pe-3"></i>
                            <span>XI RPL C</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mt-4" id="navActivity">
                <p class="text-sm font-medium mb-2">Riwayat Aktivitas</p>
                <a href="/riwayataktivitas" class="flex items-center">
                    <div
                        class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-solid fa-history pe-3"></i>
                        <span>Riwayat</span>
                    </div>
                </a>
            </div>
            <div class="mt-4">
                <p class="text-sm font-medium mb-2">Log Out</p>
                <a onclick="showLogoutNotification()" class="flex items-center cursor-pointer mb-4">
                    <div
                        class="flex items-center hover:bg-gray-200 rounded-lg py-2 pl-2 pr-12 w-full transition-colors duration-300">
                        <i class="fa-solid fa-right-from-bracket pe-3"></i>
                        <span>Log Out</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <nav class="bg-primary h-16 w-full flex justify-between text-white pl-72 pr-10 font-normal items-center">
        <p>{{ $user->nama }} as <span class="font-semibold">{{ $user->role }}</span></p>
        <p>{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d-m-Y') }}</p>
    </nav>
</header>



<script>
    function setActiveLink(element) {
        // Remove 'active' class from all links
        var links = document.querySelectorAll('.side-navbar a');
        links.forEach(function(link) {
            link.classList.remove('active');
        });

        // Add 'active' class to the clicked link
        element.classList.add('active');
    }

    function showLogoutNotification() {
        var logoutNotification = document.getElementById("showLogoutNotification");
        logoutNotification.style.display = "block";
    }

    function closeLogoutModal() {
        var logoutNotification = document.getElementById("showLogoutNotification");
        logoutNotification.style.display = "none";
    }

    function logout() {
        // Panggil fungsi untuk menutup notifikasi logout
        closeLogoutModal();
        // Perform logout action here
        // Redirect to the logout route or execute logout logic
        window.location.href = "{{ route('logout') }}";
    }
</script>

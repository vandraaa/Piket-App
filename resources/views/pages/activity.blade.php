@extends('pages.index')
@section('content')

    <body>
        <div class="isi-content">
            <a href="/" class="text-black text-decoration-none"><i class="fa-solid fa-house"></i> >
                <a href="/dashboard" class="text-black text-decoration-none">Dashboard > </a>
                <a href="#" class="text-black text-decoration-none">Riwayat Aktivitas > </a>
            </a>

            <h2 class="text-center text-3xl" style="font-weight: bold;">Riwayat Aktivitas</h2>
            <div class="overflow-x-auto">
                <table class="table table-bordered table-striped w-100 mx-auto mt-4 text-center align-middle">
                    <thead class="align-middle">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Username</th>
                            <th>Jenis Aktivitas</th>
                            <th width="550px">Detail Aktivitas</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ ( $activities->currentPage()-1 ) * $activities->perPage() + $loop->iteration}}</td>
                                <td>{{ $activity->user }}</td>
                                <td class="text-uppercase">{{ $activity->activity_type }}</td>
                                <td>{{ $activity->activity_details }}</td>
                                <td>{{ $activity->created_at->timezone('Asia/Jakarta')->format('H:i') }}</td>
                                <td>{{ $activity->created_at->timezone('Asia/Jakarta')->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {{ $activities->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </body>
@endsection

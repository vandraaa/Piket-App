@if (session('showSuccessPopup'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl mb-2">SUCCESS!!</h2>
                <p style="width: 190px;" class="mx-auto">Your data has been updated successfully</p>
            </div>
        </div>
    @endif

    @if (session('showSuccessAdd'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl mb-2">SUCCESS!!</h2>
                <p style="width: 170px;" class="mx-auto">Your data has been successfully created</p>
            </div>
        </div>
    @endif

    @if (session('showSuccessDelete'))
        <div class="modal" id="success" style="display: block;">
            <div class="notif-success">
                <div class="d-flex justify-content-end">
                    <button class="close-btn" onclick="closeSuccess()">&times;</button>
                </div>
                <div class="d-flex flex-column">
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl mb-2">DELETED!!</h2>
                <p style="width: 170px;" class="mx-auto">Your data has been successfully deleted</p>
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
                    <img src="Assets/Img/success-logo.png" alt="" style="height: 170px;">
                </div>
                <h2 class="fw-bold text-3xl mb-2">SUCCESS!!</h2>
                <p style="width: 190px;" class="mx-auto">Your data has been cleared successfully</p>
            </div>
        </div>
    @endif

    <div class="modal" id="confirmrpla" style="display: none;">
        <div class="notif-success">
            <div class="d-flex justify-content-end">
                <button class="close-btn" onclick="closeClearA()">&times;</button>
            </div>
            <h2 class="fw-bold text-4xl">Confirmation</h2>
            <div class="d-flex flex-column">
                <img src="Assets/Img/delete.png" alt="" height="230px">
            </div>
            <p style="width: 230px;" class="mx-auto mb-4">Are you sure you want to clear all data?</p>
            <form id="clearForm" action="{{ route('jadwal.rpla.clear') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Clear Data</button>
            </form>
        </div>
    </div>

    <div class="modal" id="confirmrplb" style="display: none;">
        <div class="notif-success">
            <div class="d-flex justify-content-end">
                <button class="close-btn" onclick="closeClearB()">&times;</button>
            </div>
            <h2 class="fw-bold text-4xl">Confirmation</h2>
            <div class="d-flex flex-column">
                <img src="Assets/Img/delete.png" alt="" height="230px">
            </div>
            <p style="width: 230px;" class="mx-auto mb-4">Are you sure you want to clear all data?</p>
            <form id="clearForm" action="{{ route('jadwal.rplb.clear') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Clear Data</button>
            </form>
        </div>
    </div>

    <div class="modal" id="confirmrplc" style="display: none;">
        <div class="notif-success">
            <div class="d-flex justify-content-end">
                <button class="close-btn" onclick="closeClearC()">&times;</button>
            </div>
            <h2 class="fw-bold text-4xl">Confirmation</h2>
            <div class="d-flex flex-column">
                <img src="Assets/Img/delete.png" alt="" height="230px">
            </div>
            <p style="width: 230px;" class="mx-auto mb-4">Are you sure you want to clear all data?</p>
            <form id="clearForm" action="{{ route('jadwal.rplc.clear') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Clear Data</button>
            </form>
        </div>
    </div>

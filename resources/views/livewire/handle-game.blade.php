<div class="core-game"
    style="background-image: url('{{ asset('assets/img/photo_6190289574807322812_y.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="p-2 d-flex justify-content-between pb-0 " style="font-size: 20px; color: yellow;">
        <i class="fa-solid fa-backward col-4" 
   style="color: aqua; cursor: pointer;" 
   onclick="goBack()"></i>
        <p style="font-size: 13px; color: yellow" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Hướng dẫn chơi!
        </p>
    </div>
    <div style="display: flex; justify-content: center">

        <h4
            style="padding: 5px;display: inline; border: 4px solid #f33af3; 
    border-radius: 15px; 
    box-shadow: 0 4px 20px rgba(255, 0, 255, 0.5); 
    color: white; 
    text-align: center;">
            {{ $nameGame }}</h4>

    </div>


    <section style="display: flex;  align-items: center">
        <div class="modelViewPort" id="modelViewPort" style="position: relative; height: 100%;">
            <div class="eva">
                <div class="head">
                    <div class="eyeChamber">
                        <div class="eye"></div>
                        <div class="eye"></div>
                    </div>
                </div>
                <div class="body">
                    <div class="hand"></div>
                    <div class="hand"></div>
                    <div class="scannerThing"></div>
                    <div class="scannerOrigin"></div>
                </div>
            </div>
            <div style="color: aqua; position: absolute; bottom: 0; left: 0;">
                @if ($percentage)
                    Đã phân tích!
                @else
                    Phân tích!
                @endif
            </div>
        </div>

        <div
            style="display: flex; align-items: center; justify-content: center; position: relative; width: 120px; height: 120px; background-image: url('{{ asset('assets/img/loadrmbg.png') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <img style="animation: spin 1s linear infinite; position: absolute; width: 100px; height: 84px;"
                src="{{ asset('assets/img/photo_6190289574807322784_x-removebg-preview.png') }}" alt="">
            <p class="position-absolute"
                style="color: yellow; text-align: center; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                {{ $percentage }}%
            </p>
        </div>

    </section>

    <div id="language-screen" style="padding: 0px 20px 20px 20px">
        <img id="imgGame" style="margin-left:10 " src="{{ asset('storage/' . $imgGame) }}" alt="ảnh"
            width="100px" height="100px">
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center align-items-center mx-2"
                style="width: 111px; height: 53px; position: relative; 
    border: 4px solid #f33af3; 
    border-radius: 15px; 
    box-shadow: 0 4px 20px rgba(255, 0, 255, 0.5); 
    color: white; 
    text-align: center;">
                <div style="position: relative; z-index: 1;">
                    {{ $roundText ?: 'Round: 0 - 0' }}
                </div>
            </div>
            <div class="mx-2 d-flex justify-content-center align-items-center"
                style="width: 111px; height: 53px; position: relative; 
    border: 4px solid #f33af3; 
    border-radius: 15px; 
        box-shadow: 0 4px 20px rgba(255, 0, 255, 0.5); 

    color: white; 
    text-align: center;">
                {{-- <img src="{{ asset('assets/img/z6049715203918_c2a3e92ab74584e92b6b2ba469780439-removebg-preview.png') }}"
                     alt=""
                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"> --}}
                <div style="position: relative; z-index: 1;">
                    {{ $startTime ?: '00:00' }} - {{ $endTime ?: '00:00' }}
                </div>
            </div>


        </div>

        <!-- Phần tử scan (sẽ hiển thị sau 3s khi nhấn nút) -->
        <div id="scan" style="display: none">
            <div class="fingerprint"></div>
            <h3> Nhận tỉ lệ</h3>
        </div>

        <!-- Nút bấm gọi Livewire action -->


        <input type="hidden" id="user-coins" value="{{ Auth::user()->coin }}">

        <button id="french-button" wire:click="generateRandomPercentage()" aria-label="Sélectionner la langue française"
            @if ($percentage) disabled @elseif($isContact) disabled @endif
            style="background: none; border: none">
            <img src="{{ asset('assets/img/photo_6190289574807322765_y-removebg-preview.png') }}" alt=""
                width="100
    0px" height="auto">
        </button>


        <p id="contact-message" style="color: yellow; text-align: center">
            @if ($contact)
                Liên hệ telegram  <a href="{{ $contact }}">{{ $contact }}</a>   để nhận thêm xu
            @else
            Liên hệ telegram <a href="https://t.me/Caoboisanhu">Cao bồi săn hủ</a> {{ $contact }} để nhận thêm xu
            @endif
        </p>
        

        </divstyle=>
    </div>


    <div id="popup"
        style="
        display: none; 
        position: fixed; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        width: 300px; 
        padding: 20px; 
        background-color: white; 
        border: 1px solid aqua; 
        border-radius: 10px; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
        text-align: center; 
        z-index: 1000;">
        Đây là popup thông báo<br>
        <button onclick="hidePopup()"
            style="
            margin-top: 10px; 
            padding: 5px 10px; 
            border: none; 
            background-color: aqua; 
            color: white; 
            border-radius: 5px; 
            cursor: pointer;">Đóng</button>
    </div>

    {{-- // poppup --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hướng dẫn chơi!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 13px; color: rgb(0, 0, 0); line-height: 1.6;">
                        <strong>HƯỚNG DẪN SỬ DỤNG TOOL</strong><br>
                        1 - Chọn sảnh » chọn game có tỷ lệ từ 75 - 90%.
                        <span style="color: red;">(Lưu ý: Không chọn game có tỷ lệ 100% vì tỷ lệ rớt SCT không còn, dễ
                            bị hút).</span><br>
                        2 - Tỷ lệ tốt kèm với số vòng quay. Anh em đi mức thấp khoảng tầm 30 - 45 vòng rồi nâng cược lên
                        một mức.<br>
                        3 - Anh em phải chia vốn đi cược nhỏ trước rồi nâng lên sau.<br>
                        <em>Ví dụ:</em> Vốn 500k » đi vòng nhỏ 2k từ 30 - 45 vòng, rồi nâng lên 4k đi tiếp.<br>
                        * Mấy anh em vốn bé hơn 500k thì đi nhỏ hơn mức 2k.<br>
                        * Ngược lại, mấy anh em vốn lớn hơn 500k thì đi to hơn.
                    </p>

                </div>
            </div>
        </div>
    </div>


    {{-- end popup  --}}


    <script>
        document.getElementById('french-button').addEventListener('click', function() {

            var scanElement = document.getElementById('scan');
            var imgGame = document.getElementById('imgGame');

            scanElement.style.display = 'block';
            imgGame.style.display = 'none';

            setTimeout(function() {
                scanElement.style.display = 'none';
                imgGame.style.display = 'none';
            }, 3000);

            exit;

        });
    </script>

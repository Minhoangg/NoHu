<div class="core_wrap container-fluid p-0">

    <video autoplay loop muted>
        <source src="{{ asset('assets/video/1120.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="box_core">
            <div class="frame_core">
                <div class="frame_core_top d-flex justify-content-between">
                    <i onclick="goBack()" class="fa-solid fa-backward"></i>
                    <div class="name">
                        <div class="loading">
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                            <span style="--i:4;"></span>
                            <span style="--i:5;"></span>
                            <span style="--i:6;"></span>
                            <span style="--i:7;"></span>
                            <span style="--i:8;"></span>
                            <span style="--i:9;"></span>
                            <span style="--i:10;"></span>
                        </div>
                    </div>
                </div>

                <div class="frame_core_bottom d-flex">
                    <div class="frame_core_bottom_left">
                        <img src="{{ asset('assets/img/ava_1.gif') }}" alt="">
                    </div>
                    <div class="frame_core_bottom_right">
                        <div class="frame_core_bottom_right_1">
                            <div class="name">
                                <h4>win win win win win win</h4>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/pg.png') }}" alt="" width="80"
                                    height="80">
                            </div>
                            <div class="scan">
                                <div class="fingerprint"></div>
                                <h3>Đang Nhận Tỉ Lệ...</h3>
                            </div>
                            <div class="ratio_dt">
                                <div class="ring">
                                    <h1>0%</h1>
                                </div>
                            </div>
                        </div>
                        <div class="frame_core_bottom_right_2">
                            <canvas></canvas>
                            <div>
                                <div class="button-time" id="timeButton">05:45 - 00:00</div>
                                <div class="button-secondary" id="timeButton">round: 67-99</div>
                            </div>

                        </div>
                        <div class="frame_core_bottom_right_3">
                            <button wire:click="handleClick">Nhận Tỉ Lệ</button>
                            <img src="{{ asset('assets/img/1_tmp.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
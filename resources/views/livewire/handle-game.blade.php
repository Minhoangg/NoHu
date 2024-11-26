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

                    <div id="arrowAnim">
                        <div class="arrowSliding">
                            <div class="arrow"></div>
                        </div>
                        <div class="arrowSliding delay1">
                            <div class="arrow"></div>
                        </div>
                        <div class="arrowSliding delay2">
                            <div class="arrow"></div>
                        </div>
                        <div class="arrowSliding delay3">
                            <div class="arrow"></div>
                        </div>
                    </div>

                </div>

                <div class="frame_core_bottom d-flex">
                    <div class="frame_core_bottom_left">
                        <video autoplay loop muted>
                            <source src="{{ asset('assets/video/a4dd517c96b44c969b4790deb685a1ff.webm') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="frame_core_bottom_right">
                        <div class="frame_core_bottom_right_1">
                            <div class="name">
                                <svg viewBox="0 0 800 200" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Định nghĩa pattern cho chữ -->
                                    <defs>
                                        <pattern id="imagePattern" patternUnits="userSpaceOnUse" width="400"
                                            height="400">
                                            <image href="https://iili.io/2aZNbEJ.png" x="0" y="0" width="400"
                                                height="400" />
                                        </pattern>

                                        <!-- Định nghĩa glow filter -->
                                        <filter id="glowFilter" x="-50%" y="-50%" width="200%" height="200%">
                                            <feGaussianBlur in="SourceAlpha" stdDeviation="8" result="blurred" />
                                            <feOffset in="blurred" dx="0" dy="0"
                                                result="offsetBlurred" />
                                            <feFlood flood-color="cyan" result="glowColor" />
                                            <feComposite in="glowColor" in2="offsetBlurred" operator="in" />
                                            <feMerge>
                                                <feMergeNode />
                                                <feMergeNode in="SourceGraphic" />
                                            </feMerge>
                                        </filter>
                                    </defs>

                                    <!-- Text -->
                                    <text id="animatedText" x="50%" y="50%" dominant-baseline="middle"
                                        text-anchor="middle">Thánh địa win</text>
                                </svg>

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
                            <button class="neon-button">
                                <span>Nhận Tỉ Lệ</span>
                                <div class="glow-wrap">
                                    <div class="glow"></div>
                                </div>
                            </button>
                            <img src="{{ asset('assets/img/1_tmp.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="header_main container-fluid p-0">
    <div class="container-fluid header_top">
        <div class="container header_top_wrap py-3">
            <div class="row">
                <div class="logo col-6">
                    <a href="">
                        <img src="{{ asset('assets/img/logoremovebg-preview2.png') }}" alt="">
                    </a>
                </div>

                <div class="menu_dropdow col-6" id="menuIcon">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <div class=" action col-6 d-flex justify-content-end align-items-center  ">
                    <div class="account">
                        <i class="fa-regular fa-user"></i>
                        <span class="">Bigwin</span>
                    </div>
                    <div class="account" >
                        <i class="fa-solid fa-coins"></i>
                        <span class="">100</span>
                    </div>
                    <div class="account" >
                        <span class=""><a href="{{ route('client.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile_menu container" id="mobileMenu">
        <ul>
            <li>
                <span>Liên hệ</span>
            </li>
            <li>
                <span>Giới thiệu</span>
            </li>
            <li>
                <span>Bài viết</span>
            </li>
        </ul>
    </div>

</header>

<script>
    const menuIcon = document.getElementById("menuIcon");
    const mobileMenu = document.getElementById("mobileMenu");

    menuIcon.addEventListener("click", () => {
        mobileMenu.style.display = mobileMenu.style.display === "block" ? "none" : "block";
    });
</script>

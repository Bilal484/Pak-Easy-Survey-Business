<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <title>Document</title>
</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4 px-m-0">
            <a class="navbar-brand" href="#">
                <img src="assets/images/Logo.png" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-5 ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="javascript:void(0);">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('referral-users') }}">Affiliate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign In</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">Referral Code: {{ Auth::user()->own_referral_code }}</span>
                            <input type="hidden" id="hiddenReferralCode" value="{{ Auth::user()->own_referral_code }}">
                            <button class="btn btn-sm btn-outline-secondary" id="copyReferralCode">Copy</button>
                        </li>
                    @endguest
                </ul>
                <div class="d-flex">
                    <button class="btn">Language</button>
                </div>
            </div>
        </div>
    </nav>

    <main>

        <div id="intro-example" class="p-5 d-flex align-items-center   ">
            <div class="mask d-flex justify-content-evenly align-items-center w-100">

                <div class="text-white">
                    <h1 class="mb-4 title">Opertunity For Online Earning</h1>
                    <h5 class="mb-4 description">
                        A Profitable platform for high-margin investment
                    </h5>
                </div>
                <div class="image">
                    <img src="assets/images/Vector.png" class="img-fluid" alt="" width="120">
                </div>

            </div>

        </div>
        <!-- start Dollar Section-->
        <div class="conainer">
            <div class="row" id="D-container">
                {{-- @if ($userStats) --}}
                    <div class="col-md-4" id="dollar">
                        <i class="fa-solid fa-dollar-sign"></i>
                        {{-- {{ $userStats->earnings + $userStats->reviews()->count() * 10 }} --}}
                        <p>Your Total Balance</p>
                    </div>
                {{-- @endif --}}
                <div class="col-md-4" id="dollar">
                    <i class="fa-brands fa-golang"></i>
                    <h3>Rs. 36.9M</h3>
                    <p>Your Level__ Out Of 10</p>

                </div>
                <div class="col-md-4" id="dollar">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <h3>Rs. 36.9M</h3>
                    <p>Your Withdraw Money</p>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="row" id="op-pic">
                <div class="col-md-6"><img src="assets/images/Vector (4).png" alt="">
                </div>
            </div>
        </div>
        <h4>Explore New Oppurtunities</h4>
        <p class="wa">Find Your Work By Clicking On This Link <a href="#">WhatsappGroup</a></p>

    </main>
    <!-- End Main Sectio -->

    <!-- Start Footer Section -->
    <div class="container-fluid" id="footer-start">
        <div class="row">

            <div class="col-md-4" id="about">
                <div class="brand ">
                    <a class="navbar-brand" href="index.html" style="float:left;">
                        <img src="assets/images/Logo.png" alt="PakEasy-BusinessSurvey-Logo" width="100">
                    </a>
                </div>
                <p>
                    There Will be Place all The description About The Company</p>
                <div class="icon"><i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
            </div>
            <div class="col-md-4 link" id="links">
                <h3>Quick Links</h3>
                <a href="#">1. Why Us</a>
                <a href="#">2. Affiliate Program</a>
                <a href="#">3. Join Us</a>

            </div>
            <div class="col-md-4" id="links">
                <h3>Pages</h3>
                <a href="#">1. Disclaimer</a>
                <a href="#">2. Privacy And Policy</a>
                <a href="#">3. Terms & Conditions</a>

            </div>
        </div>
    </div>
    <div class="footer">
        <p><i class="fa-solid fa-copyright"></i>All Right CopyRigth Reserved EasyBusinessSurvey.Com</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hiddenReferralCodeElement = document.getElementById('hiddenReferralCode');
            const copyReferralCodeButton = document.getElementById('copyReferralCode');

            copyReferralCodeButton.addEventListener('click', function() {
                copyReferralCode();
            });

            function copyReferralCode() {
                const referralCode = hiddenReferralCodeElement.value;
                navigator.clipboard.writeText(referralCode).then(function() {
                    showToast('Referral code copied! Paste it wherever you want.');
                }, function() {
                    showToast('Failed to copy referral code.');
                });
            }

            function showToast(message) {
                const toastElement = document.getElementById('toast');
                toastElement.innerText = message;
                toastElement.classList.add('show');

                setTimeout(function() {
                    toastElement.classList.remove('show');
                }, 2000);
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

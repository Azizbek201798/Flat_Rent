<?php

declare(strict_types=1);

loadPartials('header');

?>

<body class="dark:bg-slate-900">
<!-- Loader Start -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader End -->
<section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
    <div class="absolute inset-0 image-wrap z-1 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
    <div class="container relative z-3">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                <?php if($_SESSION["login_error"]): ?>
                    <?= $_SESSION["login_error"];?>
                <?php endif;?>
                <a href="index.html"><img src="assets/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Signup</h5>

                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="bg-red-100 dark:bg-red-800 border border-red-400 dark:border-red-500 text-red-700 dark:text-red-300 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline"><?= $_SESSION['login_error']; ?></span>
                    </div>
                <?php endif; ?>

                <form class="text-start" action="/register" method="post">
                    <div class="grid grid-cols-1">
                        <div class="mb-4">
                            <label class="font-semibold" for="RegisterName">Your Name:</label>
                            <input id="RegisterName" type="text" class="form-input mt-3" placeholder="Harry" name="username">
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="LoginEmail">Email Address:</label>
                            <input id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com" name="email">
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="LoginPassword">Password:</label>
                            <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="Password:" name="password">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-0">
                                <input class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="AcceptT&C">
                                <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a href="" class="text-green-600">Terms And Condition</a></label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Register</button>
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Already have an account ? </span> <a href="auth-login.html" class="text-black dark:text-white font-bold">Sign in</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--end section -->

<div class="fixed bottom-3 end-3 z-10">
    <a href="" class="back-button btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full"><i data-feather="arrow-left" class="size-4"></i></a>
</div>

<!-- Switcher -->
<div class="fixed top-1/4 -left-2 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] start-[2px] size-7"></span>
                </label>
            </span>
</div>
<!-- Switcher -->

<!-- LTR & RTL Mode Code -->
<div class="fixed top-[40%] -left-3 z-50">
    <a href="" id="switchRtl">
        <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden" >LTR</span>
        <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
    </a>
</div>
<!-- LTR & RTL Mode Code -->

<!-- JAVASCRIPTS -->
<script src="assets/libs/particles.js/particles.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/plugins.init.js"></script>
<script src="assets/js/app.js"></script>
<!-- JAVASCRIPTS -->
</body>
</html>

<?php
loadPartials('footer');
?>
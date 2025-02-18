<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Maha Personal cv/resume template for professional and personal website." />
    <meta name="keywords"
        content="creative, cv, designer,  online cv, online resume, powerful portfolio, professional, professional resume, responsive, resume, vcard " />
    <meta name="developer" content="Md. Siful Islam">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FAV AND ICONS   -->
    <link rel="shortcut icon" href=" {{ asset('assets/images/favicon.png') }} ">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('assets/icons/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/plugins/css/bootstrap.min.css') }} ">
    <!-- Animate CSS-->
    <link rel="stylesheet" href=" {{ asset('assets/plugins/css/animate.css') }} ">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href=" {{ asset('assets/plugins/css/owl.css') }} ">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Fancybox-->
    <link rel="stylesheet" href=" {{ asset('assets/plugins/css/jquery.fancybox.min.css') }} ">

    <!-- Custom CSS-->
    <link rel="stylesheet" href=" {{ asset('assets/css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/css/responsive.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/admin/style.css') }} ">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @inertiaHead
</head>

<body class="black-bg">
    @inertia

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="fa fa-chevron-up" aria-hidden="true"></i></a>
            
    {{-- all javascript is here --}}
    <script src=" {{ asset('assets/plugins/js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src=" {{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
    <!-- owl carousel -->
    {{-- <script src=" {{ asset('assets/assets/plugins/js/owl.carousel.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/plugins/js/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/packery-mode.pkgd.js') }}"></script>

    <!-- toast js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
    <!-- wow -->
    <script src=" {{ asset('assets/plugins/js/wow.min.js') }}"></script>
    <!-- Fancybox js-->
    <script src=" {{ asset('assets/plugins/js/jquery.fancybox.min.js') }}"></script>

    <script src=" {{ asset('assets/js/custom-scripts.js') }} "></script>
    <script src=" {{ asset('assets/navbar/nav.js') }} "></script>

</body>

</html>
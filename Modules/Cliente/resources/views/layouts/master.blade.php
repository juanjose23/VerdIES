<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>VerdIES @yield('title')</title>


    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 Admin Dashboard built for developers!">
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/">


    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../../css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/fonts/flag-icons.css') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/rtl/core.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/rtl/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/css/demo.css') }}">

    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/rtl/core-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/rtl/theme-default-dark.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/typeahead-js/typeahead.css') }}">
    <link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/apex-charts/apex-charts.css') }}">

    <!-- Page CSS -->


    <!-- Helpers -->
    <script src="{{ asset('Cliente/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('Cliente/assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('Cliente/assets/js/config.js') }}"></script>

</head>

<body>




    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">







            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


                <div class="app-brand demo ">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">

                            <svg width="25" viewbox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                    <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                    <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                    <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                </defs>
                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                <g id="Path-3" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                </g>
                                                <g id="Path-4" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                </g>
                                            </g>
                                            <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">sneat</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item active open">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                            <span class="badge rounded-pill bg-danger ms-auto">5</span>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item active">
                                <a href="dashboards-analytics.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="dashboards-crm.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="CRM">CRM</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-ecommerce-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="eCommerce">eCommerce</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-logistics-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Logistics">Logistics</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-academy-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Academy">Academy</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div class="text-truncate" data-i18n="Layouts">Layouts</div>
                        </a>

                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="layouts-collapsed-menu.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Collapsed menu">Collapsed menu</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-content-navbar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Content navbar">Content navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../horizontal-menu-template" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Horizontal">Horizontal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-without-menu.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Without menu">Without menu</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-without-navbar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Without navbar">Without navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-fluid.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Fluid">Fluid</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Container">Container</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-blank.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Blank">Blank</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Front Pages -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-store'></i>
                            <div class="text-truncate" data-i18n="Front Pages">Front Pages</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Landing">Landing</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../front-pages/payment-page.html" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Payment">Payment</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../front-pages/checkout-page.html" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Checkout">Checkout</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../front-pages/help-center-landing.html" class="menu-link" target="_blank">
                                    <div class="text-truncate" data-i18n="Help Center">Help Center</div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- Apps & Pages -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
                    </li>
                    <li class="menu-item">
                        <a href="app-email.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div class="text-truncate" data-i18n="Email">Email</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-chat.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Chat</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-calendar.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div class="text-truncate" data-i18n="Calendar">Calendar</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-kanban.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Kanban">Kanban</div>
                        </a>
                    </li>
                    <!-- e-commerce-app menu start -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-cart-alt'></i>
                            <div class="text-truncate" data-i18n="eCommerce">eCommerce</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-ecommerce-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Products">Products</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-ecommerce-product-list.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Product List">Product List</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-product-add.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Add Product">Add Product</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-category-list.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Category List">Category List</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Order">Order</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-ecommerce-order-list.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Order List">Order List</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-order-details.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Order Details">Order Details</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Customer">Customer</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-ecommerce-customer-all.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="All Customers">All Customers</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                                            <div class="text-truncate" data-i18n="Customer Details">Customer Details</div>
                                        </a>
                                        <ul class="menu-sub">
                                            <li class="menu-item">
                                                <a href="app-ecommerce-customer-details-overview.html" class="menu-link">
                                                    <div class="text-truncate" data-i18n="Overview">Overview</div>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="app-ecommerce-customer-details-security.html" class="menu-link">
                                                    <div class="text-truncate" data-i18n="Security">Security</div>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="app-ecommerce-customer-details-billing.html" class="menu-link">
                                                    <div class="text-truncate" data-i18n="Address & Billing">Address & Billing</div>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="app-ecommerce-customer-details-notifications.html" class="menu-link">
                                                    <div class="text-truncate" data-i18n="Notifications">Notifications</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="app-ecommerce-manage-reviews.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Manage Reviews">Manage Reviews</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-ecommerce-referral.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Referrals">Referrals</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Settings">Settings</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-detail.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Store Details">Store Details</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-payments.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Payments">Payments</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-checkout.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Checkout">Checkout</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-shipping.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Shipping & Delivery">Shipping & Delivery</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-locations.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Locations">Locations</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-ecommerce-settings-notifications.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Notifications">Notifications</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- e-commerce-app menu end -->
                    <!-- Academy menu start -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-book-open'></i>
                            <div class="text-truncate" data-i18n="Academy">Academy</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-academy-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-academy-course.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="My Course">My Course</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-academy-course-details.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Course Details">Course Details</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Academy menu end -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-car'></i>
                            <div class="text-truncate" data-i18n="Logistics">Logistics</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-logistics-dashboard.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-logistics-fleet.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Fleet">Fleet</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-food-menu'></i>
                            <div class="text-truncate" data-i18n="Invoice">Invoice</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-invoice-list.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-preview.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Preview">Preview</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-edit.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Edit">Edit</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-add.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Add">Add</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div class="text-truncate" data-i18n="Users">Users</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-user-list.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="List">List</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="View">View</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="app-user-view-account.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Account">Account</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-user-view-security.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Security">Security</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-user-view-billing.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Billing & Plans">Billing & Plans</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-user-view-notifications.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Notifications">Notifications</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="app-user-view-connections.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Connections">Connections</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-check-shield'></i>
                            <div class="text-truncate" data-i18n="Roles & Permissions">Roles & Permissions</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-access-roles.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Roles">Roles</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-access-permission.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Permission">Permission</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div class="text-truncate" data-i18n="Pages">Pages</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="User Profile">User Profile</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="pages-profile-user.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Profile">Profile</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-profile-teams.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Teams">Teams</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-profile-projects.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Projects">Projects</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-profile-connections.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Connections">Connections</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Account Settings">Account Settings</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="pages-account-settings-account.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Account">Account</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-security.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Security">Security</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-billing.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Billing & Plans">Billing & Plans</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-notifications.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Notifications">Notifications</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-connections.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Connections">Connections</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="pages-faq.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="FAQ">FAQ</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-pricing.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Misc">Misc</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="pages-misc-error.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Error">Error</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-misc-under-maintenance.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Under Maintenance">Under Maintenance</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-misc-comingsoon.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Coming Soon">Coming Soon</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-misc-not-authorized.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Not Authorized">Not Authorized</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div class="text-truncate" data-i18n="Authentications">Authentications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Login">Login</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-login-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-login-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Register">Register</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-register-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-register-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-register-multisteps.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Multi-steps">Multi-steps</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Verify Email">Verify Email</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-verify-email-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-verify-email-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Reset Password">Reset Password</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-reset-password-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-reset-password-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Forgot Password">Forgot Password</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-forgot-password-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Two Steps">Two Steps</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="auth-two-steps-basic.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="auth-two-steps-cover.html" class="menu-link" target="_blank">
                                            <div class="text-truncate" data-i18n="Cover">Cover</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                            <div class="text-truncate" data-i18n="Wizard Examples">Wizard Examples</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="wizard-ex-checkout.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Checkout">Checkout</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="wizard-ex-property-listing.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Property Listing">Property Listing</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="wizard-ex-create-deal.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Create Deal">Create Deal</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="modal-examples.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-window-open"></i>
                            <div class="text-truncate" data-i18n="Modal Examples">Modal Examples</div>
                        </a>
                    </li>

                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text" data-i18n="Components">Components</span></li>
                    <!-- Cards -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div class="text-truncate" data-i18n="Cards">Cards</div>
                            <span class="badge rounded-pill bg-primary ms-auto">6</span>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="cards-basic.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Basic">Basic</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-advance.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Advance">Advance</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-statistics.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Statistics">Statistics</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-analytics.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-gamifications.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Gamifications">Gamifications</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="cards-actions.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Actions">Actions</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- User interface -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div class="text-truncate" data-i18n="User interface">User interface</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="ui-accordion.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Accordion">Accordion</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-alerts.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Alerts">Alerts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-badges.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Badges">Badges</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-buttons.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Buttons">Buttons</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-carousel.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Carousel">Carousel</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-collapse.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Collapse">Collapse</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-dropdowns.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dropdowns">Dropdowns</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-footer.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Footer">Footer</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-list-groups.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="List Groups">List groups</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-modals.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Modals">Modals</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-navbar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Navbar">Navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-offcanvas.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Offcanvas">Offcanvas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Pagination & Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-progress.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Progress">Progress</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-spinners.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Spinners">Spinners</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-tabs-pills.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Tabs & Pills">Tabs &amp; Pills</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-toasts.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Toasts">Toasts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-tooltips-popovers.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Tooltips & Popovers">Tooltips &amp; Popovers</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-typography.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Typography">Typography</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Extended components -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div class="text-truncate" data-i18n="Extended UI">Extended UI</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="extended-ui-avatar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Avatar">Avatar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-blockui.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="BlockUI">BlockUI</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-drag-and-drop.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Drag & Drop">Drag &amp; Drop</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-media-player.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Media Player">Media Player</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Perfect Scrollbar">Perfect Scrollbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-star-ratings.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Star Ratings">Star Ratings</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-sweetalert2.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="SweetAlert2">SweetAlert2</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-text-divider.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Text Divider">Text Divider</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div class="text-truncate" data-i18n="Timeline">Timeline</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="extended-ui-timeline-basic.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Basic">Basic</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="extended-ui-timeline-fullscreen.html" class="menu-link">
                                            <div class="text-truncate" data-i18n="Fullscreen">Fullscreen</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-tour.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Tour">Tour</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-treeview.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Treeview">Treeview</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-misc.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Miscellaneous">Miscellaneous</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Icons -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div class="text-truncate" data-i18n="Icons">Icons</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="icons-boxicons.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Boxicons">Boxicons</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="icons-font-awesome.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Fontawesome">Fontawesome</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text" data-i18n="Forms & Tables">Forms &amp; Tables</span></li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div class="text-truncate" data-i18n="Form Elements">Form Elements</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="forms-basic-inputs.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Basic Inputs">Basic Inputs</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-input-groups.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Input groups">Input groups</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-custom-options.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Custom Options">Custom Options</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-editors.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Editors">Editors</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-file-upload.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="File Upload">File Upload</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-pickers.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Pickers">Pickers</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-selects.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Select & Tags">Select &amp; Tags</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-sliders.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Sliders">Sliders</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-switches.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Switches">Switches</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-extras.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Extras">Extras</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div class="text-truncate" data-i18n="Form Layouts">Form Layouts</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="form-layouts-vertical.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Vertical Form">Vertical Form</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="form-layouts-horizontal.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Horizontal Form">Horizontal Form</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="form-layouts-sticky.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Sticky Actions">Sticky Actions</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-carousel"></i>
                            <div class="text-truncate" data-i18n="Form Wizard">Form Wizard</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="form-wizard-numbered.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Numbered">Numbered</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="form-wizard-icons.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Icons">Icons</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="form-validation.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-check"></i>
                            <div class="text-truncate" data-i18n="Form Validation">Form Validation</div>
                        </a>
                    </li>
                    <!-- Tables -->
                    <li class="menu-item">
                        <a href="tables-basic.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div class="text-truncate" data-i18n="Tables">Tables</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Datatables">Datatables</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="tables-datatables-basic.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Basic">Basic</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-advanced.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Advanced">Advanced</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="tables-datatables-extensions.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Extensions">Extensions</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Charts & Maps -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text" data-i18n="Charts & Maps">Charts &amp; Maps</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chart"></i>
                            <div class="text-truncate" data-i18n="Charts">Charts</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="charts-apex.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="Apex Charts">Apex Charts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="charts-chartjs.html" class="menu-link">
                                    <div class="text-truncate" data-i18n="ChartJS">ChartJS</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="maps-leaflet.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-map-alt"></i>
                            <div class="text-truncate" data-i18n="Leaflet Maps">Leaflet Maps</div>
                        </a>
                    </li>

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text" data-i18n="Misc">Misc</span></li>
                    <li class="menu-item">
                        <a href="https://themeselection.com/support/" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-support"></i>
                            <div class="text-truncate" data-i18n="Support">Support</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div class="text-truncate" data-i18n="Documentation">Documentation</div>
                        </a>
                    </li>
                </ul>



            </aside>
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">





                <!-- Navbar -->




                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">











                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="bx bx-menu bx-md"></i>
                        </a>
                    </div>


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">




                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <i class="bx bx-search bx-md"></i>
                                    <span class="d-none d-md-inline-block text-muted fw-normal ms-4">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->





                        <ul class="navbar-nav flex-row align-items-center ms-auto">




                            <!-- Language -->
                            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class='bx bx-globe bx-md'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="en" data-text-direction="ltr">
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr" data-text-direction="ltr">
                                            <span>French</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="ar" data-text-direction="rtl">
                                            <span>Arabic</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="de" data-text-direction="ltr">
                                            <span>German</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /Language -->


                            <!-- Style Switcher -->
                            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class='bx bx-md'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span><i class='bx bx-sun bx-md me-3'></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span><i class="bx bx-moon bx-md me-3"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span><i class="bx bx-desktop bx-md me-3"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- / Style Switcher-->


                            <!-- Quick links  -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class='bx bx-grid-alt bx-md'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Shortcuts</h6>
                                            <a href="javascript:void(0)" class="dropdown-shortcuts-add py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="bx bx-plus-circle text-heading"></i></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-calendar bx-26px text-heading"></i>
                                                </span>
                                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                                <small>Appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-food-menu bx-26px text-heading"></i>
                                                </span>
                                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                                <small>Manage Accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-user bx-26px text-heading"></i>
                                                </span>
                                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                                <small>Manage Users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-check-shield bx-26px text-heading"></i>
                                                </span>
                                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                                <small>Permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-pie-chart-alt-2 bx-26px text-heading"></i>
                                                </span>
                                                <a href="index.html" class="stretched-link">Dashboard</a>
                                                <small>User Dashboard</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-cog bx-26px text-heading"></i>
                                                </span>
                                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                                <small>Account Settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-help-circle bx-26px text-heading"></i>
                                                </span>
                                                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                                <small>FAQs & Articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="bx bx-window-open bx-26px text-heading"></i>
                                                </span>
                                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                                <small>Useful Popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <span class="position-relative">
                                        <i class="bx bx-bell bx-md"></i>
                                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Notification</h6>
                                            <div class="d-flex align-items-center h6 mb-0">
                                                <span class="badge bg-label-primary me-2">8 New</span>
                                                <a href="javascript:void(0)" class="dropdown-notifications-all p-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx bx-envelope-open text-heading"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/1.png" alt="" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Congratulation Lettie 🎉</h6>
                                                        <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Charles Franklin</h6>
                                                        <small class="mb-1 d-block text-body">Accepted your connection</small>
                                                        <small class="text-muted">12hr ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/2.png" alt="" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">New Message ✉️</h6>
                                                        <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Whoo! You have new order 🛒 </h6>
                                                        <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                                        <small class="text-muted">1 day ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/9.png" alt="" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Application has been approved 🚀 </h6>
                                                        <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Monthly report is generated</h6>
                                                        <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                                                        <small class="text-muted">3 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/5.png" alt="" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">Send connection request</h6>
                                                        <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                                        <small class="text-muted">4 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/6.png" alt="" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">New message from Jane</h6>
                                                        <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-0">CPU is running high</h6>
                                                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="border-top">
                                        <div class="d-grid p-4">
                                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                                <small class="align-middle">View all notifications</small>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="bx bx-cog bx-md me-3"></i><span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card bx-md me-3"></i><span class="flex-grow-1 align-middle">Billing Plan</span>
                                                <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-pricing.html">
                                            <i class="bx bx-dollar bx-md me-3"></i><span>Pricing</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-faq.html">
                                            <i class="bx bx-help-circle bx-md me-3"></i><span>FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                                            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->


                        </ul>
                    </div>


                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
                        <i class="bx bx-x bx-md search-toggler cursor-pointer"></i>
                    </div>


                </nav>



                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')








                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                    <div class="text-body">
                                        © <script>
                                            document.write(new Date().getFullYear())
                                        </script>, made with ❤️ by <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
                                    </div>
                                    <div class="d-none d-lg-inline-block">

                                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>


                                        <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>

                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->


                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>



            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <!-- / Layout wrapper -->


        <div class="buy-now">
            <a href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
        </div>




        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('Cliente/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/libs/i18n/i18n.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
        <script src="{{ asset('Cliente/assets/vendor/js/menu.js') }}"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
         <script src="{{ asset('Cliente/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('Cliente/assets/vendor/js/main.js') }}"></script>


        <!-- Page JS -->
        <script src="{{ asset('Cliente/assets/js/dashboards-analytics.js') }}"></script>

</body>

</html>

<!-- beautify ignore:end -->
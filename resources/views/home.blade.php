<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">

    <title>DeedScan</title>

    <!-- vendor css -->
    <link href="../../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="../../assets/css/dashforge.css">
    <link rel="stylesheet" href="../../assets/css/dashforge.dashboard.css">


    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    @yield('styling')

    <style>
        table {
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
    </style>

</head>
<body>

<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="/home"
           style="color: #0168f8"
           class="aside-logo">DeedScan</a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">

        <div class="aside-loggedin bg-light p-2 shadow-sm" style="border-radius: 2px">
            <div class="d-flex align-items-center justify-content-start">
                <a href="/1/profile/view" class="avatar">
                    <img src="/profile/darth.jpg" class="rounded-circle" alt="">
                </a>
            </div>
            <div class="aside-loggedin-user">
                <a style="text-decoration: none" href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse" aria-expanded="false" aria-controls="loggedinMenu">
                    <h6 class="tx-semibold mg-b-0" style="color: #0168f8">{{Auth::user()->name}}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
            </div>
            <div class="collapse " id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item "><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
                    <li class="nav-item"><a href="/1/profile/view" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
                    <li class="nav-item">
                        <a  href="{{ route('logout') }}" class="nav-link"

                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i>

                            <span> {{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->

        <ul class="nav nav-aside">
            <li class="nav-item"><a href="/home" class="nav-link"><i data-feather="home" style="color: #0168f8"></i> <span>Home</span></a></li>
            <li class="nav-item"><a href="/profile/1/stats" class="nav-link"><i data-feather="bar-chart-2" style="color: #0168f8"></i> <span>Stats.</span></a></li>
            <li class="nav-item"><a href="/links" class="nav-link"><i data-feather="link" style="color: #0168f8"></i> <span>Quick Links</span></a></li>
            <li class="nav-item"><a href="/home" class="nav-link"><i data-feather="bell" style="color: #0168f8"></i> <span>Notifications</span></a></li>
            <li class="nav-item"><a href="/settings" class="nav-link"><i data-feather="settings" style="color: #0168f8"></i> <span>Settings</span></a></li>
            <li class="nav-item"><a href="/mail" class="nav-link"><i data-feather="mail" style="color: #0168f8"></i> <span>Messages</span></a></li>
            <li class="nav-item"><a href="/help" class="nav-link"><i data-feather="help-circle" style="color: #0168f8"></i> <span>Help Center</span></a></li>
            <li class="nav-item" title="Exit App"><a href="/help" class="nav-link"
                                                     onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
                ><i data-feather="log-out" style="color: #0168f8"></i> <span>Log Out</span></a></li>
        </ul>
    </div>
</aside>

<div class="content ht-100v pd-0">

    <div class="bg-img">
        <div class="water-mark">
            <div class="content-body">
                <div class="container pd-x-0">
                    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                        <div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                                    <li class="breadcrumb-item mt-2"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active mt-2" aria-current="page">Home</li>
                                    <li class="mt-1 ml-4">
                                        <a href="#" title="Refresh">
                                            <i data-feather="refresh-ccw" class="text-secondary" style="float: right; width: 18px"></i>
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>

                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- row -->
                </div><!-- container -->
            </div>
        </div>
    </div>
</div>

<script src="../../lib/jquery/jquery.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../lib/feather-icons/feather.min.js"></script>
<script src="../../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="../../lib/chart.js/Chart.bundle.min.js"></script>
<script src="../../lib/jqvmap/jquery.vmap.min.js"></script>
<script src="../../lib/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="../../assets/js/dashforge.js"></script>
<script src="../../assets/js/dashforge.aside.js"></script>
<script src="../../assets/js/dashforge.sampledata.js"></script>

<!-- append theme customizer -->
<script src="../../lib/js-cookie/js.cookie.js"></script>
<script src="../../assets/js/dashforge.settings.js"></script>

<script>
    $(function(){
        'use strict'

        var plot = $.plot('#flotChart', [{
            data: df3,
            color: '#69b2f8'
        },{
            data: df1,
            color: '#d1e6fa'
        },{
            data: df2,
            color: '#d1e6fa',
            lines: {
                fill: false,
                lineWidth: 1.5
            }
        }], {
            series: {
                stack: 0,
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: 1
                }
            },
            grid: {
                borderWidth: 0,
                aboveData: true
            },
            yaxis: {
                show: false,
                min: 0,
                max: 350
            },
            xaxis: {
                show: true,
                ticks: [[0,''],[8,'Jan'],[20,'Feb'],[32,'Mar'],[44,'Apr'],[56,'May'],[68,'Jun'],[80,'Jul'],[92,'Aug'],[104,'Sep'],[116,'Oct'],[128,'Nov'],[140,'Dec']],
                color: 'rgba(255,255,255,.2)'
            }
        });


        $.plot('#flotChart2', [{
            data: [[0,55],[1,38],[2,20],[3,70],[4,50],[5,15],[6,30],[7,50],[8,40],[9,55],[10,60],[11,40],[12,32],[13,17],[14,28],[15,36],[16,53],[17,66],[18,58],[19,46]],
            color: '#69b2f8'
        },{
            data: [[0,80],[1,80],[2,80],[3,80],[4,80],[5,80],[6,80],[7,80],[8,80],[9,80],[10,80],[11,80],[12,80],[13,80],[14,80],[15,80],[16,80],[17,80],[18,80],[19,80]],
            color: '#f0f1f5'
        }], {
            series: {
                stack: 0,
                bars: {
                    show: true,
                    lineWidth: 0,
                    barWidth: .5,
                    fill: 1
                }
            },
            grid: {
                borderWidth: 0,
                borderColor: '#edeff6'
            },
            yaxis: {
                show: false,
                max: 80
            },
            xaxis: {
                ticks:[[0,'Jan'],[4,'Feb'],[8,'Mar'],[12,'Apr'],[16,'May'],[19,'Jun']],
                color: '#fff',
            }
        });

        $.plot('#flotChart3', [{
            data: df4,
            color: '#9db2c6'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0 }, { opacity: .5 } ] }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 60
            },
            xaxis: { show: false }
        });

        $.plot('#flotChart4', [{
            data: df5,
            color: '#9db2c6'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0 }, { opacity: .5 } ] }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 80
            },
            xaxis: { show: false }
        });

        $.plot('#flotChart5', [{
            data: df6,
            color: '#9db2c6'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0 }, { opacity: .5 } ] }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 80
            },
            xaxis: { show: false }
        });

        $.plot('#flotChart6', [{
            data: df4,
            color: '#9db2c6'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0 }, { opacity: .5 } ] }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 60
            },
            xaxis: { show: false }
        });

        $('#vmap').vectorMap({
            map: 'usa_en',
            showTooltip: true,
            backgroundColor: '#fff',
            color: '#d1e6fa',
            colors: {
                fl: '#69b2f8',
                ca: '#69b2f8',
                tx: '#69b2f8',
                wy: '#69b2f8',
                ny: '#69b2f8'
            },
            selectedColor: '#00cccc',
            enableZoom: false,
            borderWidth: 1,
            borderColor: '#fff',
            hoverOpacity: .85
        });


        var ctxLabel = ['6am', '10am', '1pm', '4pm', '7pm', '10pm'];
        var ctxData1 = [20, 60, 50, 45, 50, 60];
        var ctxData2 = [10, 40, 30, 40, 55, 25];

        // Bar chart
        var ctx1 = document.getElementById('chartBar1').getContext('2d');
        new Chart(ctx1, {
            type: 'horizontalBar',
            data: {
                labels: ctxLabel,
                datasets: [{
                    data: ctxData1,
                    backgroundColor: '#69b2f8'
                }, {
                    data: ctxData2,
                    backgroundColor: '#d1e6fa'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true,
                            fontSize: 10,
                            fontColor: '#182b49'
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: true,
                            color: '#eceef4'
                        },
                        barPercentage: 0.6,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 10,
                            fontColor: '#8392a5',
                            max: 80
                        }
                    }]
                }
            }
        });

    })
</script>
</body>
</html>

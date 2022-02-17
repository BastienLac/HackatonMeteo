<?php
//include session.php contient le panel de tout les utilisateurs
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page principale</title>
    <link href="../CSS/style.css" rel="stylesheet">
    <script type="text/javascript" src="../JQuery/Chart.js"></script>
    <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
    <script type="text/javascript" src="../JS/fonctions.js"></script>
    <script src="../Bootstrap/js/bootbox.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>

    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cruz.site44.com/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cruz.site44.com/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <!-- Morris -->
    <!-- <link href="https://cruz.site44.com/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"> -->

    <link href="https://cruz.site44.com/css/animate.css" rel="stylesheet">
    <link href="https://cruz.site44.com/css/style.css" rel="stylesheet">

    <script type="text/javascript">
    $
        (
            function() {
                DessinerGraphTemperatureHumidite();
                CompareTemperatureMatin();
                CompareTemperatureMidi();
                CompareTemperatureSoir();
                GetInfos();
                GetCamembert();
                GetInfosHum();
                GetInfosTemp();
                GetCamembertHum();
                GetTotalDonnees();
                GetTabTemperature();
            }
        );
    </script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="img-circle" src="https://cruz.site44.com/img/profile_small.jpg" />
                            <strong class="font-bold"><?php echo $_SESSION['login']; ?></strong>
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-ft-large"></i> <span class="nav-label">Graphs</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="https://cruz.site44.com/graph_flot.html">Flot Charts</a></li>
                            <li><a href="https://cruz.site44.com/graph_morris.html">Morris.js Charts</a></li>
                            <li><a href="https://cruz.site44.com/graph_rickshaw.html">Rickshaw Charts</a></li>
                            <li><a href="https://cruz.site44.com/graph_chartjs.html">Chart.js</a></li>
                            <li><a href="https://cruz.site44.com/graph_chartist.html">Chartist</a></li>
                            <li><a href="https://cruz.site44.com/c3.html">c3 charts</a></li>
                            <li><a href="https://cruz.site44.com/graph_peity.html">Peity Charts</a></li>
                            <li><a href="https://cruz.site44.com/graph_sparkline.html">Sparkline Charts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="https://cruz.site44.com/layouts.html"><i class="fa fa-diamond"></i> <span
                                class="nav-label">Temps direct</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenue,
                                <?php echo $_SESSION['login']; ?></span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="https://cruz.site44.com/mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="https://cruz.site44.com/profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="https://cruz.site44.com/grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="https://cruz.site44.com/notifications.html">
                                            <strong>Les alertes</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="deconnexion.php">
                                <i class="fa fa-sign-out"></i> Se deconnecter
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Annuel</span>
                                <h5>Données</h5>
                            </div>
                            <div class="ibox-content">
                                <div id="totalDonnees"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Annual</span>
                                <h5>Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>visits</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="no-margins">406,42</h1>
                                        <div class="font-bold text-navy">44% <i class="fa fa-level-up"></i> <small>Rapid
                                                pace</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="no-margins">206,12</h1>
                                        <div class="font-bold text-navy">22% <i class="fa fa-level-up"></i> <small>Slow
                                                pace</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Monthly income</h5>
                                <div class="ibox-tools">
                                    <span class="label label-primary">Updated 12.2015</span>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                                <div class="flot-chart m-t-lg" style="height: 55px;">
                                    <div class="flot-chart-content" id="flot-chart1"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content" style="box-shadow: 0 3px 5px -2px rgba(0, 0, 0, 0.3);">
                                <div>
                                    <h3 class="font-bold no-margins">
                                        Graphique température/humidité
                                    </h3>
                                    <small>Capteur DHT11</small>
                                    <button type="button" class="btn btn-primary" onclick="converHTMLFileToPDF()">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </button>
                                    <div id="container" class="m-2">
                                        <select style="margin-right:6%" class="pull-right text-right" id='lstPeriode'
                                            onChange='DessinerGraphTemperatureHumidite()'>
                                            <option value='0' selected>Jour</option>
                                            <option value='1'>Semaine</option>
                                            <option value='2'>Mois</option>
                                        </select>

                                        <div id="graphTemperatureHumidite"
                                            style="height: 100%; width: 90%;margin:0px auto">
                                            <canvas id="canvasGraphTemperatureHumidite" style="height: 200px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins" style="box-shadow: 0 3px 5px -2px rgba(0, 0, 0, 0.3);">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Ce mois-ci</span>
                                <h5 id="GraphHumLibelle">Humidité</h5>
                                <h5 id="GraphTempLibelle">Température</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="bg-light border border-primary" id="infosHum"></div>
                                    <div class="bg-light border border-primary" id="infosTemp"></div>
                                </div>
                                <div class="bg-light border border-primary" id="GraphHum">
                                    <div style="" id="canvasHum"><canvas id="canvasGraph2"></canvas></div>
                                </div>
                                <div class="bg-light border border-primary" id="GraphTemp">
                                    <div style="" id="canvasTemp"><canvas id="canvasGraph"></canvas></div>
                                </div>

                                <div style="display:flex;justify-content:space-between">
                                    Données:
                                    <?php $mois=array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'); $date=$mois[date('n')-1]; echo $date;echo date(" Y");?></small>
                                    <div>
                                        <a class="temperature">Temperature</a> |
                                        <a class="humidite">Humidite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1>Aujourd hui</h1>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Ce matin</span>
                                <h5>Humidité et Temperature</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-3" id="cardTemperatureMatin"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Cette après-midi</span>
                                <h5>Humidité et Temperature</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-3" id="cardTemperatureMidi"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Ce soir</span>
                                <h5>Humidité et Temperature</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-3" id="cardTemperatureSoir"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-light border border-primary" id="container">
                    <!-- <div class="bg-light border border-primary" id="infos"></div>
            <div class="bg-light border border-primary" id="GraphTemp" >
            <div id="canvasTemp">
                <canvas id="canvasGraph"></canvas>
            </div>
            <div></div></div>
            <div class="bg-light border border-primary" id="infosHum"></div>
            <div class="bg-light border border-primary" id="GraphHum"><div id="canvasHum"><canvas id="canvasGraph2"></canvas></div></div> -->
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3 " id="cardTemperatureMatin"></div>
                    <div class="col-3" id="cardTemperatureMidi"></div>
                    <div class="col-3" id="cardTemperatureSoir"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Relevés de données</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-9 m-b-xs">
                                        <!-- <div data-toggle="buttons" class="btn-group">
                                    <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Jour </label>
                                    <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Semaine </label>
                                    <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Mois </label>
                                </div> -->
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableTemperature">
                                        <thead>
                                            <tr>
                                                <th>Humidité</th>
                                                <th>Temperature</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabTemperature">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <strong>Copyright</strong> Météolia &copy; 2022
                </div>
            </div>

        </div>
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                            Notes
                        </a></li>
                    <li><a data-toggle="tab" href="#tab-2">
                            Projects
                        </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-gear"></i>
                        </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                            <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        There are many variations of passages of Lorem Ipsum available.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        The point of using Lorem Ipsum is that it has a more-or-less normal.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Mevolved over the years, sometimes by accident, sometimes on purpose (injected
                                        humour and the like).
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        All the Lorem Ipsum generators on the Internet tend to repeat.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                        comes from a line in section 1.10.32.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar"
                                            src="https://cruz.site44.com/img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        Uncover many web sites still in their infancy. Various versions have.
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>

                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>

                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>

                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> Settings</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <div class="setings-item">
                            <span>
                                Show notifications
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Disable Chat
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox"
                                        id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Enable history
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Show charts
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Offline users
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example5">
                                    <label class="onoffswitch-label" for="example5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Global search
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example6">
                                    <label class="onoffswitch-label" for="example6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                Update everyday
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox"
                                        id="example7">
                                    <label class="onoffswitch-label" for="example7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>Settings</h4>
                            <div class="small">
                                I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                                And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s.
                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the
                                like).
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script>
        $('#infosHum').hide();
        $('#GraphHum').hide();
        $('#GraphHumLibelle').hide();
        $('.humidite').click(function() {
            $('#infosTemp').hide();
            $('#GraphTemp').hide();
            $('#GraphTempLibelle').hide();
            $('#infosHum').show();
            $('#GraphHum').show();
            $('#GraphHumLibelle').show();
        });

        $('.temperature').click(function() {
            $('#infosTemp').show();
            $('#GraphTemp').show();
            $('#GraphTempLibelle').show();
            $('#infosHum').hide();
            $('#GraphHum').hide();
            $('#GraphHumLibelle').hide();
        });
        </script>


        <!-- Mainly scripts -->
        <script src="https://cruz.site44.com/js/jquery-3.1.1.min.js"></script>
        <script src="https://cruz.site44.com/js/bootstrap.min.js"></script>
        <script src="https://cruz.site44.com/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="https://cruz.site44.com/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


        <!-- Custom and plugin javascript -->
        <script src="https://cruz.site44.com/js/inspinia.js"></script>
        <script src="https://cruz.site44.com/js/plugins/pace/pace.min.js"></script>

        <!-- jQuery UI -->
        <script src="https://cruz.site44.com/js/plugins/jquery-ui/jquery-ui.min.js"></script>

        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    </div>
</body>

</html>
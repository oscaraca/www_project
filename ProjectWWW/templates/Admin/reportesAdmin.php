<?php include('../../serverPages/seguridad.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Restaurant Application</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../../css/skel-noscript.css" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/style-desktop.css" />
    </head>
    <body class="homepage">
        <!-- Header Wrapper -->
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <!-- Header -->
                        <header id="header">
                            <div class="inner">
                                <!-- Logo -->
                                <h1><a href="#" id="logo">Restaurant Application</a></h1>
                                <!-- Nav -->
                                <nav id="nav">
                                    <ul>
                                        <li><a href="admin.php">Home</a></li>                                                             
                                        <li><a href="../../serverPages/cerrarSesion.php">Cerrar Sesión</a></li>  
                                    </ul>
                                </nav>
                            </div>
                        </header>
                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>REPORTES</strong> 
                        </div>
                        <section class="container box-feature1">
                            <div class="row">
                                <div class="4u">
                                    <section>
                                       <!-- <span class="image image-full"><a href=""><img src="../../images/rest.png" HEIGHT=235 WIDTH=300 alt=""></a></span>-->
                                        <header class="second fa fa-bar-chart-o">
                                            <h3>Plato mas Vendido</h3>
                                            <span class="byline">Reporte de los platos mas vendidos</span>
                                        </header>
                                    </section>
                                </div>
                                <div class="4u">
                                    <section>
                                        <!--<span class="image image-full"><a href=""><img src="../../images/barchart.jpg"   HEIGHT=235 alt=""></a></span>-->
                                        <header class="second fa fa-bar-chart-o">
                                            <h3>Ventas</h3>
                                            <span class="byline">Variabilidad de Ventas</span>
                                        </header>
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
         <script type="text/javascript">

            $(document).ready(function() {
                // Can specify a custom tick Array.
                // Ticks should match up one for each y value (category) in the series.
                var ticks = ['Below', 'Sucessfull', 'Above'];
                var plot1 = $.jqplot('chart_div_bar', [<?php consulta() ?>], {
                    // The "seriesDefaults" option is an options object that will
                    // be applied to all series in the chart.
                    seriesDefaults: {
                        renderer: $.jqplot.BarRenderer,
                        rendererOptions: {fillToZero: true}
                    },
                    // Custom labels for the series are specified with the "label"
                    // option on the series option.  Here a series option object
                    // is specified for each series.                    
                    series: [
                        {label: 'Class Clasification'}
                    ],
                    // Show the legend and put it outside the grid, but inside the
                    // plot container, shrinking the grid to accomodate the legend.
                    // A value of "outside" would not shrink the grid and allow
                    // the legend to overflow the container.
                    legend: {
                        show: true,
                        placement: 'outsideGrid'
                    },
                    axes: {
                        // Use a category axis on the x axis and use our custom ticks.
                        xaxis: {
                            renderer: $.jqplot.CategoryAxisRenderer,
                            ticks: ticks
                        },
                        // Pad the y axis just a little so bars can get close to, but
                        // not touch, the grid boundaries.  1.2 is the default padding.
                        yaxis: {
                            pad: 1.05,
                            tickOptions: {formatString: '$%d'}
                        }
                    }
                });
            });

            $(document).ready(function() {
                var plot1 = jQuery.jqplot('chart_div_pie', [<?php consulta2() ?>],
                        {
                            seriesDefaults: {
                                // Make this a pie chart.
                                renderer: jQuery.jqplot.PieRenderer,
                                rendererOptions: {
                                    // Put data labels on the pie slices.
                                    // By default, labels show the percentage of the slice.
                                    showDataLabels: true,
                                    sliceMargin: 4,
                                    // stroke the slices with a little thicker line.
                                    lineWidth: 5
                                }
                            },
                            legend: {show: true, location: 'e'}
                        }
                );
            });
        </script>
        <!-- Main Wrapper -->
        <div id="main-wrapper">
            <div class="main-wrapper-style1">
                <div class="inner">
                    <div data-role="page" id="AnalyticsDivBar">
                        <div data-role="header" data-theme="a">                
                            <h1>Reporte 1</h1>
                        </div>
                        <div data-role="content" data-inset="true">                
                            <center><div id="chart_div_bar"></div></center>
                        </div>        
                    </div>
                    <!-- Feature 1 -->

                </div>
            </div>
        </div>
    </body>
</html>
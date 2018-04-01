<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FMS::Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url()?>public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">FMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>Welcome, <?=$this->session->userdata('name')?>&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Profile</a>
                    </li>
                    <li><a href="<?=base_url()?>/index.php/Auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    </ul>
                 </li>
            </ul>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Admin Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin</small>
                        </h1>
                      
                    </div>
                </div>

               <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h2>Hello <?=$this->session->userdata('name')?></h2>
                        <h5>Please Select the Branch to see the performance</h5>
                        <select id="hotel" class="form-control">
                            <option value="Cocoon">Please Select</option>
                            <option value="Cocoon">Cocoon</option>
                            <option value="Marriot">Marriot</option>
                        </select>
                        <br/><br/>
                    </div>
                    <div class="col-md-4"></div>
                    
                </div>

                <div class="row">
                    <div id='graph-images' style='display:none'></div>
                </div>
                <!--Jumbotron-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h2>Net Promoter Score </h2>
                             <div id="NPSChart" style="display: block;margin: 0 auto;text-align:center !important;"></div>
                             </div>
                        </div>
                    </div>
                </div>


                <!--New ROW-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <a href='#' id="high">Good Performance Category wise </a></h3>
                            </div>
                            <div class="panel-body">
                                <div id="piechartGd"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <a href="#" id="low">Low Performance Category wise </h3>
                            </div>
                            <div class="panel-body">
                                <div id="piechartBd"></div>
                            </div>
                        </div>
                    </div>                      
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Overall Rating Trend</h3>
                        </div>
                        <div class='panel-body'>
                            <div id="categoryRating">
                            
                            </div>

                        </div>
                    </div>

                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="barchart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
	<DIV class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="barchart1"></div>
                            </div>
                        </div>
                    </div>
                </DIV>
                <!--/.row-->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!--script src="<?=base_url()?>public/js/morris/raphael.min.js"></script>
    <script src="<?=base_url()?>public/js/morris/morris.min.js"></script>
    <script src="<?=base_url()?>public/js/morris/morris-data.js"></script-->
    <script type="text/javascript" src="<?=base_url()?>public/js/jspdf.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart","gauge","bar"]});
        google.setOnLoadCallback(initialize);
        
        var hotel = '';
        function initialize(){
            $('#hotel').change(function(){
                hotel = $('#hotel option:selected').val();
                console.log(hotel);
                drawChart();
            });

            $('#high').click(function(){
                var jsonGdData = $.ajax({
                                    url: "<?=base_url()?>index.php/reports/repController/testajaxGetCategoryGd/"+hotel,
                                    dataType:"json",
                                    async: false
                                    }).responseText;
                var data1 = new google.visualization.DataTable(jsonGdData);
                var options1 = {
                  width: 460,
                  height: 280,
                  title: 'Category wise Good for Hotel '+hotel.toUpperCase(),
                   //colors: ['#286B7B', '#FED200', '#B02C20', '#5DA5DA', '#4D4D4D', '#B276B2','#60BD68'], 
                   // colors: ['#FF9999', '#FF9966', '#FFFF99', '#99FF99', '#66FFCC', '#FF9966'], 
                  pieHole: 0.3
                };
              var chart1 = new google.visualization.PieChart(document.getElementById('piechartGd'));
                  google.visualization.events.addListener(chart1, 'select', function () {
                    var cat = 'good';
                    var selection = chart1.getSelection();
                    var category = data1.getValue(selection[0].row,0);
                      
                      console.log("In Click Event Handler");
                      console.log("Selection is"+JSON.stringify(selection));
                      console.log(selection[0].row);
                      console.log(data1.getRowProperties(selection[0].row));
                      console.log(data1.getValue(selection[0].row,0));

                      var updata = $.ajax({
                                            url:"<?=base_url()?>/index.php/reports/repController/getSubCatDrillDown/"+cat+"/"+category+"/"+hotel,
                                            dataType: "json",
                                            async : false
                                        }).responseText;
                      var moddata = new google.visualization.DataTable(updata);
                      var upopt = {
                                title:'SubCategory Drill Down For '+category,
                                  // is3D: true,
                                   width: 400,
                                   height: 240
                                };

                    chart1.draw(moddata,upopt);

                });


              chart1.draw(data1, options1);

            });

            $('#low').click(function(){
                var jsonBdData = $.ajax({
                                    url: "<?=base_url()?>index.php/reports/repController/testajaxGetCategoryBd/"+hotel,
                                    dataType:"json",
                                    async: false
                                    }).responseText;
                                    
                var data2 = new google.visualization.DataTable(jsonBdData); 
                var options2 = {
                  width: 400,
                  height: 240,
                  title: 'Category wise Bad for Hotel '+hotel.toUpperCase(),
                  //colors: ['#286B7B', '#FED200', '#B02C20', '#5DA5DA', '#4D4D4D', '#B276B2','#60BD68'], 
                  pieHole: 0.3
                };
                var chart2 = new google.visualization.PieChart(document.getElementById('piechartBd'));
           
                google.visualization.events.addListener(chart2, 'select', function () {
                    var cat = 'bad';
                    var selection = chart2.getSelection();
                    var category = data2.getValue(selection[0].row,0);
                      
                      console.log("In Click Event Handler");
                      console.log("Selection is"+JSON.stringify(selection));
                      console.log(selection[0].row);
                      console.log(data2.getRowProperties(selection[0].row));
                      console.log(data2.getValue(selection[0].row,0));

                      drawupGdChart(chart2,cat,category,hotel);
            
                });
            chart2.draw(data2, options2);
            });
        }

        function drawupdGdChart(chart,cat,category,hotel){
                      var updata = $.ajax({
                                            url:"<?=base_url()?>/index.php/reports/repController/getSubCatDrillDown/"+cat+"/"+category+"/"+hotel,
                                            dataType: "json",
                                            async : false
                                        }).responseText;
                      var moddata = new google.visualization.DataTable(updata);
                      var upopt = {
                                title:'SubCategory Drill Down for '+category,
                                  // is3D: true,
                                   width: 400,
                                   height: 240
                                };


                chart.draw(moddata, upopt);
        }

        function drawChart() {
            var jsonGdData = $.ajax({
                                    url: "<?=base_url()?>index.php/reports/repController/testajaxGetCategoryGd/"+hotel,
                                    dataType:"json",
                                    async: false
                                    }).responseText;
            var jsonBdData = $.ajax({
                                    url: "<?=base_url()?>index.php/reports/repController/testajaxGetCategoryBd/"+hotel,
                                    dataType:"json",
                                    async: false
                                    }).responseText;
            var jsonNPS = $.ajax({
                                    url : "<?=base_url()?>index.php/reports/repController/getNps/"+hotel,
                                    dataType:"json",
                                    async: false
                                }).responseText;
            var jsonrating = $.ajax({
                                        url:"<?=base_url()?>/index.php/reports/repController/getRatingsCount/"+hotel,
                                        dataType: "json",
                                        async : false
                                    }).responseText;

            var daycount = $.ajax({
                                        url:"<?=base_url()?>/index.php/reports/repController/ajaxgetcountbyday/"+hotel,
                                        dataType: "json",
                                        async : false
                                }).responseText;
	var catcount = $.ajax({
                                        url:"<?=base_url()?>/index.php/reports/repController/ajaxdaywiseCategory/"+hotel,
                                        dataType: "json",
                                        async : false
                                }).responseText;

            console.log("Json rating is "+jsonrating);

            console.log("Json rating is "+jsonrating);

            // Create our data table out of JSON data loaded from server.
            //console.log(jsonData);
            var data1 = new google.visualization.DataTable(jsonGdData);
            var data2 = new google.visualization.DataTable(jsonBdData);  
            //var data3 = google.visualization.arrayToDataTable([ ['Label', 'Value'],
            //                                                  ['NPS', jsonNPS]
            //                                                 ]);
            var data3 =  new google.visualization.DataTable(jsonNPS);  
            console.log(jsonGdData);
            console.log(jsonBdData);
            
            var data4 = new google.visualization.DataTable(jsonrating); 
            console.log(data4); 

            var data5 = new google.visualization.DataTable(daycount); 
            console.log(data5);

	var data6 = new google.visualization.DataTable(catcount); 
            console.log(data6);

            var options1 = {
              width: 400,
              height: 240,
              title: 'Category wise Good for Hotel '+hotel.toUpperCase(),
               //colors: ['#286B7B', '#FED200', '#B02C20', '#5DA5DA', '#4D4D4D', '#B276B2','#60BD68'], 
               // colors: ['#FF9999', '#FF9966', '#FFFF99', '#99FF99', '#66FFCC', '#FF9966'], 
              pieHole: 0.3
            };

            var options2 = {
              width: 400,
              height: 240,
              title: 'Category wise Bad for Hotel '+hotel.toUpperCase(),
              //colors: ['#286B7B', '#FED200', '#B02C20', '#5DA5DA', '#4D4D4D', '#B276B2','#60BD68'], 
              pieHole: 0.3
            };

            var options3 = {
                              title: 'NPS Score for'+hotel.toUpperCase(),
                              width: 600, height: 320,
                              redFrom: -5, redTo: -2.5,
                              greenFrom:2.5, greenTo: 5,
                              yellowFrom:-2.5,yellowTo:2.5,
                              min: -5,
                              max:5,
                              minorTicks: 10
                            };

            var options4 = {
                            title:'Rating Range of customer',
                              // is3D: true,
                               width: 400,
                               height: 240
                            } ;

            var options5 = {
                           title:'Day wise Trend',
                           curveType: 'function',
                           legend: { position: 'bottom' },
                           vAxis :{viewWindow:{min : 0}}
                         };

	  var options6 ={
                            chart: {
                                        title: 'Category rating',
                                        subtitle: 'CategoryBad,CategoryGood',
                                    }
                                  //bars: 'horizontal' // Required for Material Bar Charts.
                            };
            //is3D: true,
            var chart1 = new google.visualization.PieChart(document.getElementById('piechartGd'));
            
            google.visualization.events.addListener(chart1, 'select', function () {
                var cat = 'good';
                var selection = chart1.getSelection();
                var category = data1.getValue(selection[0].row,0);
                  
                  console.log("In Click Event Handler");
                  console.log("Selection is"+JSON.stringify(selection));
                  console.log(selection[0].row);
                  console.log(data1.getRowProperties(selection[0].row));
                  console.log(data1.getValue(selection[0].row,0));

                  var updata = $.ajax({
                                        url:"<?=base_url()?>/index.php/reports/repController/getSubCatDrillDown/"+cat+"/"+category+"/"+hotel,
                                        dataType: "json",
                                        async : false
                                    }).responseText;
                  var moddata = new google.visualization.DataTable(updata);
                  var upopt = {
                            title:'SubCategory Drill Down For '+category,
                              // is3D: true,
                               width: 400,
                               height: 240
                            };

                chart1.draw(moddata,upopt);

            });


            chart1.draw(data1, options1);

            var chart2 = new google.visualization.PieChart(document.getElementById('piechartBd'));
            google.visualization.events.addListener(chart2, 'ready', function () {
              var content2 = '<img src="' + chart2.getImageURI() + '">';
              $('#graphImages').append(content2);
            });

            google.visualization.events.addListener(chart2, 'select', function () {
                var cat = 'bad';
                var selection = chart2.getSelection();
                var category = data2.getValue(selection[0].row,0);
                  
                  console.log("In Click Event Handler");
                  console.log("Selection is"+JSON.stringify(selection));
                  console.log(selection[0].row);
                  console.log(data2.getRowProperties(selection[0].row));
                  console.log(data2.getValue(selection[0].row,0));

                  var updata = $.ajax({
                                        url:"<?=base_url()?>/index.php/reports/repController/getSubCatDrillDown/"+cat+"/"+category+"/"+hotel,
                                        dataType: "json",
                                        async : false
                                    }).responseText;
                  var moddata = new google.visualization.DataTable(updata);
                  var upopt = {
                            title:'SubCategory Drill Down for '+category,
                              // is3D: true,
                               width: 400,
                               height: 240
                            };

                chart2.draw(moddata,upopt);

            });

            chart2.draw(data2, options2);

            var chart3 = new google.visualization.Gauge(document.getElementById('NPSChart'));
            
            chart3.draw(data3,options3);

            var chart4 = new google.visualization.PieChart(document.getElementById('categoryRating'));
            
            chart4.draw(data4,options4);

            var chart5 = new google.visualization.LineChart(document.getElementById('barchart'));

            chart5.draw(data5,options5);

	var chart6 = new google.charts.Bar(document.getElementById('barchart1'));

            chart6.draw(data6,options6);
                /*
            setInterval(function() {
                  data3.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                  chart3.draw(data3, options3);
                }, 13000);
            */
        }

 

    </script>
    
    

  
    
</body>

</html>
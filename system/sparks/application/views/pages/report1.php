<?php
//session_start();
$isloged=$this->session->userdata('is_logged_in');
if(!$isloged){
    redirect('Auth/login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FMS::User Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>public/css/sb-admin.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
.headert{
    background-color: #568D8A;
    color: #FDF3E7;
    
}

.cell{
    border: #ECECEA solid;
}

table {border-collapse: collapse;}
td    {padding: 6px;}

</style>
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


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?=base_url()?>/index.php/page/userhome"><i class="fa fa-fw fa-dashboard"></i> User Dashboard</a>
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
                            Dashboard <small>for <?php echo strtoupper($this->session->userdata('hotel')[0]);?></small>
                        </h1>
                      
                    </div>
                </div>

                <!-- New Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="dt1"></div>
                        <p align="center">
                           <button id="CSVDownload" class="btn btn-lg btn-primary" onclick="downloadCSV('download.csv')" title="Download to CSV">Download to CSV</Button>
                        </p>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- jQuery -->
    <script src="<?=base_url()?>public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        
        $('#CSVDownload').hide();
        google.load("visualization", "1", {packages:["table"]});
           google.load('visualization', '1', {packages: ['corechart']});
        google.setOnLoadCallback(drawTable);
        var hotel = '<?php echo $this->session->userdata('hotel')[0];?>';
        var CatAnalsyisData =  $.ajax({
                                    url: "<?=base_url()?>index.php/reports/repController/getOverallCatAnal/"+hotel,
                                    dataType:"json",
                                    async: false
                                    }).responseText;
            console.log(CatAnalsyisData);
        

        function drawTable() {
            window.data = new google.visualization.DataTable(CatAnalsyisData); 

            var cssClassNames = {
                        'headerRow':'headert',
                        'tableRow': '',
                        'oddTableRow': 'beige-background',
                        'selectedTableRow': 'orange-background large-font',
                        'hoverTableRow': '',
                        'headerCell': 'gold-border',
                        'tableCell': 'cell',
                        'rowNumberCell': 'underline-blue-font'
                        };   
            var options1 = {
                            'showRowNumber': true,
                            'allowHtml': true,
                            'page' : 'enable',
                            'pageSize' : 10,
                            cssClassNames: cssClassNames,
                            pagingSymbols: {prev: 'Prev', next: 'Next'}

            };


            var table = new google.visualization.Table(document.getElementById('dt1'));
            google.visualization.events.addListener(table, 'ready', function(){
                 $(".google-visualization-table-table").attr('class', 'table');
                 $("table").addClass( 'table-bordered table-condensed table-striped' );
                 $(".charts-inline-block charts-custom-button-inner-box").attr('class','pagination');
                 $('#CSVDownload').show();
                });
            table.draw(window.data, options1);

        }
      
    function downloadCSV(filename) {
        jsonDataTable = data.toJSON();
        var jsonObj = eval('(' + jsonDataTable + ')'); 
        output = JSONObjtoCSV(jsonObj,',');
    }

    function JSONObjtoCSV(jsonObj, filename){
    filename = filename || 'download.csv';
        var body = '';      var j = 0;
        var columnObj = []; var columnLabel = []; var columnType = [];
        var columnRole = [];    var outputLabel = []; var outputList = [];
        for(var i=0; i<jsonObj.cols.length; i++){
            columnObj = jsonObj.cols[i];
            columnLabel[i] = columnObj.label;
            columnType[i] = columnObj.type;
            columnRole[i] = columnObj.role;
            if (columnRole[i] == null) {
                outputLabel[j] = '"' + columnObj.label + '"';
                outputList[j] = i;
                j++;
            }           
        }
        body += outputLabel.join(",") + String.fromCharCode(13);

        for(var thisRow=0; thisRow<jsonObj.rows.length; thisRow++){
            outputData = [];
            for(var k=0; k<outputList.length; k++){
                var thisColumn = outputList[k];
                var thisType = columnType[thisColumn];
                thisValue = jsonObj.rows[thisRow].c[thisColumn].v;
                switch(thisType) {
                    case 'string':
                        outputData[k] = '"' + thisValue + '"'; break;
                    case 'datetime':
                        thisDateTime = eval("new " + thisValue);
                        outputData[k] = '"' + thisDateTime.getDate() + '-' + (thisDateTime.getMonth()+1) + '-' + thisDateTime.getFullYear() + ' ' + thisDateTime.getHours() + ':' + thisDateTime.getMinutes() + ':' + thisDateTime.getSeconds() + '"';  
                        delete window.thisDateTime;
                        break;
                    default:
                        outputData[k] = thisValue;
                }
            }
            body += outputData.join(",");
            body += String.fromCharCode(13);
        }       
        uriContent = "data:text/csv;filename=download.csv," + encodeURIComponent(body);
        newWindow=downloadWithName(uriContent, 'download.csv');
        return(body);
    }

    function downloadWithName(uri, name) {
     // http://stackoverflow.com/questions/283956/is-there-any-way-to-specify-a-suggested-filename-when-using-data-uri
    function eventFire(el, etype){
        if (el.fireEvent) {
            (el.fireEvent('on' + etype));
        } else {
            var evObj = document.createEvent('Events');
            evObj.initEvent(etype, true, false);
            el.dispatchEvent(evObj);
        }
    }
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    eventFire(link, "click");
    }   
        
        
    </script>

</body>
</html>
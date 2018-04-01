       google.load("visualization", "1", {packages:["corechart","gauge"]});
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
                width: 460,
                height: 280,
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

                    var updata = $.ajax({
                                          url:"<?=base_url()?>/index.php/reports/repController/getSubCatDrillDown/"+cat+"/"+category+"/"+hotel,
                                          dataType: "json",
                                          async : false
                                      }).responseText;
                    var moddata = new google.visualization.DataTable(updata);
                    var upopt = {
                              title:'SubCategory Drill Down',
                                // is3D: true,
                                 width: 460,
                                 height: 280
                              };

                  chart2.draw(moddata,upopt);

              });

              chart2.draw(data2, options2);
              });
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
                                        url:"<?=base_url()?>/index.php/reports/repController/getRatingsCount",
                                        dataType: "json",
                                        async : false
                                    }).responseText;
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

            var options1 = {
              width: 460,
              height: 280,
              title: 'Category wise Good for Hotel '+hotel.toUpperCase(),
               //colors: ['#286B7B', '#FED200', '#B02C20', '#5DA5DA', '#4D4D4D', '#B276B2','#60BD68'], 
               // colors: ['#FF9999', '#FF9966', '#FFFF99', '#99FF99', '#66FFCC', '#FF9966'], 
              pieHole: 0.3
            };

            var options2 = {
              width: 460,
              height: 280,
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
                               width: 460,
                               height: 280
                            } ;
            //is3D: true,
            var chart1 = new google.visualization.PieChart(document.getElementById('piechartGd'));
            google.visualization.events.addListener(chart1, 'ready', function () {
              var content1 = '<img src="' + chart1.getImageURI() + '">';
              $('#graphImages').append(content1);
            }); /* Adds a listener to make a image of chart inside a #graph-images*/
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
                            title:'SubCategory Drill Down',
                              // is3D: true,
                               width: 460,
                               height: 280
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
                            title:'SubCategory Drill Down',
                              // is3D: true,
                               width: 460,
                               height: 280
                            };

                chart2.draw(moddata,upopt);

            });

            chart2.draw(data2, options2);

            var chart3 = new google.visualization.Gauge(document.getElementById('NPSChart'));
            google.visualization.events.addListener(chart3, 'ready', function () {
              var content3 = '<img src="' + chart3.getImageURI() + '">';
              $('#graphImages').append(content3);
            });

            chart3.draw(data3,options3);

            var chart4 = new google.visualization.PieChart(document.getElementById('categoryRating'));
            google.visualization.events.addListener(chart4, 'ready', function () {
              var content4 = '<img src="' + chart4.getImageURI() + '">';
              $('#graphImages').append(content4);
            });
            chart4.draw(data4,options4);
                /*
            setInterval(function() {
                  data3.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                  chart3.draw(data3, options3);
                }, 13000);
            */
        }

    function drawCategoryGood(var data,var opt){

    }

    function drawCategoryBad(var data,var opt){
      
    }
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Template Title -->
    <title>FMS</title>

    <link rel="icon" href="<?=base_url()?>public/landing/images/favicon.ico" type="image/x-icon"/>

    <!-- Bootstrap 3.2.0 stylesheet -->
    <link href="<?=base_url()?>public/landing/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icon stylesheet -->
    <link href="<?=base_url()?>public/landing/css/font-awesome.min.css" rel="stylesheet">

    <!-- Owl Carousel stylesheet -->
    <link href="<?=base_url()?>public/landing/css/owl.carousel.css" rel="stylesheet">
    
    <!-- Pretty Photo stylesheet -->
    <link href="<?=base_url()?>public/landing/css/prettyPhoto.css" rel="stylesheet">

    <!-- Custom stylesheet -->
    <link href="<?=base_url()?>public/landing/css/style.css" rel="stylesheet">
    
    <link href="<?=base_url()?>public/landing/css/color/white.css" rel="stylesheet">


    <!-- Custom Responsive stylesheet -->
    <link href="<?=base_url()?>public/landing/css/responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- ====== Header Section ====== -->
    <header id="top">
      <div class="bg-color">
        <div class="top section-padding">
          <div class="container">
            <div class="row">

              <div class="col-sm-7 col-md-7">
                <div class="content">
                  <h1><strong>Feedback Management System</strong></h1>
                  <h2>Experience better way of managing feedbacks...!</h2>
                  <p>FMS system is developed considering every aspect of what feedback management should contain. With FMS managing the feedbacks is simple and easier</p>
                  <div class="button" id="download-app1">
                    <a href="#download" class="btn btn-default btn-lg custom-btn"><i class="fa fa-cloud-download"></i>Download App</a>
                  </div> <!-- end .button -->
                </div> <!-- end .content -->
              </div> <!-- end .top > .container> .row> .col-md-7 -->

              <div class="col-sm-5 col-md-5">
                <div class="photo-slide">
                 <div id="carousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1" class=""></li>
                    <li data-target="#carousel" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item">
                      <img src="<?=base_url()?>public/landing/images/phone.png" alt="">
                    </div>
                    <div class="item active left">
                      <img src="<?=base_url()?>public/landing/images/phone.png" alt="">
                    </div>
                    <div class="item next left">
                      <img src="<?=base_url()?>public/landing/images/phone.png" alt="">
                    </div>
                  </div> <!-- end .carousel-inner -->
                </div> <!-- end #carousel -->
                </div> <!-- end .photo-slide -->
              </div> <!-- end .top > .container> .row> .col-md-5 -->

            </div> <!-- end .top> .container> .row -->
          </div> <!-- end .top> .container -->
        </div> <!-- end .top -->
      </div> <!-- end .bg-color -->
    </header>
    <!-- ====== End Header Section ====== -->
    

    <!-- ====== Menu Section ====== -->
    <section id="menu">
      <div class="navigation">
        <div id="main-nav" class="navbar navbar-default" role="navigation">
          <div class="container">

            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">FMS</a>
            </div> <!-- end .navbar-header -->

            <div class="navbar-collapse collapse">
              <ul id="ulnav" class="nav navbar-nav navbar-right">
                <li class="active"><a href="#top">Home</a></li>
                <li><a href="#features">Features</a></li>
                <!--li><a href="#screenshots">Screenshots</a></li-->
                <li><a href="#description">Description</a></li>
                <!--li><a href="#testimonial">Reviews</a></li-->
                <li><a href="#team">Team</a></li>
                <!--li><a href="#price">Pricing</a></li-->
                <!--li><a href="#download">Download</a></li-->
                <li><a href="#contact">Contact</a></li>
              </ul>
	     <ul class="nav navbar-nav navbar-right">
                <li><a id="login" href="<?=base_url()?>/index.php/Auth/login">Login</a></li>
              </ul>
            </div><!-- end .navbar-collapse -->

          </div> <!-- end .container -->
        </div> <!-- end #main-nav -->
      </div> <!-- end .navigation -->
    </section>
    <!-- ====== End Menu Section ====== -->


    <!-- ====== Features Section ====== -->
    <section id="features">
      <div class="features section-padding">
        <div class="container">

          <div class="header">
            <h1>Amazing Features</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis nesciunt eos, ipsum id, architecto velit sequi fuga minima commodi, porro vitae officiis, voluptatibus minus voluptates ab. Dolore, dolor repellat quasi.</p>
            <div class="underline">
              <i class="fa fa-briefcase"></i>
            </div>
          </div> <!-- end .container> .header -->

          <div class="row">
            <div class="col-md-4">
              <div class="featured-item-img">
                <img src="<?=base_url()?>/public/landing/images/phone.png" alt="">
              </div>
            </div>
            <div class="col-md-8 feature-list">
              <div class="row">

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><span style="line-height: 1.0em; text-align: center; margin-top: -5px; margin-right: 0.4em;" class="fa-stack fa-lg pull-left"><i class="fa fa-flip-horizontal fa-comment-o fa-stack-2x"></i><i style="font-size: 10px; line-height: 2em;">sms</i> 
</span></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Feedback through SMS</h3>
                      <p>Instantly collect feedback through right away when customer checksout.There is high possibility of getting feedback immediately.
                      </p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (1st item) -->

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><i class="fa fa-desktop"></i></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Responsive Design</h3>
                      <p>Instantly collect feedback through right away when customer checksout.There is high possibility of getting feedback immediately.</p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (2nd item) -->

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><i class="fa fa-globe"></i></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Feedback through Web</h3>
                      <p>Collect Feedback through beautiful designed webforms.Design form anywhere and easily integrate thrugh our webapi</p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (3rd item) -->

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><i class="fa fa-search"></i></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Easily Customizable</h3>
                      <p>FMS can be easily integrated to exisiting hotel reservation system and it can be easily customizable as per needs.It can be integraed to any system through advanced REST api.</p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (4th item) -->

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><i class="fa fa-bar-chart-o"></i></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Trendy Graphs</h3>
                      <p>There's saying 'A picture is worth a thousand words' we follow same principle.Dashboard is visualized graphically so that data is easily interpretable </p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (5th item) -->

                <div class="col-sm-6 col-md-6">
                  <div class="featured-item">
                    <div class="icon">
                      <div class="icon-style"><i class="fa fa-mobile-phone"></i></div>
                    </div> <!-- end icon -->
                    <div class="meta-text">
                      <h3>Excellent Support</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, culpa.</p>
                    </div> <!-- end .meta-text -->
                  </div> <!-- end .featured-item -->
                </div> <!-- end .feature-list> .row > .col-md-6 (6th item) -->

              </div> <!-- end .feature-list> .row -->
            </div> <!-- end .feature-list -->
          </div> <!-- end .container> .row -->

        </div> <!-- end .container -->
      </div> <!-- end .features -->
    </section>
    <!-- ====== End Features Section ====== -->

    <!-- ====== Screenshots Section ====== -->
    <section id="description">
      <div class="screenshots section-padding dark-bg">
        <div class="container">

          <div class="header">
            <h1>How it Works</h1>
            <p>How does FMS improves your Restaurent Business</p>
            <div class="underline"><i class="fa fa-image"></i></div>
          </div>
          <div class="content"> 
            <center> 
                <img src="<?=base_url()?>/public/landing/images/fms_work_process.gif" class="img" alt="item photo">
            </center>
          </div>
          <!--div class="owl-carousel owl-theme">
            <div class="item">
              <a href="<?=base_url()?>/public/landing/images/app.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app.jpg" alt="item photo"></a>
            </div> 
            <div class="item">
              <a href="<?=base_url()?>/public/landing/images/app2.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app2.jpg" alt="item photo"></a>
            </div> 
            <div class="item">
              <a href="<?=base_url()?>/public/landing/images/app.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app.jpg" alt="item photo"></a>
            </div> 
            <div class="item">
              <a href="<?=base_url()?>/public/landing/images/app2.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app2.jpg" alt="item photo"></a>
            </div> 
            <div class="item">
              <a href="<?=base_url()?>public/landing/images/app.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app.jpg" alt="item photo"></a>
            </div>
            <div class="item">
              <a href="<?=base_url()?>public/landing/images/app2.jpg" data-rel="prettyPhoto"><img src="<?=base_url()?>/public/landing/images/app2.jpg" alt="item photo"></a>
            </div> 
          </div--> <!-- end owl carousel -->

       <!-- </div>  .container -->
      <!--</div> <!-- end .screenshots -->  
   <!-- </section>
    <!-- ====== End Screenshots Section ====== -->


    <!-- ====== Description Section ====== -->
 <!--   
    <section id="description">
      <div class="description">
        <div class="description-one section-padding">
          <div class="container">
            <div class="row">
              <div class="col-sm-5 col-md-6">
                <div class="app-image">
                  <img src="<?=base_url()?>/public/landing/images/duel-phone-big1.png" alt="">
                </div>
              </div>
              <div class="col-sm-7 col-md-6">
                <div class="content">
                  <h1>Lorem ipsum dolor sit</h1>
                  <h4>Lorem ipsum dolor sit amet</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi aspernatur sit, officiis sunt voluptate dolorum odit quam. Recusandae tempore excepturi pariatur provident corrupti est quisquam ratione, consectetur nam omnis eius. 
                  <br>
                  <br>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus aut non tempore, explicabo aliquam harum odio et libero.
                  </p>
                  <div class="button" id="download-app2">
                    <a href="#download" class="btn btn-default btn-lg custom-btn get-btn"><i class="fa fa-cloud-download"></i>Get App</a>
                  </div>
                </div>
              </div>
            </div> <!-- .container> .row -->
         <!-- </div>  .container -->
       <!--  </div> end .description-one -->

<!--
        <div class="description-two section-padding dark-bg">
          <div class="container">
            <div class="row">

              <div class="col-sm-7 col-md-6">
                <div class="content">
                  <h1>Lorem ipsum dolor sit amet consectetur.</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi aspernatur sit, officiis sunt voluptate dolorum odit quam. Recusandae tempore excepturi pariatur provident corrupti est quisquam ratione, consectetur nam omnis eius.</p>
                  <ul class="list-item">
                    <li><i class="fa fa-table"></i> Lorem ipsum dolor sit amet.</li>
                    <li><i class="fa fa-video-camera"></i> Lorem ipsum dolor sit amet dolorum odit quam.</li>
                    <li><i class="fa fa-volume-up"></i> Lorem ipsum dolorum odit quam</li>
                    <li><i class="fa fa-umbrella"></i> Lorem ipsum dolorum odit quam dolorum odit quam</li>
                    <li><i class="fa fa-thumbs-o-up"></i> Lorem ipsum dolorum odit quam</li>
                  </ul>
               <!-- </div>  end .content -->
             <!-- </div> .container> .row> .col-md-6 -->
             <!--
              <div class="col-sm-5 col-md-6">
                <div class="app-image">
                  <img class="img-responsive" src="<?=base_url()?>public/landing/images/duel-phone-big.png" alt="">
                <!-- </div>  end .app-image -->
              <!-- </div> <!-- .container> .row> .col-md-6 -->

           <!-- </div>  .container> .row -->
         <!-- </div> <!-- .container -->
        <!--</div> <!-- end .description-two -->

      <!--</div> <!-- end .description -->
    </section> -->
    <!-- ====== End Description Section ====== -->

    <!--
    <!--<!-- ====== Testimonial Section ====== -->
    <!--<section id="testimonial">
      <div class="bg-color bg-testimonial">
        <div class="testimonial section-padding">
          <div class="container">
            <div class="testimonial-slide">
              <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">

                  <div class="item">
                    <div class="image">
                      <img src="<?=base_url()?>public/landing/images/01.jpg" alt="">
                    </div> <!-- end .image -->
      <!--              <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero facilis aspernatur cumque, quisquam quod sint odit.</p>
                      <h4>Jon Doe</h4>
                      <h5>Web developer</h5>
                    </div> <!-- end .content -->
      <!--            </div> <!-- end .item (1) -->

      <!--            <div class="item active left">
                    <div class="image">
                      <img src="<?=base_url()?>public/landing/images/02.jpg" alt="">
                    </div> <!-- end .image -->
      <!--              <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero facilis aspernatur cumque, quisquam quod sint odit.</p>
                      <h4>Jon Doe</h4>
                      <h5>Web developer</h5>
      <!--              </div> <!-- end .content -->
      <!--            </div> <!-- end .item (2) -->

      <!--            <div class="item next left">
                    <div class="image">
                      <img src="<?=base_url()?>public/landing/images/03.jpg" alt="">
                    </div> <!-- end .image -->
      <!--              <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero facilis aspernatur cumque, quisquam quod sint odit.</p>
                      <h4>Jon Doe</h4>
                      <h5>Web developer</h5>
                    </div> <!-- end .content -->
      <!--            </div> <!-- end .item (3) -->

      <!--          </div> <!-- end .carousel-inner -->
      <!--        </div> <!-- end #carousel-testimonial -->
      <!--      </div> <!-- end .testimonial-slide -->
      <!--    </div> <!-- end .container -->
      <!--  </div> <!-- end .testimonial -->
      <!--</div> <!-- end .bg-testimonial -->
  <!--  </section>
    <!-- ====== End Testimonial Section ====== -->


    <!-- ====== Team Section ====== -->
    <section id="team">
      <div class="team section-padding">
        <div class="container">

          <div class="header">
            <h1>Who develop the App</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui hic laboriosam odio doloribus suscipit error nostrum totam dignissimos esse numquam voluptatum, aspernatur est.</p>
            <div class="underline"><i class="fa fa-users"></i></div>
          </div> <!-- end .container> .header -->
          <div class="row"> 
            <div class="app-dev">
              <div class="col-md-1 col-lg-1"></div>
              <div class="col-md-2 col-lg-2">
                <div class="membern">
                  <img src="<?=base_url()?>public/landing/images/team/manish.jpg" width="60px" heigth="60px" class="img-responsive img-circle" alt="">
                </div><br><br><br><br><br><br><br><br>
                <div class="details">
                    <b>Originator</b>
                  </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="membern">
                  <img src="<?=base_url()?>public/landing/images/team/sudip.jpg" width="60" heigth="60" class="img-responsive img-circle" alt="">
                </div><br><br><br><br><br><br><br><br>
                <div class="details">
                    <b>Business Analyst</b>
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="membern">
                  <img src="<?=base_url()?>public/landing/images/team/jinendra.jpg" width="60" heigth="60" class="img-responsive img-circle" alt="">
                </div><br><br><br><br><br><br><br><br>
                <div class="details">
                    <b>Open Market Analyst</b>
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="membern">
                  <img src="<?=base_url()?>public/landing/images/team/priya.jpg" width="60" heigth="60" class="img-responsive img-circle" alt="">
                </div><br><br><br><br><br><br><br><br>
                <div class="details">
                    <b>Open Market Analyst</b>
                  </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="membern">
                  <img src="<?=base_url()?>public/landing/images/team/rahul.jpg" width="60" heigth="60" class="img-responsive img-circle" alt="">
                </div><br><br><br><br><br><br><br>
                <div class="title">
                    <b>Full Stack Developer</b>
                </div>
              </div>
              <div class="col-md-1 col-lg-1"></div>
            </div>
          </div>
          <!--End of row-->
          <!--
          <div class="row">
            <div class="app-dev">

              <div class="col-sm-6 col-md-6 col-lg-3 info">
                <div class="member">
                  <img src="<?=base_url()?>public/landing/images/01.jpg" alt="">
                  <div class="details">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo veniam molestias saepe ipsa autem, odio.</p>
                    <div class="social icon">
                      <ul>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    <!-- </div> <!-- end .icon -->
                  <!-- </div> <!-- end .details -->
              <!--  </div> <!-- end .member -->
              <!--   <div class="title">
                  <h4>Margery Key</h4>
                  <h5>Lead Developer</h5>
             <!--    </div> <!-- end .title -->
           <!--    </div> <!-- end .info (1) -->

           <!--    <div class="col-sm-6 col-md-6 col-lg-3 info">
                <div class="member">
                  <img src="<?=base_url()?>public/landing/images/02.jpg" alt="">
                  <div class="details">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo veniam molestias saepe ipsa autem, odio.</p>
                    <div class="social icon">
                      <ul>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                 <!--    </div> <!-- end .icon -->
             <!--      </div> <!-- end .details -->
             <!--    </div> <!-- end .member -->
             <!--    <div class="title">
                  <h4>Shirley Bergeron</h4>
                  <h5>UI/UX Designer</h5>
            <!--     </div> <!-- end .title -->
           <!--    </div> <!-- end .info (2) -->

           <!--    <div class="col-sm-6 col-md-6 col-lg-3 info">
                <div class="member">
                  <img src="<?=base_url()?>public/landing/images/03.jpg" alt="">
                  <div class="details">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo veniam molestias saepe ipsa autem, odio.</p>
                    <div class="social icon">
                      <ul>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                      </ul>
               <!--      </div> <!-- end .icon -->
              <!--    </div> <!-- end .details -->
               <!--  </div> <!-- end .member -->
              <!--   <div class="title">
                  <h4>Ryan Elder</h4>
                  <h5>Front End Developer</h5>
                </div> <!-- end .title -->
           <!--    </div> <!-- end .info (3) -->

           <!--    <div class="col-sm-6 col-md-6 col-lg-3 info">
                <div class="member">
                  <img src="<?=base_url()?>public/landing/images/04.jpg" alt="">
                  <div class="details">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo veniam molestias saepe ipsa autem, odio.</p>
                    <div class="social icon">
                      <ul>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                      </ul>
             <!--        </div> <!-- end .icon -->
             <!--      </div> <!-- end .details -->
             <!--    </div> <!-- end .member -->
             <!--    <div class="title">
             <!--      <h4>Daisy Baker</h4>
                  <h5>Marketer</h5>
             <!--    </div> <!-- end .title -->
            <!--   </div> <!-- end .info (4) -->

          <!--   </div> <!-- end .app-dev -->
         <!--  </div> <!-- end .container> .row -->

        </div> <!-- end .container -->
      </div> <!-- end .team -->
    </section>
    <!-- ====== Team Section ====== -->

    <!-- ====== Contact Section ====== -->
    <footer id="contact">
      <div class="footer section-padding">
        <div class="container">
          <h1>Contact Us</h1>
          <form action="" class="form contact">

            <div class="row">
              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="name" class="sr-only">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name">
                </div> <!-- end .form-group -->

                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email">
                </div> <!-- end .form-group -->

                <div class="form-group">
                  <label for="subject" class="sr-only">Subject</label>
                  <input type="text" class="form-control" id="subject" placeholder="Subject">
                </div> <!-- end .form-group -->
              </div> <!-- end .form> .row> .col-md-4 -->
              
              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="message" class="sr-only">Message</label>
                  <textarea name="message" id="message" placeholder="Message"></textarea>
                </div> <!-- end .form-group -->
              </div>
            </div> <!-- end .form> .row -->

            <button class="btn btn-default contact-submit custom-btn" type="submit"><i class="fa fa-hand-o-right"></i>SUBMIT</button>
          </form> <!-- end .form -->   
        </div> <!-- end .container -->
      </div> <!-- end .footer -->
    </footer>
    <!-- ====== End Contact Section ====== -->


    <!-- ====== Copyright Section ====== -->
    <section class="copyright dark-bg">
      <div class="container">
        <p>&copy; 2014 <a href="#">FMS</a>, All Rights Reserved</p>
      </div> <!-- end .container -->
    </section>
    <!-- ====== End Copyright Section ====== -->


    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="<?=base_url()?>public/landing/js/jquery.js"></script>
    
    <!-- Modernizr js -->
    <script src="<?=base_url()?>public/landing/js/modernizr-latest.js"></script>

    <!-- Bootstrap 3.2.0 js -->
    <script src="<?=base_url()?>public/landing/js/bootstrap.min.js"></script>

    <!-- Owl Carousel plugin -->
    <script src="<?=base_url()?>public/landing/js/owl.carousel.min.js"></script>

    <!-- ScrollTo js -->
    <script src="<?=base_url()?>public/landing/js/jquery.scrollto.min.js"></script>

    <!-- LocalScroll js -->
    <script src="<?=base_url()?>public/landing/js/jquery.localScroll.min.js"></script>

    <!-- jQuery Parallax plugin -->
    <script src="<?=base_url()?>public/landing/js/jquery.parallax-1.1.3.js"></script>

    <!-- Skrollr js plugin -->
    <script src="<?=base_url()?>public/landing/js/skrollr.min.js"></script>

    <!-- jQuery One Page Nav Plugin -->
    <script src="<?=base_url()?>public/landing/js/jquery.nav.js"></script>
    
    <!-- jQuery Pretty Photo Plugin -->
    <script src="<?=base_url()?>public/landing/js/jquery.prettyPhoto.js"></script>


    <!-- Custom JS -->
    <script src="<?=base_url()?>public/landing/js/main.js"></script>

    <script>
      jQuery(document).ready(function($) {
        "use strict";

        jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({social_tools:false});
      });
    </script>
  </body>
</html>

<?PHP 
include '../class/NewsDB.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News 24 - Free News Website Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="social">
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header End -->


        <!-- Header Start -->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="../login-form-v3/Login_v3/index.php" class="nav-item nav-link active">Login</a>
                            <a href="#" class="nav-item nav-link">Sports</a>
                            <a href="#" class="nav-item nav-link">Tech</a>
                            <a href="#" class="nav-item nav-link">Fashion</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Sub Item 1</a>
                                    <a href="#" class="dropdown-item">Sub Item 2</a>
                                </div>
                            </div>
                            <a href="single-page.html" class="nav-item nav-link">Single Page</a>
                            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Top News Start-->
        <div class="top-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="tn-img">
                            <?php
                             
                             $row = NewsDB::GetnewsDB()->GetlastData(5);
                             
                                  
                              
                            ?>
                            <img src="<?php
                            if(count($row)>0)
                              echo "../class/testimg/".$row[0]['img']; 
                              else echo "../news-website-templates/img/cat-news-1.jpg"
                              ?>"
                              
                              />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    <a class="tn-title" href=""><?php
                                     if (count($row)>0)
                                     echo $row[0]['title'];
                                     ?>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 tn-right">
                        <div class="row">
                               <?php
                                $fourimg = NewsDB::GetnewsDB()->GetlastData(5);
                                unset($fourimg[0]);
                                foreach ($fourimg as $key => $item) {
                                   
                                
                                
                                
                                ?>
                            <div class="col-md-6">
                              
                                <div class="tn-img">
                                    <img src="../class/testimg/<?php  echo $item['img'] ;?>" />
                                    <div class="tn-content">
                                        <div class="tn-content-inner">
                                            <a class="tn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            <a class="tn-title" href=""><?php echo $item['title']?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php }?>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- Top News End-->


        <!-- Category News Start-->
      
        <div class="cat-news">
      
            <div class="container-fluid">
            
                <div class="row">
                
              
                            <?php 
                     $category = NewsDB::GetnewsDB()->GetCategoryData();
                  
                     foreach ($category as $item) {
                        
                     
                     ?>
                    <div class="col-md-6">
                    <h2><i class="fas fa-align-justify"></i><?php echo $item['name'];?></h2>
                        <div class="row cn-slider">
                        <?php 
                            $categorynews = NewsDB::GetnewsDB()->GetCategorynews($item['name']);
                            $categnames = $item['name'];
                            foreach ($categorynews as $news) {
                                
                            
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="../class/testimg/<?php  echo $news['img'] ;?>" />
                                    <div class="cn-content">
                                        <div class="cn-content-inner">
                                            <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            <a class="cn-title" href=""><?php echo $news['title'] ; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            
                            
                           
                        </div>
                        
                    </div>
                   
                    <?php }?>
                    
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- Category News End-->


        <!-- Category News Start-->
      
        <!-- Category News End-->


        <!-- Main News Start-->
        <div class="main-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><i class="fas fa-align-justify"></i>Latest News</h2>
                                <?php
                                  $footernews =  NewsDB::GetnewsDB()->Getfirstata(12); 
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mn-img">
                                            <img src="<?php
                            if(count($footernews)>0 )
                              echo "../class/testimg/".$footernews[0]['img']; 
                              else echo "../news-website-templates/img/cat-news-1.jpg";
                              ?>" />
                                        </div>
                                        <div class="mn-content">
                                            <a class="mn-title" href="">
                                                <?php 
                                                if (count($footernews)>0)
                                                echo $footernews[0]['title']; ?></a>
                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra inceptos...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php
                                        unset($footernews[0]);
                                        foreach ($footernews as $key => $latestnews) {
                                            
                                        
                                        
                                        ?>
                                        
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src="<?php echo "../class/testimg/".$latestnews['img'];?>" />
                                            </div>
                                            <div class="mn-content">
                                                <a class="mn-title" href=""><?php echo $latestnews['title']; ?></a>
                                                <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            </div>
                                        </div>
                                       <?php }?>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <h2><i class="fas fa-align-justify"></i>Popular News</h2>
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="mn-img">
                                        <img src="<?php
                                        
                            if(count($footernews)>4 )
                              echo "../class/testimg/".$footernews[4]['img']; 
                              else echo "../news-website-templates/img/cat-news-1.jpg";
                              ?>" />
                                        </div>
                                        <div class="mn-content">
                                            <a class="mn-title" href="">
                                                <?php 
                                                if (count($footernews)>4)
                                                   echo $footernews[4]['title']; 
                                                ?>
                                            </a>
                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra inceptos...
                                            </p>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6">
                                    <?php 
                                    if (count($footernews)>4)
                                    unset($footernews[4]);
                                    foreach ($footernews as $key => $popluernews) {
                                       if($key<4)continue;
                                    
                                    ?>
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src=" <?php echo "../class/testimg/".$popluernews['img']; ?>" />
                                            </div>
                                            <div class="mn-content">
                                                <a class="mn-title" href="">
                                                    <?php
                                                     echo $popluernews['title'];  ?></a>
                                                <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                            </div>
                                        </div>
                                      
                                      <?php } ?>
                                       
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Category</h2>
                                <div class="category">
                                    <ul class="fa-ul">
                                        <?php
                                        
                                        $category = NewsDB::GetnewsDB()->GetCategoryData();
                                        foreach ($category as $item) {
                                            echo "<li><span class='fa-li'><i class='far fa-arrow-alt-circle-right'></i></span><a href=''>" . $item['name'] . "</a></li>";
                                        }
                                        ?>
                                        <!--
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">National</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">International</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Economics</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Politics</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Lifestyle</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Technology</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Trades</a></li>
                                    -->.
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Tags</h2>
                                <div class="tags">
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 1 column</h2>
                                <div class="image">
                                    <a href=""><img src="img/adds-1.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 2 column</h2>
                                <div class="image">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href=""><img src="img/adds-2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href=""><img src="img/adds-2.jpg" alt="Image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->


        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aliquam</a></li>
                                <li><a href="#">Fusce placerat</a></li>
                                <li><a href="#">Nulla hendrerit</a></li>
                                <li><a href="#">Maecenas</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Posuere egestas</a></li>
                                <li><a href="#">Sollicitudin</a></li>
                                <li><a href="#">Luctus non</a></li>
                                <li><a href="#">Duis tincidunt</a></li>
                                <li><a href="#">Elementum</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 Terry Lane, New York, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                                <div class="social">
                                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra inceptos
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>


        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

<?php include ('config.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
    <script type="text/javascript" src="jquery.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>

$(document).ready(function(){

$('#recherche').keyup(function(){

        $('#rechercheMarque').html('');
        var marque= $(this).val();

    if(marque !=""){
            $.ajax({

                type:'GET',
                url:'rechercheVoiture.php',
                data:'marque=' + encodeURIComponent(marque),
                success: function (data){

                    if(data!= ""){
                     $('#rechercheMarque').append(data);   
                    } else{

                            document.getElementById('rechercheMarque').innerHTML="<div>Aucune marque trouvee</div>";
                                 }

                }
            });
   }

});

});

</script>
    
    <title>Car Express|Louer Voiture  </title>

    <link rel="shortcut icon" href="assets/images/logg.jpg">
    
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
<br/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Fixed navbar -->
    <div  class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a style="margin-left:25%; width:100%" class="navbar-brand" href="index.php">Car Express</a> <img style="margin-top:-15%" src="assets/images/logg.jpg" alt="" width="40" height="40">
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class ="active"><a href="nosvoiture.php"> Nos Voitures </a></li>
                    <li><a href="louervoiture.php">Louer une voiture </a></li>
                    <li><a href="contact.php">Contatez nous</a></li>
                    <li ><a class="btn" name="dec" href="e_deconnect.php">Deconnexion </a></li>
                    </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div> 
    <!-- /.navbar -->

    <br/><br/><br/><br/>

    <!-- container -->
    <div class="container">

        <div class="row">
            
            <!-- Article main content -->
            <article class="col-xs-12 maincontent">
                <br/>
                
                <div class="app-main">
           
                
                       
                
         
               <div class="app-main__outer">
                <div class="app-main__inner p-0">
        
                    <div class="app-inner-layout">
                        <div class="app-inner-layout__header bg-heavy-rain">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <i class="pe-7s-power icon-gradient bg-mixed-hopes">
                                            </i>
                                        </div>
                                
                                    </div>
                                    <div class="page-title-actions">
                                       
                                       
                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                                    <i class="fa fa-business-time fa-w-20"></i>
                                                </span>
                                                Nouveautés
                                            </button>
                                            
                                        </div>
                                    </div>    </div>
                            </div>                </div>
                        <div class="app-inner-layout__wrapper">
                            <div class="app-inner-layout__content card">
                                <div>
                                    <div class="app-inner-layout__top-pane">
                                        <div class="pane-left">
                                            
                                            
                                        <div class="pane-right">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-search fa-w-16 "></i>
                                                    </div>
                                                </div>
                                                <input placeholder="Rechercher une marque ..." type="text" class="form-control" id="recherche"></div>
                                                <div id="rechercheMarque"></div>
                                        </div>
                                    </div>
                                    <div class="bg-white">
                                        <div class="table-responsive">
                                            <table class="text-nowrap table-lg mb-0 table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center" style="width: 78px;">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" id="eCheckbox1" class="custom-control-input">
                                                            <label class="custom-control-label" for="eCheckbox1">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="assets/images/chevrolet_impala.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Chevrolet Impala</div>
                                                                    <div class="widget-subheading">"300€/jour disponible imediatement"</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">moteur V8 | année 1968 | gazoil | modèle coupé</td>
                                                    <td>
                                                        <i class="fa fa-tags fa-w-20 opacity-4"></i>
                                                    </td>
                                                    <td class="text-right">
                                                        <i class="fa fa-calendar-alt opacity-4 mr-2"></i>
                                                       Disponible
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 78px;">
                                                        <div class="custom-checkbox custom-control"><input type="checkbox" id="eCheckbox12" class="custom-control-input"><label class="custom-control-label" for="eCheckbox12">&nbsp;</label></div>
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="assets/images/aston_martindb5.jpeg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Aston Martin DB5</div>
                                                                    <div class="widget-subheading">"250€/jour disponible imediatement"</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">moteur V8 | année 1995 | essence | modèle coupé</td>
                                                    <td>
                                                        <i class="fa fa-star"></i>
                                                    </td>
                                                    <td class="text-right">
                                                        <i class="fa fa-calendar-alt opacity-4 mr-2"></i>
                                                        Disponible
                                                    </td>
                                                </tr>
                                              
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="app-inner-layout__bottom-pane d-block text-center">
                                            <nav class="" aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Precedent</span></a></li>
                                                    <li class="page-item active"><a href="javascript:void(0);" class="page-link">1</a></li>
                                                    <li class="page-item"><a href="javascript:void(0);" class="page-link">2</a></li>
                                                    
                                                    <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Suivant</span></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


        </div>
    </div>  <!-- /container -->
    <br/><br/><br/><br/>
        <div class="footer2">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                            Tel : (+33) 07-68-19-71-25 | E-mail : locationvoiture@gmail.com
                                <p>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &copy; Dec 2019, Koudous IBOURAIMA & Lassana MAKADJI 
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>
    </footer>   
        



    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/headroom.min.js"></script>
    <script src="assets/js/jQuery.headroom.min.js"></script>
    <script src="assets/js/template.js"></script>
</body>
</html>

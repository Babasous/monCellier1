<?php
session_start();
			
// Connexion à une base de données avec Mysqli			
$connect = mysqli_connect("localhost","root","root","cellar");
				
//Afficher le résultat d'une requète	
$query= mysqli_query($connect,"SELECT * FROM wine");	
$result =  mysqli_num_rows($query);				
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Caviste SPA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--<script src="js/app.js"></script>-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <header>
                    <div>
                        <a href="#" id="logo"><img src="images/caviste-logo.png" alt="Caviste" width="50"></a>
                        <h1>Caviste</h1>
                    </div>
                    <nav id="main">
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                        </ul>
                    </nav>
                </header>
                <div>
                    <form id="frmSearch" action="#" method="get" class="form-inline">
                        <input type="text" name="keyword" id="keyword" 
                               placeholder="Enter keyword here..." 
                               class="form-control mr-2">
                        <button id="btSearch" name="btSearch" type="button"
                                class="btn btn-success mr-2">Search</button>
                        <a href="#" id="btNewWine" class="btn btn-primary" hidden>New Wine</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 mb-5 mt-3">
                <?php
				while($tab = mysqli_fetch_assoc($query)){ ?>				
					<ul id="liste" class="list-group">
						<li class="list-group-item"><a href="<?php $tab['id']; ?>"><?= $tab['name']; ?></a></li>                  
					</ul>            
					<?php } ?>
            </div>
            <div class="col">
                <form id="frmWine" action="#" method="post" class="form-horizontal">
                    <div class="row">								
					
                        <div class="col">
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="idWine">Id:</label>  
                              <div class="col-md-4">
                                  <input id="idWine" name="idWine" type="number" pattern="[0-9]*" placeholder="" class="form-control input-md" readonly>
								  
								  <?php
								  if($tab['id']){
								  	$tab['id'];  								
								  }
								  ?>
                                <span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="name">Name:</label>  
                              <div class="col-md-12">
                                <input id="name" name="name" type="text" placeholder="" class="form-control input-md">
                                
								<?php
								  if($tab['id']){
								  	$tab['name'];  								
								  }
								  ?>
								<span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="grapes">Grapes:</label>  
                              <div class="col-md-12">
                                <input id="grapes" name="grapes" type="text" placeholder="" class="form-control input-md">
                                
								<?php
								  if($tab['id']){
								  	$tab['grapes']; 								
								  }
								  ?>
								<span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="country">Country:</label>  
                              <div class="col-md-12">
                                <input id="country" name="country" type="text" placeholder="" class="form-control input-md">
                                
								<?php
								  if($tab['id']){
								  	$tab['country'];								
								  }
								  ?>
								<span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="region">Region:</label>  
                              <div class="col-md-12">
                                <input id="region" name="region" type="text" placeholder="" class="form-control input-md">
                                
								<?php
								  if($tab['id']){
								  	$tab['region'];								
								  }
								  ?>
								<span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="year">Year</label>
                              <div class="col-md-6">
                                  <input id="year" name="year" type="number" pattern="[0-9]{4}" placeholder="" class="form-control input-md">
								  
								  <?php
								  if($tab['id']){
								  	$tab['year'];								
								  }
								  ?>                  								
								<span class="help-block"></span>  
                              </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                              <div class="col-md-8">
                                <button id="btSave" name="btSave" type="button" class="btn btn-primary">Save</button>
                                <button id="btDelete" name="btDelete" type="button" class="btn btn-danger">Delete</button>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mx-auto" style="width: 18rem;">
                                <img class="card-img-top" id="picture" src="images/pics/generic.jpg" alt="Generic Wine Bottle">
                                <div class="card-body text-right"
                                  <button type="button" class="btn btn-light" id="btImgChange">
                                      <li class="fas fa-pencil-alt"></li>
                                      <input id="pictureFile" name="pictureFile" type="file" pattern=".*\.(jp(e)?g|png)$" class="form-control input-md" hidden>
                                  </button>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="notes">Notes:</label>
                              <div class="col-md-12">                     
                                  <textarea class="form-control" id="notes" name="description" rows="3"></textarea>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
<footer>&copy; EPFC 2020</footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php

	include('../includes/connect.php');
	include('../fonctions/fonctions.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: login.php");
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Electro Shop</title>

    
    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
	<!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
</head>
<body>

    <header class="header" style="width:100%; height:80px; position:fixed">
		<h2 class="u-name">Electro <b>Shop</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
			<input type="checkbox" id="checkbox">
		</h2>
		<a href="" class="nav-link">Bienvenue <?php echo $_SESSION['admin']?></a>
		<a href='./logout.php' class='nav-link'><i class='fa fa-power-off' aria-hidden='true'></i></a>
	</header>
	
	
	<div class="container p-0 m-0 " >
		<div class="row">
			<div class="body col-lg-3 col-sm-3">
				<nav class="side-bar" style="margin-top:80px;overflow-y:scroll; height:100%; position:fixed">
					<div id="user-p">
						<?php
							if(isset($_SESSION['id_admin'])){
								getProfilImage($_SESSION['id_admin']);
							}else{
								getProfilImage(0);
							}
                		?>
						<h4><?php echo $_SESSION['admin']?></h4>
					</div>
					<ul>
						<li>
							<a href="index.php?tableau_bort">
								<i class="fa fa-desktop" aria-hidden="true"></i>
								<span>Tableau de bord</span>
							</a>
						</li>
						<li>
							<a href="./index.php?ajouter_produit">
								<i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
								<span>Ajouter Produits</span>
							</a>
						</li>
						<li>
							<a href="index.php?liste_produits">
								<i class="fa-brands fa-product-hunt" aria-hidden="true"></i>
								<span>Produits</span>
							</a>
						</li>
						<li>
							<a href="./index.php?ajouter_categories">
								<i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
								<span>Ajouter Catégories </span>
							</a>
						</li>
						<li>
							<a href="index.php?liste_categories">
								<i class="fa-solid fa-list" aria-hidden="true"></i>
								<span>Catégories</span>
							</a>
						</li>
						<li>
							<a href="./index.php?ajouter_marques">
								<i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
								<span>Ajouter Marques </span>
							</a>
						</li>
						<li>
							<a href="index.php?liste_marques">
								<i class="fa-solid fa-list" aria-hidden="true"></i>
								<span>Marques</span>
							</a>
						</li>
						<li>
							<a href="./index.php?liste_utilisateurs">
								<i class="fa-solid fa-users" aria-hidden="true"></i>
								<span>Les Clients</span>
							</a>
						</li>
						<li>
							<a href="./index.php?liste_commandes">
								<i class="fa-solid fa-cart-plus" aria-hidden="true"></i>
								<span>Les Commandes</span>
							</a>
						</li>
						<li>
							<a href="index.php?liste_promos">
								<i class="fa fa-cog" aria-hidden="true"></i>
								<span>Promos</span>
							</a>
						</li>
						<li>
							<a href="./logout.php">
								<i class="fa fa-power-off" aria-hidden="true"></i>
								<span>Déconnexion</span>
							</a>
						</li>
						
					</ul>
					<div style="height:60px"></div>
				</nav>
			</div>
			<div class="col-lg-9 col-sm-12" style="margin-top:90px">
			
				<!-- Dashboar -->
				<?php
					if(isset($_GET['tableau_bort']) || $_GET == null){
				?>

                    <div class="row">
                        <div class="col-md-12 page-header text-success mt-5">
                            <h2 class=" text-center page-title">Tableau de Bord</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
											<i class="fa-brands fa-product-hunt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
											<i class="fa-solid detail-subtitle">Produits</i><br>
                                                <span class="number"><?php
									getStatistique("produits");
								?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats text-center">
											<a href='./index.php?liste_produits' style='text-decoration:none;color:black'>
												<i class="violet fas fa-eye"> Afficher</i>
											</a> 
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
											<i class="fa-solid fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
											<i class="fa-solid detail-subtitle">Clients</i><br>
                                                <span class="number"><?php
													getStatistique("utilisateurs");
												?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats text-center">
											<a href='./index.php?liste_utilisateurs' style='text-decoration:none;color:black'>
												<i class="violet fas fa-eye"> Afficher</i> 
											</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
											<i class="fa-solid detail-subtitle">Commandes</i>
                                                <span class="number"><?php
													getStatistique("commande");
												?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats text-center">
										<a href='./index.php?liste_commandes' style='text-decoration:none;color:black'>
											<i class="violet fas fa-eye"> Afficher</i> 
											</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
												<i class="fa-solid fa-paperclip"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
											<i class="fa-solid detail-subtitle">Marques</i><br/>
                                                <span class="number"><?php
									getStatistique("marques");
								?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats text-center">
											<a href='./index.php?liste_marques' style='text-decoration:none;color:black'>
											<i class="violet fas fa-eye"> Afficher</i>
											</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
												<i class="fa-solid fa-paperclip"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <i class="fa-solid detail-subtitle">Categories</i>
                                                <span class="number"><?php
									getStatistique("categories");
								?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats text-center">
											<a href='./index.php?liste_categories' style='text-decoration:none;color:black'>
											<i class="violet fas fa-eye"> Afficher</i>
											</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row pt-2">
                                        <div class="dfd text-center">
                                            MAD
                                            <h4 class="mb-0">+<?php getCA();?></h4>
                                            <p class="fa-solid text-muted">TOTAL DES VENTES</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php
					}
				?>
			
				<!-- espace pour ajouter les categories -->
				<?php
					if(isset($_GET['ajouter_categories'])){
						include('./ajouter_categories.php');
						$request = htmlspecialchars($_GET['ajouter_categories']);
						switch($request)
						{
							case 'success':
								echo "<script>Swal.fire({position: 'center',
									icon: 'success',
									title: 'La catégorie ajouté avec succès',
									showConfirmButton: false,
									timer: 3000});
									</script>";
								break;

							case 'error':
								echo "<script>Swal.fire({position: 'center',
									icon: 'error',
									title: 'La catégorie éxiste déjà',
									showConfirmButton: false,
									timer: 3000});
									</script>";
								break;

								case 'empty':
									echo "<script>Swal.fire({position: 'center',
										icon: 'error',
										title: 'Donnez une categorie valide svp',
										showConfirmButton: false,
										timer: 3000});
										</script>";
									break;
						}
					}
				?>		

				<!-- espace pour lister les categories -->
				<?php

					if(isset($_GET['liste_categories'])){
					include('liste_categories.php');
					}
				?>

				<!-- espace pour modifier les categories -->
				<?php

					if(isset($_GET['modifier_categorie'])){
					include('modifier_categorie.php');
					}
				?>

				<!-- espace pour supprimer les categories -->
				<?php

					if(isset($_GET['supprimer_categorie'])){
					include('supprimer_categorie.php');
					}
				?>


				<!-- espace pour ajouter les marques -->
				<?php
					if(isset($_GET['ajouter_marques'])){
						include('./ajouter_marques.php');
						$request = htmlspecialchars($_GET['ajouter_marques']);
						switch($request)
						{
							case 'success':
								echo "<script>Swal.fire({position: 'center',
									icon: 'success',
									title: 'La marque ajouté avec succès',
									showConfirmButton: false,
									timer: 3000});
									</script>";
								break;

							case 'error':
								echo "<script>Swal.fire({position: 'center',
									icon: 'error',
									title: 'La marque éxiste déjà',
									showConfirmButton: false,
									timer: 3000});
									</script>";
								break;
							
								case 'empty':
									echo "<script>Swal.fire({position: 'center',
										icon: 'error',
										title: 'Donnez une marque valide svp',
										showConfirmButton: false,
										timer: 3000});
										</script>";
									break;

						}
					}
				?>

				<!-- espace pour ajouter les marques -->
				<?php
				
					if(isset($_GET['liste_marques'])){
						include('liste_marques.php');
					}
				?>

				<!-- espace pour modifier les marques -->
				<?php

					if(isset($_GET['modifier_marque'])){
					include('modifier_marque.php');
					}
				?>

				<!-- espace pour supprimer les marques -->
				<?php

					if(isset($_GET['supprimer_marque'])){
					include('supprimer_marque.php');
					}
				?>





				<?php
				
					if(isset($_GET['ajouter_produit'])){
						include('./ajouter_produit.php');
					}
				?>

				<!-- espace pour lister les produits -->

				<?php
				
					if(isset($_GET['liste_produits'])){
						include('liste_produits.php');
					}
				?>

				<!-- espace pour supprimer les produits -->

				<?php
				
					if(isset($_GET['supprimer_produit'])){
						include('supprimer_produit.php');
					}
				?>

					<!-- espace pour editer les produits -->
				<?php
				
					if(isset($_GET['modifier_produit'])){
						include('modifier_produit.php');
					}
				?>
					<!-- espace pour afficher les commandes-->
					<?php
				
				if(isset($_GET['liste_commandes'])){
					include('liste_commandes.php');
				}
			?>

				<!-- espace pour supprimer les commandes -->
				<?php

					if(isset($_GET['supprimer_commande'])){
					include('supprimer_commande.php');
					}
				?>

				<!-- espace pour afficher les utilisateurs-->
				<?php
					if(isset($_GET['liste_utilisateurs'])){
						include('liste_utilisateurs.php');
					}
				?>

				<!-- espace pour supprimer les utilisateurs -->
				<?php

					if(isset($_GET['supprimer_utilisateur'])){
					include('supprimer_utilisateur.php');
					}
				?>

				<!-- espace pour les promos -->
				<?php

					if(isset($_GET['liste_promos'])){
						include('liste_promos.php');
					}
					if(isset($_GET['modifier_promos'])){
						include('modifier_promos.php');
					}
					if(isset($_GET['supprimer_promos'])){
						include('liste_promos.php');
					}


					if(isset($_GET['facture'])){
                        $_SESSION['facture'] = $_GET['facture'];
                        echo "<script>window.open('/Electro-Shop/client/facture.php','_self')</script>";
                    }
				?>

			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-body">
			<h4>Êtes-vous sûr de vouloir le supprimer ?</h4>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" data-bs-dismiss="modal">Non</button>
			<button type="button" class="btn btn-danger" id="idConfirme"></button>
		</div>
		</div>
	</div>
	</div>

	
	<!-- js linck -->
	<script src="js/confirme.js"></script>
	<script src="../js/navbtn.js?v=<?php echo time(); ?>"></script>
    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</body>
</html>
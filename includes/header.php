
<?php 
	require_once("includes/config.php");
	require_once("includes/classes/Video.php");
	require_once("includes/classes/ButtonProvider.php");
	require_once("includes/classes/User.php");
	require_once("includes/classes/VideoGrid.php");
	require_once("includes/classes/VideoGridItem.php");
	require_once("includes/classes/SubscriptionsProvider.php");
	require_once("includes/classes/NavigationMenuProvider.php");

	$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "" ;
	$userLoggedInObj = new User($con,$usernameLoggedIn);

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Video Player</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script type="text/javascript" src="assets/js/commonAction.js"></script>
	<script type="text/javascript" src="assets/js/userActions.js"></script>

</head>
<body>

	<div id = 'pageContainer'>
		
		<div id  = 'mastHeadContainer'>
			<button class = 'navShowHide'>
				<img src="assets/images/icons/menu.png">
			</button>

			<a class = 'logoContainer' href="index.php">
				<img src="assets/images/icons/logo.png" title = 'logo' alt="Site logo">
			</a>

			<div class = "searchBarContainer">
				<form action = "search.php" method="GET">
					<input type="text" class = "searchBar" name="term" placeholder="search....">
					<button class = 'seachButton'>
						<img src="assets/images/icons/search.png">
					</button>
				</form>

			</div>

			<div class = "rightIcons">
				<a class="tillo" href="upload.php">
					<img class="upload" src="assets/images/icons/upload.png">
				</a>

				<?php 
				echo ButtonProvider::createUserProfileNavigationButton($con, $userLoggedInObj->getUsername()); ?>
			</div>


		</div>

		<div id  = 'navSideContainer' style = "display: none;">
			<?php 
				$navigationMenuProvider = new NavigationMenuProvider($con,$userLoggedInObj);
				echo $navigationMenuProvider->create();
			 ?>
		</div>

		<div id = "mainSectionContainer">
			<div id = 'mainContentContainer'>
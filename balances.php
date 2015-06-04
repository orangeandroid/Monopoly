<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php
include 'conn.php';

?>
<!DOCTYPE html>
<html lang='en' class='no-js'>
	<head>
		<meta charset='UTF-8' />
		<meta http-equiv='X-UA-Compatible' content='IE=edge'> 
		<meta name='viewport' content='width=device-width, initial-scale=1'> 
		<title>Play Monopoly | Balances</title>
		<meta name='description' content='Modern effects and styles for off-canvas navigation with CSS transitions and SVG animations using Snap.svg' />
		<meta name='keywords' content='sidebar, off-canvas, menu, navigation, effect, inspiration, css transition, SVG, morphing, animation' />
		<meta name='author' content='Codrops' />
		<link rel='shortcut icon' href='../favicon.ico'>
		<link rel='stylesheet' type='text/css' href='css/normalize.css' />
		<link rel='stylesheet' type='text/css' href='css/demo.css' />
		<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.2.0/css/font-awesome.min.css' />
		<link rel='stylesheet' type='text/css' href='css/menu_sideslide.css' />
		<!--[if IE]>
  		<script src='http://html5shiv.googlecode.com/svn/trunk/html5.js'></script>
		<![endif]-->
	</head>
	<body>
		<div class='container'>
			<div class='menu-wrap'>
				<nav class='menu'>
					<div class='icon-list'>
						<a href='index.php'><i class='fa fa-fw fa-star-o'></i><span>Transfer</span></a>
						<a href='balances.php'><i class='fa fa-fw fa-bar-chart-o'></i><span>Balances</span></a>
						<a href='gamelog.php'><i class='fa fa-fw fa-newspaper-o'></i><span>Game Log</span></a>
                        <a href='settings.php'><i class='fa fa-fw fa-warning'></i><span>Settings</span></a>
					</div>

                    
				</nav>
				<button class='close-button' id='close-button'>Close Menu</button>
			</div>
			<button class='menu-button' id='open-button'>Open Menu</button>
			<div class='content-wrap' id='content'>
				<div class='content'>
                    <header class='codrops-header'>
						<h1>Balances <span>View Everyone's Balance</span></h1>
					</header>
                    <!-- Related demos -->
					<section class='related'>
<div id="balanceHolder"></div>
         <script type="text/javascript">
    $(document).ready(function(){
      refreshLog();
    });

             function refreshLog(){
        $('#balanceHolder').load('autobalance.php', function(){
            setTimeout(refreshLog, 5000);
            });
        }
    </script>					
</section>
<td class="Playername"></td>
				</div>
			</div><!-- /content-wrap -->
		</div><!-- /container -->
<script src='js/classie.js'></script>
		<script src='js/main.js'></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
	</body>
</html>




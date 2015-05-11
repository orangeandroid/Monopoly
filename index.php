<?php
$con=mysqli_connect("localhost","axel_moneybags","3^PVtkW]dHw,","axel_monopoly");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "
<html lang=\"en\" class=\"no-js\">
	<head>
		<meta charset=\"UTF-8\" />
		<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> 
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> 
		<title>Play Monopoly | Transfers</title>
		<meta name=\"description\" content=\"Modern effects and styles for off-canvas navigation with CSS transitions and SVG animations using Snap.svg\" />
		<meta name=\"keywords\" content=\"sidebar, off-canvas, menu, navigation, effect, inspiration, css transition, SVG, morphing, animation\" />
		<meta name=\"author\" content=\"Codrops\" />
		<link rel=\"shortcut icon\" href=\"../favicon.ico\">
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/normalize.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/demo.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"fonts/font-awesome-4.2.0/css/font-awesome.min.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/menu_sideslide.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/cs-skin-slide.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/cs-select.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/select.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/component.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/textbox.css\" />
		<!--[if IE]>
  		<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
		<![endif]-->
	</head>
	<body>
		<div class=\"container\">
			<div class=\"menu-wrap\">
				<nav class=\"menu\">
					<div class=\"icon-list\">
						<a href=\"index.php\"><i class=\"fa fa-fw fa-star-o\"></i><span>Transfer</span></a>
						<a href=\"balances.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i><span>Balances</span></a>
						<a href=\"gamelog.php\"><i class=\"fa fa-fw fa-newspaper-o\"></i><span>Game Log</span></a>
                        <a href=\"settings.php\"><i class=\"fa fa-fw fa-warning\"></i><span>Settings</span></a>
					</div>

                    
				</nav>
				<button class=\"close-button\" id=\"close-button\">Close Menu</button>
			</div>
			<button class=\"menu-button\" id=\"open-button\">Open Menu</button>
			<div class=\"content-wrap\" id=\"content\">
				<div class=\"content\">
                    <header class=\"codrops-header\">
						<h1>Transfer Money <span>Make Payments</span></h1>
					</header>
                    <!-- Related demos -->
                    <form action=\"execute.php\" method=\"post\">
					<section>
				            <label class=\"select-label\">Sender</label>
                        <select class=\"cs-select cs-skin-slide\" name=\"Sender\">";
                            $playersql = "SELECT Player from cash";
                            $playerresult = $con->query($playersql);
                            while ($row = $playerresult->fetch_assoc()) {
                            echo "<option value=\"" . $row["Player"] . "\" data-class=\"icon-camera\">". $row["Player"] . "</option>";
                            }
                            echo "
                        </select><br />
                                
                    </section>
                    <section>
				            <label class=\"select-label\">Recipient</label>
                        <select class=\"cs-select cs-skin-slide\" name=\"Recipient\">";
                            $playersql = "SELECT Player from cash";
                            $playerresult = $con->query($playersql);
                            while ($row = $playerresult->fetch_assoc()) {
                            echo "<option value=\"" . $row["Player"] . "\" data-class=\"icon-camera\">". $row["Player"] . "</option>";
                            }
                            echo "
                        </select>
                    </section>
                    <section>
                        <span class=\"input input--madoka\">
                            <input class=\"input__field input__field--madoka\" type=\"number\" id=\"Amount\" name=\"Amount\" />
                            <label class=\"input__label input__label--madoka\" for=\"Amount\">
                                <svg class=\"graphic graphic--madoka\" width=\"100%\" height=\"100%\" viewBox=\"0 0 404 77\" preserveAspectRatio=\"none\">
                                    <path d=\"m0,0l404,0l0,77l-404,0l0,-77z\"/>
                                </svg>
                                <span class=\"input__label-content input__label-content--madoka\">Amount</span>
                            </label>
                        </span>
                    </section>
                    <section>
                        <span class=\"input input--madoka\">
                            <input class=\"input__field input__field--madoka\" type=\"text\" id=\"Comment\" name=\"Comment\" />
                            <label class=\"input__label input__label--madoka\" for=\"Comment\">
                                <svg class=\"graphic graphic--madoka\" width=\"100%\" height=\"100%\" viewBox=\"0 0 404 77\" preserveAspectRatio=\"none\">
                                    <path d=\"m0,0l404,0l0,77l-404,0l0,-77z\"/>
                                </svg>
                                <span class=\"input__label-content input__label-content--madoka\">Reason</span>
                            </label>
                        </span>
                    </section>
                    <section>
                                <input type=\"submit\">
					</section>
                    </form>

				</div>
			</div><!-- /content-wrap -->
		</div><!-- /container -->
		<script src=\"js/classie.js\"></script>
		<script src=\"js/main.js\"></script>
        <script src=\"js/selectFx.js\"></script>
        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
        		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
        				<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
	</body>
</html>" ;

?>
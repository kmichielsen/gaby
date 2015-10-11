<?php
/**
 * Create the page requested, including header, footer, head, scrips and of course the page.
 * In case the page is not available, the error page will be displayed.
 * @author KM
 * @created 2015-10-11
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
	//Load head, containing javascript etc.
	include('parts/head.html');?>

	<body>

		<?php
		//Load header
		include('parts/header.html');

		//load content
		$pathToInclude = 'pages/' . $request_page . '.html';
		if(!@include($pathToInclude)){
			include('pages/error.html');
		}

		//Load footer
		include('parts/footer.html');
		
		//Load structure required for overlay
		include('parts/overlay.html');

		//Load clientside javascripts.
		include('parts/scripts.html');
		?>
	</body>
</html>
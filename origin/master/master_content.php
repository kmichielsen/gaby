<?php
/**
 * Include the content rendition only for the requested page.
 * This will be used to load content in overlays.
 * In case content does not exist, the errorpage will be displayed.
 * @author KM
 * @created 2015-10-11
 */

//Only load content in this case to use in overlays
//load content
$pathToInclude = 'pages/' . $request_page . '.html';
if(!@include($pathToInclude)){
	include('pages/error.html');
}
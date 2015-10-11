<?php
/**
 * Handle all page requests incoming, and dispatch them to the right location.
 * 
 * - when no page specified, the page home will be requested
 * - in case a page specified in the url like {tld}/contact, the /pages/contact.html content will be loaded
 * - in case a page requested with url {tld}/contact/route, the page /pages/contact.route will be requested.
 *
 * Once a page will be opened in a overlay only the content is required, this can be requested with a url and adding .content like:
 * - {tld}/contact.content
 * 
 * The logic in below file will also remove starting slashes and ending slashes, to reduce the error rate.
 *
 * @author KM
 * @created 2015-10-11
 */

$MY_FILE_NAME = 'index.php';
$MASTER_PAGE = 'master.php';
$MASTER_CONTENT_PAGE = 'master_content.php';
$CONTENT_SELECTOR = '.content';
$DEFAULT_PAGE = 'home';

//Determine page to forward to.

//Get page requested
$request_url = $_SERVER['REQUEST_URI'];
//Get php page url and path, eg index.php.
$path_url = $_SERVER['PHP_SELF'];
//Determine master path, so folder where stored
$page_root = str_replace($MY_FILE_NAME, '' ,$path_url);
$PAGE_ROOT = $page_root;
//Determine requested page
$request_page = str_replace($page_root, '', $request_url);

//In case requested page is empty, use default home
if ($request_page == ''){
	$request_page = $DEFAULT_PAGE;
}

//In case requested page contains / in request, replace with underscore
$request_page = formatRequestName($request_page);

//When page contains .content, it only requires the content to be loaded
//So no header, footer and other decoration.
//This can be used to load content in a overlay

$st = strpos($request_page, $CONTENT_SELECTOR);
if ($st === false){
	//Execute the page
	include_once($MASTER_PAGE);
}else{
	//.content found, so load diff master and remove .content from url
	$request_page = substr($request_page, 0, $st);
	include_once($MASTER_CONTENT_PAGE);
}

/**
 * Format the requested page by executing some actions.
 * 1. Remove all starting slashes
 * 2. Remove all ending slashes
 */
function formatRequestName($path){
	$parts = explode("/",$path); 
	//Remove starting with /
	
	for ($i = 0; $i < sizeof($parts); $i++){		
		if ($parts[$i] == ''){
			unset($parts[$i]);
		}else{
			break;
		}
	}
	//Remove ending with /
	for ($i = sizeof($parts); $i > 0; $i--){
		if ($parts[$i] == ''){
			unset($parts[$i]);
		}else{
			break;
		}
	}

	//Make _ from slashes.
	$str =  implode('/', $parts);
	//edgecase where still ends with _
	if ($str[strlen($str) -1] == '/' ){
		return substr($str, 0, strlen($str) - 1);
	}
	return $str;
}
# What you need to know when changing
##Structure
Seen in the code you will find several folders. Let me explain all of them:

* css | All css files can be added here
* js | All js can be added here, including subfolders like vendor
* img | Folder with images
* pages | All content pages are added here. Its about content between header and footer
* parts | Repeating site parts are created here, think about header, footer, scripts etc.

Beside three important files can be found in this folder:

* index.php | This file will be requested for each request automatically, due to the configuration in the .htaccess This file will dispatch the request to the right direction
* master.php | Normal request will be passed to this file, it will assemble the page for all normal requests, and includes header, footer etc..
* master_content.php | Requests ending with .content will be handled with this file. These requests will be executed once opening a page as a overlay

##Request a webpage
Requesting a webpage can be done in several ways. First of all

* **/** | This will display the /pages/home.html with header and footer around
* **/home** | This will display the /pages/home.html with header and footer around
* **/ueberuns/werwirsind | This will display /pages/ueberuns/werwirsind.html

Following the above structure new files can be created, as long as they end with .html.

**NB. In case the requested page does not exist, the /pages/error.html page will be displayed**


##Display the overlay
Opening a link in a overlay can be done quite easy. Add the attribute data-overlay to the <a element of the link. Like:

	<a href="ueberuns/werwirsind" data-overlay title="Sub Nav Link 1">Wer wir sind</a>

The code will be formatted as requested, I have created one example with two colums, this can be seen by requesting: /ueberuns

The code for the overlay and all logic can be found at: /js/overlay.js
The styling for the overlay can be found at: /css/overlay.css
The html code used for the overlay can be found at: /pages/overlay.html

NB. The overlay cannot display external content

##Two column layout
One example I have created to display the two column layout at the overlay. You can see this at /ueberuns. 

This is managed by adding a div with the class my-content around the content. see /pages/ueberuns.html

The styling will be added in the /css/pages.css file.

##New css/js includes
When including css/js/image files, you need to provide the complete path. This is required when the site is not hosted straight at the domain level (so a subdomain like): www.test.com/mysite/...

Add the <?=$PAGE_ROOT;?> tag before your path, like:

	<link rel="stylesheet" href="<?=$PAGE_ROOT;?>/css/normalize.css">

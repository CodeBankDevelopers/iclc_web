<?php
/**
 * Index.php
 * @author Vincent Nacar
 * all function of the webapp start here
 */
if (isset($_GET["module"])) {
	$req = $_GET["module"];
}

define("_tpldir_", "templates/");

/**
 * Declare your page routes here
 * @author Vincent Nacar
 */
$tpls = [
	"home"  => "home.tpl.html",
	"about" => "about.tpl.html",
	"team"	=> "team.tpl.html"
];

/**
 * Verify requested module if exists in declared routes
 * @author Vincent Nacar
 */
if ($req != "") {
	if (array_key_exists($req, $tpls)) {
		$tp = $tpls[$req];
	}else{
		require "display_error.php";
		exit();
	}
	render($tp);
} else {
	$req = "home.tpl.html";
	render($req);
}

/**
 * render the whole page
 */
function render($p){
	if (file_exists(_tpldir_.$p)) {
		$page = file_get_contents(_tpldir_.$p);
		require _tpldir_."/index.php";
	}
}

?>
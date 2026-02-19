<?PHP

error_reporting (E_ALL ^E_NOTICE);
require_once("./inc/functions.inc.php");
require_once("./data/config.php");
//$PHP_SELF = "";

if($id != ""){

    if($archive != ""){ $news_file = "./data/archives/$archive.news.arch"; }
    else{ $news_file = "./data/news.txt"; }

	$all_news = file("$news_file");
    $found = FALSE;
    foreach($all_news as $news_line){
    	$news_arr = explode("|", $news_line);
        if($news_arr[0] == $id){ $found = TRUE; break;}
    }
    if($found == TRUE){
		$title	= $news_arr[2];
        $date	= date("j F Y h:i A", $news_arr[0]);
        if($news_arr[4] != ""){
        	$news	= replace_news("show", $news_arr[4]);
		}else{
        	$news	= replace_news("show", $news_arr[3]);
        }

echo<<<PRINTABLE
<HTML dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
<style type="text/css">
<!--
body,td {
	font-family: Unikurd Web, Tahoma;
	color:#000;
	font-size:10pt;	
}
-->
</style>
<title>Printer Friendly Version</title>
</HEAD>
<BODY bgcolor="#ffffff" text="#000000" onload="window.print()">
<table width="500" cellpadding="5" cellspacing="10">
<tr>
<b>$title</b> @ <small>$date</small>
<hr>
$news
<hr>
</tr></table>
</BODY>
</HTML>
PRINTABLE;

    }else{
    	echo"The news you what to print was not found.";
	}

}else{ echo"No"; }

?>

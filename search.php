<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1256" />
<style>
<!--
	A 			{ color: #FFFFFF; text-decoration: none; }
	A:link		{ color: #FFFFFF; text-decoration: none; }
	A:visited	{ color: #FFFFFF; text-decoration: none; }
	A:active	{ color: #FFFFFF;  }
	A:hover	{ color: #cccccc;  }


BODY,TD,TR{
		font-family: Unikurd Web, Tahoma;
		color:#000;
		font-size:10pt;
		}

.input2 {
	border: 1px solid #DFC4B3;
	background-color: #FFF3F4;
	font-family:  Tahoma;
	font-size: 9pt;
	color: #4C4441;
	}
	
.submit2 {
	font-family: Tahoma;
	font-size: 9px;
	font-weight:bold;
	color:000000;
	width:50px;
	height:17px;
	background-image:url(skins/images/meny_knapp.jpg);
	border: 1px ridge #D69C4A;
}
-->
</style>
</head>
<?php
error_reporting (E_ALL ^ E_NOTICE);

$cutepath =  __FILE__;
$cutepath = preg_replace( "'\\\search\.php'", "", $cutepath);
$cutepath = preg_replace( "'/search\.php'", "", $cutepath);

require_once("$cutepath/inc/functions.inc.php");

$user_query = cute_query_string($QUERY_STRING, array("search_in_archives", "start_from", "archive", "subaction", "id", "cnshow",
"ucat","dosearch", "story", "title", "user", "from_date_day", "from_date_month", "from_date_year", "to_date_day", "to_date_month", "to_date_year"));
$user_post_query = cute_query_string($QUERY_STRING, array("search_in_archives", "start_from", "archive", "subaction", "id", "cnshow",
"ucat","dosearch", "story", "title", "user", "from_date_day", "from_date_month", "from_date_year", "to_date_day", "to_date_month", "to_date_year"), "post");

// Define Users
$all_users = file("$cutepath/data/users.db.php");
foreach($all_users as $my_user)
{
        if(!eregi("<\?",$member_db_line)){
                $user_arr = explode("|",$my_user);
                if($user_arr[4] != ""){ $my_names[$user_arr[2]] = "$user_arr[4]"; }
                else{ $my_names[$user_arr[2]] = "$user_arr[2]"; }
    }
}
// Show Search Form
echo<<<HTML

<script language='javascript' type="text/javascript">
        function mySelect(form){
            form.select();
    }
        function ShowOrHide(d1, d2) {
          if (d1 != '') DoDiv(d1);
          if (d2 != '') DoDiv(d2);
        }
        function DoDiv(id) {
          var item = null;
          if (document.getElementById) {
                item = document.getElementById(id);
          } else if (document.all){
                item = document.all[id];
          } else if (document.layers){
                item = document.layers[id];
          }
          if (!item) {
          }
          else if (item.style) {
                if (item.style.display == "none"){ item.style.display = ""; }
                else {item.style.display = "none"; }
          }else{ item.visibility = "show"; }
         }
</script>
<form method=GET action="$PHP_SELF?subaction=search">
<input type=hidden name=dosearch value=yes>

<div align="center">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%">
          <td width="100%">
            <p align="right"><input type=text value="$story" name=story size="24" class="input2">&nbsp;<input type=submit value= "GO" class="submit2">
        </table></td>
    </tr>
    <tr>
      <td>

<div id='advanced' style='display:none;z-index:1;'>
<table width="100%">
          <td width="100%" align="right">
            <p align="right"><input type=text value="$title" name=title size="24" class="input2">&nbsp;:&#1578;&#1740;&#1578;&#1585;
  <tr>
    <td width="100%" align="right"><input type=text value="$user" name=user size="24" class="input2">&nbsp;:&#1606;&#1608;&#1608;&#1587;&#1607;&zwnj;&#1585;
  </tr>



  <tr>
    <td width="100%" align="right">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name=from_date_day> 
       <option value=""> </option>
HTML;
for($i=1;$i<32;$i++){
    if($from_date_day == $i){ echo"<option selected value=$i>$i</option>"; }
    else{ echo"<option value=$i>$i</option>"; }
}

echo"</select>&nbsp;&nbsp;<select name=from_date_month> &nbsp;      <option value=\"\">  </option>";

for($i=1;$i<13;$i++){
    $timestamp = mktime(0,0,0,$i,1,2003);
    if($from_date_month == $i){ echo"<option selected value=$i>". date("M", $timestamp) ."</option>"; }
    else{ echo"<option value=$i>". date("M", $timestamp) ."</option>"; }
}

echo"</select>&nbsp;&nbsp;<select name=from_date_year>       <option value=\"\">  </option>";

for($i=2003;$i<2011;$i++){
    if($from_date_year == $i){ echo"<option selected value=$i>$i</option>"; }
    else{ echo"<option value=$i>$i</option>"; }
}


//////////////////////////////////////////////////////////////////////////
echo<<<HTML
  </tr>
  <tr>
    <td width="100%" align="right">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name=to_date_day>
       <option value="">  </option>
HTML;
for($i=1;$i<32;$i++){
    if($to_date_day == $i){ echo"<option selected value=$i>$i</option>"; }
    else{ echo"<option value=$i>$i</option>"; }
}

echo"</select>&nbsp;&nbsp;<select name=to_date_month><option value=\"\">  </option>";

for($i=1;$i<13;$i++){
    $timestamp = mktime(0,0,0,$i,1,2003);
    if($to_date_month == $i){ echo"<option selected value=$i>". date("M", $timestamp) ."</option>"; }
    else{ echo"<option value=$i>". date("M", $timestamp) ."</option>"; }
}

echo"</select>&nbsp;&nbsp;<select name=to_date_year><option value=\"\">  </option>";

for($i=2003;$i<2011;$i++){
    if($to_date_year == $i){ echo"<option selected value=$i>$i</option>"; }
    else{ echo"<option value=$i>$i</option>"; }
}

if($search_in_archives){ $selected_search_arch = "checked=\"checked\""; }

echo<<<HTML
      </select>
  </tr>
  <tr>
    <td width="100%" align="right">
      <p align="center"><label>&#1574;&#1575;&#1585;&#1588;&#1740;&#1700;&#1740;&#1588; &#1576;&#1711;&#1607;&zwnj;&#1685;&#1742; 
    <input type=checkbox $selected_search_arch name="search_in_archives" value="TRUE"></label>
  </tr>
</table>
</div>

          </td>
    </tr>
      </table>
</div>
$user_post_query
</form>

HTML;

// Don't edit below this line unless you know what you are doing !!!

if($dosearch == "yes")
{

    if( $from_date_day != "" and $from_date_month != "" and $from_date_year != "" and $to_date_day != "" and $to_date_month != "" and $to_date_year != "" )
    {
        $date_from         = mktime(0,0,0,$from_date_month,$from_date_day,$from_date_year);
        $date_to         = mktime(0,0,0,$to_date_month,$to_date_day,$to_date_year);

        $do_date = TRUE;
    }


        $story = trim($story);

        if($search_in_archives){
            if(!$handle = opendir("$cutepath/data/archives")){ die("<center>Can not open directory $cutepath/data/archives "); }
                while (false !== ($file = readdir($handle)))
                {
                        if($file != "." and $file != ".." and eregi("news", $file))
                        {
                                $files_arch[] = "$cutepath/data/archives/$file";
                }
                }
        }
    $files_arch[] = "$cutepath/data/news.txt";

    foreach($files_arch as $file)
    {
        $archive = FALSE;
        if(ereg("([[:digit:]]{0,})\.news\.arch", $file, $regs)){ $archive = $regs[1]; }
        $all_news_db = file("$file");
            foreach($all_news_db as $news_line){
                        $news_db_arr = explode("|",$news_line);
                        $found  = 0;

                        $fuser  = FALSE;
                        $ftitle = FALSE;
                        $fstory = FALSE;
                        if($title and @preg_match("/$title/i", "$news_db_arr[2]")){ $ftitle = TRUE; }
                        if($user  and @preg_match("/\b$user\b/i", "$news_db_arr[1]")){ $fuser = TRUE; }
                        if($story and (@preg_match("/$story/i", "$news_db_arr[4]") or @preg_match("/$story/i", "$news_db_arr[3]"))){ $fstory = TRUE;}

                        if($title and $ftitle){ $ftitle = TRUE; }elseif(!$title){ $ftitle = TRUE; }else{ $ftitle = FALSE; }
                        if($story and $fstory){ $fstory = TRUE; }elseif(!$story){ $fstory = TRUE; }else{ $fstory = FALSE; }
                        if($user  and $fuser) { $fuser  = TRUE; }elseif(!$user) { $fuser  = TRUE; }else{ $fuser  = FALSE; }
            if($do_date)
            {
                    if($date_from < $news_db_arr[0] and  $news_db_arr[0] < $date_to){ $fdate = TRUE; }else{ $fdate = FALSE; }
            }else{ $fdate = TRUE; }

                        if($fdate and $ftitle and $fuser and $fstory){ $found_arr[$news_db_arr[0]] = $archive; }

                }//foreach news line
        }


        echo"<center><div style=font-family=\"verdana\" style=font-size=\"10px\">Found News articles: <b>". count($found_arr)."</b></font></div></center><br />";


            if($do_date){echo"from ".@date("d F Y",$date_from)." to ".@date("d F Y",$date_to)."<br />";}


    // Display Search Results
    if(is_array($found_arr)){
        foreach($found_arr as $news_id => $archive)
        {
            if($archive){$all_news = file("$cutepath/data/archives/$archive.news.arch");}
            else{ $all_news = file("$cutepath/data/news.txt"); }

            foreach($all_news as $single_line)
                           {
                                   $item_arr = explode("|",$single_line);
                                   $local_id = $item_arr[0];

                                   if($local_id == $news_id){
////////// Showing Result

                    echo"<center><a href=\"$PHP_SELF?misc=search&subaction=showfull&id=$local_id&archive=$archive&cnshow=news&ucat=$item_arr[6]&start_from=&$user_query\">$item_arr[2]<br><br></a></center>";

////////// End Showing Result
                }
                           }
                   }
     }else{ echo"<center><div style=font-family=\"verdana\" style=font-size=\"10px\">There are no news matching your search criteria</font></div></center>"; }

}//if user wants to search
elseif( ($misc == "search") and ($subaction == "showfull" or $subaction == "showcomments" or $_POST["subaction"] == "addcomment" or $subaction == "addcomment")){

        require_once("$cutepath/show_news.php");

        unset($action,$subaction);
}

?>
</html>
<link rel="stylesheet" href="mall.css" type="text/css">
<style type="text/css">
<!--
td,th {
	font-size: 8pt;
}
.style3 {
	font-family: Tahoma;
	font-size: 12px;
}
-->
</style>

<body>
<table width="451" height="85" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> <img src="skins/images/bg_article_01.gif" width="451" height="36"></td>
  </tr>
  <tr>
    <td background="skins/images/bg_article_02.gif" style="padding:10px"><strong>Campaign against the Iraq Study Group report </strong><form method="POST" action="?do=contact&s=true">
              <table width="342" border="0" align="center" style="border-bottom:1px dotted #ccc">
                <tr>
                  <td class="biljett"><div align="left"><strong>Namn:</strong><br>
                  </div></td>
                  <td class="biljett"><input name="name" type="text" class="input" size="20" value="<?=$_POST['name']?>"></td>
                </tr>
                <tr>
                  <td class="biljett"><div align="left"><strong>City:</strong></div>
                      <div align="left">                    </div></td>
                  <td class="biljett"><input name="company" type="text" class="input" size="20" value="<?=$_POST['company']?>"></td>
                </tr>
                <tr>
                  <td class="biljett"><div align="left"><strong>Email:</strong><br>
                  </div></td>
                  <td class="biljett"><input name="email" type="text" class="input" size="20" value="<?=$_POST['email']?>"></td>
                </tr>
                <tr>
                  <td class="biljett"><div align="left"> <strong>Profession:</strong><br>
                  </div></td>
                  <td class="biljett"><input name="paff" type="text" class="input" size="20" value="<?=$_POST['paff']?>"></td>
                </tr>
                <tr>
                  <td width="93">&nbsp;</td>
                  <td width="336"><input name="submit" type="submit" class="search_submit" value="send"></td>
                </tr>
                <tr>
                  <td colspan="2"><div class="text">
                      <?
    if(isset($_GET['s'])) {
        if(!empty($_POST['name']) && !empty($_POST['company']) && !empty($_POST['email']) && !empty($_POST['paff'])) {
            mail("party@kdp.se", "Mail by " . $_POST['name'] . " from " . $_POST['company'], "I " . $_POST['name'] . " <" . $_POST['email'] . ">" . " from the city of " . $_POST['company'] . " sign this petition.  My profession is ". $_POST['paff']);
            echo "Thank you<br> your message is send now. ";
        }
        else
            echo "Please fill the form!";
    }
?>
                  </div></td>
                </tr>
              </table>
              </form>
			  <div align="center"><img src="skins/images/compagin.jpg" width="127" height="25" border="0" usemap="#Map5"><br>
      </div>
			  <p> The Honorable George W. Bush<br>
              President of the United States of America <br>
              The White House <br>
              1600 Pennsylvania Avenue <br>
              Washington , DC 20500 <br>
              <br>
              Cc:<br>
              Embassy of the United States<br>
              APO AE 09316<br>
              Baghdad , Iraq </p>
              <p>Email : BaghdadPressOffice@state.gov </p>
              <p>We appreciate sincerely the sacrifices made by Americans soldiers with other allied forces for the sake of the democracy in Iraq and removal of Saddam Hussein's regime from power. </p>
              <p>The people of Kurdistan region have received the ISG report with deep concern. If this report is about to be accepted in practice then the consequences according to us would lead to the reoccurrence of Halabja massacre and the notorious Anfal campaign. </p>
              <p>We, who have signed this petition in the name of democracy and freedom, ask you to: </p>
              <ol>
                <li>Do not let the population of Kurdistan Region be betrayed again. </li>
                <li>Do not let the ISG report to undermine the democratically approved Iraqi constitution. </li>
              </ol>
</td>
  </tr>
  <tr>
    <td height="41" background="skins/images/bg_article_03.jpg"> </td>
  </tr>
</table>

<p>&nbsp;</p>
<map name="Map5">
  <area shape="rect" coords="3,2,47,23" href="skins/files/compagin_kurdi.pdf" target="_blank">
  <area shape="rect" coords="75,2,125,23" href="skins/files/compagin_eng.pdf" target="_blank">
</map>

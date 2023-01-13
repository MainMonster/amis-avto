<?php
Error_Reporting(E_ALL & ~E_NOTICE);

// debug funcs

$debug_on = 0;

function Debug( $s )
{
  echo $s."<br>\n";
}


//print_r($_REQUEST);
// requests data

function ReadParam( $Array, $index )
{
  if (isset($Array[$index])) {
   return $Array[$index];
  } else {
   return "";
  }
}


// page outputs

$Page_Elements = Array();
$Page_Current_Element = '';

function ResetPageElements()
{
  global $Page_Elements;
  global $Page_Current_Element;

  $Page_Elements = Array();
  $Page_Current_Element = '';
}

function Page_Set_Element( $elem )
{
  global $Page_Elements;
  global $Page_Current_Element;

  $Page_Elements[ $elem ] = "";
  $Page_Current_Element = $elem;
}

function Page_Echo( $out )
{

  global $Page_Elements;
  global $Page_Current_Element;

  if ( $Page_Current_Element != '' ) {
    $Page_Elements[ $Page_Current_Element ] .= $out;
  } else {
    echo $out;
  }
}

// page templates

function Get_PageTemplate( $PageName )
{
  $list = File( $PageName );
  $s = "";
  foreach ($list as $line ) {
    $s .= $line;
  }
  return $s;
}

function GetRecords( $Table, $Fields, $Condition )
{
  global $debug_on;
  global $db_prefix;

  $qry = "SELECT ".$Fields." FROM `".$db_prefix.$Table."` WHERE ".$Condition." ;";

  if ( $debug_on == 1 ) {
    Debug( $qry );
  }

  $recs = mysql_query($qry)or $err=mysql_error();
  return $recs;
}


function ProcessHtmlTemplate( $Template, $Data )
{
  $s = $Template;

  foreach ($Data as $label => $value )
  {
    $s = str_replace( $label, $value, $s );
  }
  return $s;
}
function Get_MENU() {
if($_GET[page]){
$Table="site_pages";
$Fields="*";
$Condition="`IDP` = '$_GET[page]' AND `Allow` = '1' ORDER BY `Order` ASC";
$q=GetRecords( $Table, $Fields, $Condition );
while ($menu_item=mysql_fetch_array($q)){
	if($_GET[spage]==$menu_item[ID]) {
	$a.="<div class=menu_2_level_active style=\"padding-bottom:5px\">&#8226;&nbsp;$menu_item[Title]</div>";
		}
	else $a.="<div class=menu_2_level style=\"padding-bottom:5px\"><a href=?page=$_GET[page]&spage=$menu_item[ID]>&#8226;&nbsp;$menu_item[Title]</a></div>";
	 }
	}
return $a;
}

function GetSection()
{
$Table="site_pages";
$Fields="*";
$Condition="`IDP` = '0' AND `Allow` = '1' ORDER BY `Order` ASC";
$q=GetRecords( $Table, $Fields, $Condition );

$a=1;
while($s=mysql_fetch_array($q)){
$sec[$a]=$s;$a++;
    }
$tmp="<table id=MainMenu cellpadding=0; cellspacing=0>";
$tmp.=SDATA($sec);
$tmp.="</table>";
 return $tmp;
}
function SDATA($sec){
global $db_prefix;
$a=1; $cnt=count($sec);

foreach ($sec as $s_d => $s_a){
	         $Table="site_pages";
             $Fields="ID";
             $Condition="`ID`='$s_a[ID]'  AND `Allow`='1'  ORDER BY `Order`  ";
             $q=GetRecords( $Table, $Fields, $Condition );
             if(strlen($s_a[External])< '10')$link= "http://".$_SERVER["HTTP_HOST"]."/?page=$s_a[ID]";
             else $link= "$s_a[External]";

           //$dt.="<tr>";
           //активный пункт меню
           if($_REQUEST[sec]==$s_a[ID]) {
           $dt.='
                <td  class= "menu"><a  href='.$link.'>'.stripslashes($s_a[Title]).'</b></a>';

                if($a != $cnt) $dt.='<span style="color:#9E9D9D" >&nbsp; &nbsp;| &nbsp&nbsp;</span> ';

           }
           else { //неактивный пункт меню
           	 $dt.='
                         	<td  class="menu"><a  href='.$link.'>'.stripslashes($s_a[Title]).'</a>';
   if($a != $cnt) $dt.=' <span style="color:#9E9D9D" > &nbsp;&nbsp;| &nbsp;&nbsp;</span> ';
                 }






            $a++;
            }
     return $dt;
}
function GetPageTitle()
{
$Table="adjustment";
$Fields="Title";
$Condition=" 1";
$q=GetRecords( $Table, $Fields, $Condition );
$tl=mysql_fetch_array($q);
    $t.="$tl[Title]";
   return $t;
}
function GetPageDescription()
{

$Table="adjustment";
$Fields="Description";
$Condition=" 1";
$q=GetRecords( $Table, $Fields, $Condition );
$tl=mysql_fetch_array($q);
    $t="$tl[Description]";
   return $t;
}

function GetPageKeywords()
{

$Table="adjustment";
$Fields="Keywords";
$Condition=" 1";
$q=GetRecords( $Table, $Fields, $Condition );
$tl=mysql_fetch_array($q);
    $t="$tl[Keywords]";
   return $t;
}
function GetContent() {

if($_GET[news] && $_GET[news]!='all'){
      $Table="news";
	  $Fields="*";
      $Condition="`ID`='$_GET[news]'";
      $q=GetRecords( $Table, $Fields, $Condition );
      $ns=mysql_fetch_array($q);
      $t.="<div style=padding-top:10px;padding-bottom:10px>";
      $t.="<div ><h3><img src=\"tmpl/images/shet.gif\" width=\"11\" height=\"11\" alt=\"\">&nbsp;&nbsp;&nbsp;".stripslashes($ns[Title])."</h3></div>";
      $t.="<div style=\"padding-left:50px; padding-top:20px\"><b>$ns[Data]</b></div>";

      $t.="<div style=\"padding-left:50px; padding-top:20px\">";
      if($ns[Picture]) {
      	$t.="<img style=\"padding-right:10px; padding-bottom:10px;  \"  src=content_img/$ns[Picture] align=left border=0 ><br>";
      }
      $t.=nl2br(bbfix($ns[Text]))."</div></div>
      <div><a href=?news=all>Все новости >>></div>";


	}
elseif($_GET[news]=='all') {
		  $Table="news";


	      $Fields="*";
          $Condition="`ID`!=0 ORDER BY `ID` DESC ";
          $q=GetRecords( $Table, $Fields, $Condition );

$t.='<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr><td><h3>Архив новостей<h3>';
while($ns=mysql_fetch_array($q)) {
$t.='<tr>
            <td ><img src="/tmpl/images/shet.gif" width="20" height="21" alt="" border="0">&nbsp;&nbsp;<strong>'.$ns[Data].'&nbsp;'.bbfix(stripslashes($ns[Title])).'</strong><br>';


if ($ns[Title_block])$t.='<strong>'.bbfix(nl2br($ns[Title_block])).'</strong> </br>';
$t.="<a href=?news=$ns[ID]> Подробнее >>> <br>";

//if($ns[Picture]) $t.='<p align=left><img src="content_img/'.$ns[Picture].'"  border="0"></p>';


//             $t.=$ns[Text].'<br>
             $t.='</td>
          </tr>';
          }



        $t.='</table>';
	}
else {
	// страницы
global $db_prefix;
global $tmpl_dir;
if($_GET[page])$page=$_GET[page];
if($_GET[spage])$page= $_GET[spage];
elseif(!$_GET[page]&&!$_GET[spage]) $page='0';
$where= "WHERE `IDP`= '$page' ";
//определить тип страниц

$q=mysql_query("SELECT `Type` FROM `".$db_prefix."site_pages` WHERE `ID`='$page'")or die(mysql_error());
$type=mysql_fetch_array($q);


$q=mysql_query("SELECT * FROM `".$db_prefix."page_content` ".$where." ORDER BY `Order` ASC ")or die(mysql_error());


while ($tl=mysql_fetch_array($q)){
$text=stripslashes($tl[Text]);
$title=nl2br(stripslashes(bbfix($tl[Title])));
$t_block=nl2br(stripslashes(bbfix($tl[Title_block])));
if($tl[Picture]){

$img="<img style=\"padding-right:10px; padding-bottom:10px;  \"  src=content_img/$tl[Picture] align=$tl[Align] border=0 >";
if($tl[Pict_link]) { $link="<a href =$tl[Pict_link] target= $tl[Target]>"; }

}
else $img="";
    if($title){
    $t.="<h3>$title</h3>";

    }

    if($t_block){
    $ttl="<h4>$t_block</h4>";
    }
    else $ttl="";
    $t.="<div>$link$img</a> $ttl $text</div><br>";

 }

      if($type[Type]=='2') {
      include ("inc/good_function.php");


}



	}
return $t;

	}

function Get_HEAD() {
if($_GET[idp])$where=$_GET[idp];
else $where = $_GET[page];
$Table="site_pages";
$Fields="*";
$Condition="`ID` = '$where'";
$q=GetRecords( $Table, $Fields, $Condition );
$data=mysql_fetch_array($q);
$t="<div class=menu_2_level><a href=?page=$data[ID]><H2>$data[Title]</h2></a></div>";
return $t;
}

function Show_MainPage()
{

  global $tmpl_dir;


  $page = "";


  if($_GET[page]||$_GET[news])$PageTmpl="index2.html";
  else $PageTmpl = "index.html";
  $page = Get_PageTemplate( $tmpl_dir . $PageTmpl );
  $page = str_replace( "images/", "/".$tmpl_dir . "images/", $page );
  $page = str_replace( "fonts/", "/".$tmpl_dir . "fonts/", $page );
  $page = str_replace( "css", "/".$tmpl_dir . "style.css", $page );
  $page = str_replace( "js", "/".$tmpl_dir ."js/", $page );
  $MData = Array();


 $MData['{Heading1}']  =Get_HEAD();
 $MData['{MENU}']  =Get_MENU();
 $MData['{Section}']=GetSection();
 $MData['{Tags}'] = GetTags();
 
 $MData['{Content}']=GetContent();
 $MData['{Footer}'] = GetFooter();
 $MData['{Actions}'] = GetActions();
 $MData['{News}']=GetNews();
 $MData['{Title}']=GetPageTitle();
 $MData['{Description}']=GetPageDescription();
 $MData['{Keywords}']=GetPageKeywords();

   $page = ProcessHtmlTemplate( $page, $MData );

  return $page;
}
function GetNews(){
	  $Table="news";
	  $Fields="*";
      $Condition="1  ORDER BY `ID` DESC LIMIT 3";
    $q=GetRecords( $Table, $Fields, $Condition );

$t.='<table width="100%" border="0" cellspacing="10" cellpadding="0">';
while($ns=mysql_fetch_array($q)) {
$t.='<tr>
            <td class="p" ><img src="/tmpl/images/shet.gif" width="20" height="21" alt="" border="0">&nbsp;&nbsp;<strong>'.$ns[Data].'&nbsp;'.bbfix(stripslashes($ns[Title])).'</strong><br>';


if ($ns[Title_block])$t.='<strong>'.bbfix(stripslashes(nl2br($ns[Title_block]))).'</strong> </br>';
$t.="<a href=?news=$ns[ID]> Подробнее >>> <br>";

//if($ns[Picture]) $t.='<p align=left><img src="content_img/'.$ns[Picture].'"  border="0"></p>';


//             $t.=$ns[Text].'<br>
             $t.='</td>
          </tr>';
          }



        $t.='</table>';
return $t;
	}
function GetFooter()
{

$Table="adjustment";
$Fields="Footer";
$Condition=" 1";
$q=GetRecords( $Table, $Fields, $Condition );
$tl=mysql_fetch_array($q);
    $t.= '<div style="footer">'.bbfix(nl2br(stripslashes($tl[Footer]))).'</div>.';
   return $t;
}

function GetActions(){
	  $Table="actions";
	  $Fields="*";
      $Condition="1  ORDER BY `ID` ASC LIMIT 3";
    $q=GetRecords( $Table, $Fields, $Condition );

$t.='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
$a=1;
while($ns=mysql_fetch_array($q)) {
$t.='
            <td valign=top>
            <table width=100% border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td class = "a_title "><strong>'.bbfix($ns[Title]).'</strong>


             <tr><td ><img src="content_img/'.$ns[Picture].'"  border="0">


             <tr><td class="a_text">';$t.=$ns[Text].'
             <tr><td class = "a_a"><a href='.$ns[Link].' >Подробнее >>></a>
             </table>
             </td>';
             if($a < 3)$t.='<td width=2 bgcolor=#9F8F8A>';
          $a++;
          }



        $t.='</tr></table>';
return $t;
	}
function GetTags() { 
	$table = "goods";
	$fields= "`ID`, `Model`";
	$where = "`Status` = '1' AND `IDG` = '3'";
	$q = $q=GetRecords($table, $fields, $where);
		//$t.= "<div align=center>";
	while($tag=mysql_fetch_array($q)) {
$t.= '<a style="color:#CCC" rel="tag" href=?page=6&group=3&id='.$tag[ID].'><h2 nowrap  style = "display: inline; padiing:0px; margin:0px; font-size:15px">'.$tag[Model].'</h2></a>  ';
//$t.='<a class="tags" rel="tag" href = "http://?page=6&group=3&id='.$tag[ID].'><h2>'.$tag[Model].'</h2></a>';
	}
	//$t.="</div>";
	
return $t;
}

?>
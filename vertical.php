<?
session_start();
include_once("common/config.php");
$city = isset($_SESSION['s_deptCity']) ? $_SESSION['s_deptCity'] : "";

$apptFlg = $_GET['appt'];

# Reset Required Sessions #
$_SESSION['s_arrcomp'] = "";  
$_SESSION['s_paidcontactid'] = "";
$_SESSION['s_deduct']  = "";
$_SESSION["s_callCont"]= "";
$_SESSION["s_deductcompanysrch"] = "";
$_SESSION['s_categid'] = "";
$_SESSION['s_cCode']   = "";
$_SESSION['s_contractCode']= "";
$_SESSION['s_contractName'] = "";
$_SESSION['s_catCode'] = "";
$_SESSION['s_comptocatflg']= "";
$_SESSION['s_pContCode']= "";
$_SESSION['s_contPath'] = "";
$_SESSION['s_contPStatus']= "";
$_SESSION["s_ps"]    = "";
$_SESSION["s_compn"] = "";
$_SESSION['s_area']  = "";
$_SESSION['s_city']  = "";
$_SESSION['search_str'] = "";
$_SESSION["s_hContract"]= "";
$_SESSION["s_hContPath"]= "";
$_SESSION["s_hCampaign"] = "";
$_SESSION['s_totcomp']= "";
$_SESSION['s_Prompt_Feedback']= "";
$_SESSION['s_totCPId'] = "";
$_SESSION['s_totCampaignId'] = "";
$_SESSION['s_searchcompstr'] = "";
$_SESSION['s_searchcomparea']= "";
$_SESSION['s_searchcomptype']= "";
$_SESSION['s_areafeedback']= "";
/*$_SESSION['S_CLIMobNum']= "";
$_SESSION['S_CLIPhNum']= "";*/
$_SESSION['dlvryReport'] = "";
$_SESSION['IroFlow'] ="";
$_SESSION['s_SearchType']="";
$_SESSION['s_Distance']="";
$_SESSION['s_Contribution']="";
$_SESSION['s_NationalList']="";
$_SESSION['product_quote_list'] = "";
$_SESSION['quote_details']      = "";
$_SESSION['sf_search_str']		= "";
$_SESSION['s_lookupScript']		= "";
$_SESSION['SMSEMAIL_ACT'] = 0;
$_SESSION['JDAPP_ACT'] 	= 0;
$_SESSION['CALLDET_FLG'] 			= 0; //Information not Received
$_SESSION['S_NO_NUM']				=	0;
unset($_SESSION['nationalTempArr']);
# Reset Required Sessions # 

//print_r($_SESSION) ;
include_once(APP_PATH."iro/citydropdown.php");

?>
<HTML>
<HEAD>
<TITLE>Just Dial- Search</TITLE>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript" src="<?php echo JS_URL;?>/common/config.js"></SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="<?php echo JS_URL;?>/common/js/commonvertical.js"></SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="<?php echo JS_URL;?>/common/js/searchvertical.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript" src='<?php echo JS_URL;?>/common/js/popcalendar.js'></SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="<?php echo JS_URL;?>/common/js/keyfn.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!--
	var PageName = "<?= $SerchPage ?>";
//-->
</SCRIPT>


<!--## FOR CALLER DETAIL EMAIL ID AUTO SUGGEST - STARTS ##-->
<script language="JavaScript" type="text/javascript" src="<?php echo JS_URL;?>/Autosuggest/js/CallerDet_EmailId.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_URL;?>/Autosuggest/css/CallerDet_EmailId.css"/>
<!--## FOR CALLER DETAIL EMAIL ID AUTO SUGGEST - ENDS ##-->

<!--## FOR CITY AND STATE AUTO SUGGESTION ON CALLER GRED PAGE FOR NATIONAL NUMBER- STARTS ##-->
<script language="JavaScript" type="text/javascript" src="<?echo JS_URL;?>/Autosuggest/js/CityNameSugt.js"></script>
<link rel="stylesheet" type="text/css" href="<?echo JS_URL;?>/Autosuggest/css/CityNameSugt.css"/>
<script language="JavaScript" type="text/javascript" src="<?echo JS_URL;?>/Autosuggest/js/StateNameSugt.js"></script>
<link rel="stylesheet" type="text/css" href="<?echo JS_URL;?>/Autosuggest/css/StateNameSugt.css"/>
<!--## FOR CITY AND STATE AUTO SUGGESTION ON CALLER GRED PAGE FOR NATIONAL NUMBER - ENDS ##-->

</HEAD>
<link href="<?php echo CSS_URL;?>/common/css/common.css" rel="stylesheet" type="text/css">
<BODY style='margin:0' onload='document.frmtop.txtsearchstr.focus();'>
<table cellspacing=0 cellpadding=0 border=0 width='100%' height='100%'>
	<!-- <TR><TD height='60'></TD></TR> -->
	<tr>
		<td colspan='2' valign='top'>
			<?  include "common/topvertical.php";?>
		</td>
	</tr>
	<!-- <TR><td colspan='2' height='20'></td></tr> -->
	<tr>
		<TD width='100%' colspan='2' valign='top' >
			<? include "common/leftvertical.php";
			
				if(trim($_SESSION["s_callerNm"])=="")
					$callerName="Caller";
				else
				{
					$arrCallerName=explode(" ",$_SESSION["s_callerNm"]);	
					$callerName=ucfirst(strtolower($arrCallerName[0]));
				}
			?>
		</TD>
	</tr>
	<TR>
		<TD>
		<TABLE width="977" cellspacing="0" cellpadding="0" border="0" valign='top' align="left">
			<TR><TD height='220' align="left" valign="center"></TD></TR>
			<!-- <tr>
				<TD class="fontA12"><b><font class="color6c00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IRO Module</font> Welcome <?=ucfirst($_SESSION["s_uname"])?>, <?=$_SESSION["s_ucode"]?>,</b> Database Department - <?=$_SESSION['s_deptCity']?>, <?echo date ("j M Y, H:i:s");?></TD>
				<TD class="fontA14" align='right'><?if($_SESSION["s_emptype"] != "IRO"){?><a href="javascript:showPwdFrm()">Change Password</a>&nbsp;&nbsp;|<?}?>&nbsp;&nbsp;<a href="javascript:showLogoutemp()"><b>LOGOFF</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>
			</tr> -->
			<TR><TD height='10'></TD></TR>
			<tr><td>&nbsp;<a href="javascript:getPrevSrch();"><span id='spnPrevSrch'><!--b><?=$callerName?>'s Call History</b--></span></a></td></tr> <!-- Removed. Used in Javascript. -->
			<? if($_SESSION['s_SID'] != '') { ?>
			<TR><TD height='10'></TD></TR>
			
			<? } ?>
		</TABLE>
		</TD>
	</TR>
	<!-- <TR><td height='60'></td></tr> -->
	<TR><td >
	<? include_once(APP_PATH."common/footer.php"); ?>
	</td></tr>
</table>
<!--## DIV DECLARATIONS - STARTS ##-->
<div id="overlay"></div>
<div id="overlay_rest"></div>
<div id="overlay_shop"></div>
<div id="divPassword" class="divstyle"></div>
<div id="showLogout" class="divstyle" style="top:150;left:300"></div>
<div id="overlay2"></div>
<div id="showNameList"></div>
<div id="divchng"></div>
<DIV id='Shortbrk'></DIV>
<!--## DIV DECLARATIONS - ENDS ##-->
</BODY>
</HTML>
<script language='javascript'>
<? // Added to remove Previous Caller Histroy on getting a new call.
if(trim($_SESSION["s_callerNm"])!="") {
	//if($_SESSION['s_editcaller_count']!=1) {
	
?>
	document.getElementById("spnPrevSrch").innerHTML="<b><?=$callerName?>'s Call History</b>";
<?
//	}
}
else {	
?>
	document.getElementById("spnPrevSrch").innerHTML="<b></b>";
<?
}
?>
<? if($apptFlg == '1' && $_SESSION['s_SID'] != '') { ?>
	if(top.document.frmmainpg != undefined) {
		if(top.document.frmmainpg.waitInQ.value == '1') {
			top.frame2.openPG(3,top.document.frmmainpg.clinum.value);	
			top.document.frmmainpg.waitInQ.value='';
		}
	}
<? } ?>

<? if($_SESSION['s_SID'] != '') { ?>
	if(top.document.frmmainpg != undefined) {
		top.displayLoginStatusMsg(<?=$_SESSION["s_SID"]?>);
		//top.displayServerStatusMsg();
	}	
<? } ?>
</script>

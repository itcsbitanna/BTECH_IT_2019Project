<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

$str=explode(" ",$res);
$cnt=count($str);
$cnt2=$cnt-1;
$uname=$str[$cnt2];

if(isset($btn))
{

 if(trim($res=="")) { $msg = "Enter the Username"; }
	else
	{
	//	echo "demo";
		
		$uname=$res;
			$qry = mysql_query("select * from register where username='$res'");
			$num=mysql_num_rows($qry);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				
				header("location:index2.php?uname=".$uname);
			//	header("location:inbox.php");
				}
				else
				{
				echo '<p><embed src="audio/login-wrong.mp3" autostart="true"  hidden="true"></embed></p>';
				$msg="Your username, password is wrong!";
				}	
		
	}	
	

	
	
}//login
else
{
echo '<p><embed src="audio/login.mp3" autostart="true" hidden="true"></embed></p>';
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style5 {font-size: 18px}
-->
</style>
 <style>
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            a:link {
                color:#000;
                text-decoration: none;
            }
            a:visited {
                color:#000;
            }
            a:hover {
                color:#33F;
            }
            .button {
                background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
                border: 1px solid #076bd2;
                border-radius: 3px;
                color: #fff;
                display: none;
                font-size: 13px;
                font-weight: bold;
                line-height: 1.3;
                padding: 8px 25px;
                text-align: center;
                text-shadow: 1px 1px 1px #076bd2;
                letter-spacing: normal;
            }
            .center {
                padding: 10px;
                text-align: center;
            }
            .final {
                color: black;
                padding-right: 3px; 
            }
            .interim {
                color: gray;
            }
            .info {
                font-size: 14px;
                text-align: center;
                color: #777;
                display: none;
            }
            .right {
                float: right;
            }
            .sidebyside {
                display: inline-block;
                width: 45%;
                min-height: 40px;
                text-align: left;
                vertical-align: top;
            }
            #headline {
                font-size: 40px;
                font-weight: 300;
            }
            #info {
                font-size: 20px;
                text-align: center;
                color: #777;
                visibility: hidden;
            }
            #results {
                font-size: 14px;
                font-weight: bold;
                border: 1px solid #ddd;
                padding: 15px;
                text-align: left;
                min-height: 50px;
                width: 100px;
            }
            #start_button {
                border: 0;
                background-color:transparent;
                padding: 0;
            }
        </style>
		<script language="javascript">
		function myFunction()
		{
		var txt=document.getElementById("results").value;
		document.form1.uname.value=txt;
		//alert(txt)
		//document.getElementById("myForm").submit();
		}
		
		/*function test()
		{
		alert("ok")
		}*/
		
		
		</script>
</head>
	<script language="javascript">
 
</script>

<body  >
 <div id="info">
                <p id="info_start">&nbsp;</p>
	</div>
            <div class="right">
                <button id="start_button" onClick="startButton(event)">
                    <img id="start_img" src="mic.gif" alt="Start"></button>
            </div>
            <div id="results" >
                <span id="final_span" class="final"></span>
                <span id="interim_span" class="interim"></span>
                <p></div>
            <div class="center" >
            <p>
                    <div id="div_language" style="display:none">
					<form name="form2" method="post">
                        <select id="select_language" onChange="updateCountry();"></select>
                        &nbsp;&nbsp;
                        <select id="select_dialect"></select>
						</form>
                    </div>
			</div>
<form id="form1" name="form1" method="post" action="" id="myForm">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_home.php"); // onLoad="startButton(event)" ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <table width="80%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><img src="images/f3-voic.jpg" width="400" height="261"></td>
            <td valign="top"><p class="style1"><?php echo $msg; ?></p>
              <table width="318" height="169" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2" align="center" class="txt1"><strong>Login</strong></td>
                </tr>
                <tr>
                  <td width="94" class="txt1">Username</td>
                  <td width="90" class="txt1"><input type="text" name="res" id="res" onChange="test()" >
				  
				  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="txt1"><input type="submit" name="btn" id="btn" value="Login"  />
                    &nbsp;
                    <input type="reset" name="Reset" value="Clear"></td>
                </tr>
              </table>
              
              <p></p></td>
          </tr>
        </table>
        <p class="style1">&nbsp;</p>
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
<!--<script type="text/javascript">
  document.getElementById('res').submit();
</script>-->
</body>
</html>
<script>
    var langs =
            [['Afrikaans', ['af-ZA']],
                ['Bahasa Indonesia', ['id-ID']],
                ['Bahasa Melayu', ['ms-MY']],
                ['Catal�', ['ca-ES']],
                ['Ce�tina', ['cs-CZ']],
                ['Deutsch', ['de-DE']],
                ['English', ['en-AU', 'Australia'],
                    ['en-CA', 'Canada'],
                    ['en-IN', 'India'],
                    ['en-NZ', 'New Zealand'],
                    ['en-ZA', 'South Africa'],
                    ['en-GB', 'United Kingdom'],
                    ['en-US', 'United States']],
                ['Espa�ol', ['es-AR', 'Argentina'],
                    ['es-BO', 'Bolivia'],
                    ['es-CL', 'Chile'],
                    ['es-CO', 'Colombia'],
                    ['es-CR', 'Costa Rica'],
                    ['es-EC', 'Ecuador'],
                    ['es-SV', 'El Salvador'],
                    ['es-ES', 'Espa�a'],
                    ['es-US', 'Estados Unidos'],
                    ['es-GT', 'Guatemala'],
                    ['es-HN', 'Honduras'],
                    ['es-MX', 'M�xico'],
                    ['es-NI', 'Nicaragua'],
                    ['es-PA', 'Panam�'],
                    ['es-PY', 'Paraguay'],
                    ['es-PE', 'Per�'],
                    ['es-PR', 'Puerto Rico'],
                    ['es-DO', 'Rep�blica Dominicana'],
                    ['es-UY', 'Uruguay'],
                    ['es-VE', 'Venezuela']],
                ['Euskara', ['eu-ES']],
                ['Fran�ais', ['fr-FR']],
                ['Galego', ['gl-ES']],
                ['Hrvatski', ['hr_HR']],
                ['IsiZulu', ['zu-ZA']],
                ['�slenska', ['is-IS']],
                ['Italiano', ['it-IT', 'Italia'],
                    ['it-CH', 'Svizzera']],
                ['Magyar', ['hu-HU']],
                ['Nederlands', ['nl-NL']],
                ['Norsk bokm�l', ['nb-NO']],
                ['Polski', ['pl-PL']],
                ['Portugu�s', ['pt-BR', 'Brasil'],
                    ['pt-PT', 'Portugal']],
                ['Rom�na', ['ro-RO']],
                ['Slovencina', ['sk-SK']],
                ['Suomi', ['fi-FI']],
                ['Svenska', ['sv-SE']],
                ['T�rk�e', ['tr-TR']],
                ['?????????', ['bg-BG']],
                ['P??????', ['ru-RU']],
                ['??????', ['sr-RS']],
                ['???', ['ko-KR']],
                ['??', ['cmn-Hans-CN', '??? (????)'],
                    ['cmn-Hans-HK', '??? (??)'],
                    ['cmn-Hant-TW', '?? (??)'],
                    ['yue-Hant-HK', '?? (??)']],
                ['???', ['ja-JP']],
                ['Lingua latina', ['la']]];

    for (var i = 0; i < langs.length; i++) {
        select_language.options[i] = new Option(langs[i][0], i);
    }
    select_language.selectedIndex = 6;
    updateCountry();
    select_dialect.selectedIndex = 6;
    showInfo('info_start');

    function updateCountry() {
        for (var i = select_dialect.options.length - 1; i >= 0; i--) {
            select_dialect.remove(i);
        }
        var list = langs[select_language.selectedIndex];
        for (var i = 1; i < list.length; i++) {
            select_dialect.options.add(new Option(list[i][1], list[i][0]));
        }
        select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
    }

    var create_email = false;
    var final_transcript = '';
    var recognizing = false;
    var ignore_onend;
    var start_timestamp;
	
	
	
	
    if (!('webkitSpeechRecognition' in window)) {
        upgrade();
    } else {
        start_button.style.display = 'inline-block';
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;
 recognition.start();
        recognition.onstart = function() {
            recognizing = true;
            showInfo('info_speak_now');
            start_img.src = 'mic-animate.gif';
        };

        recognition.onerror = function(event) {
            if (event.error == 'no-speech') {
                start_img.src = 'mic.gif';
                showInfo('info_no_speech');
                ignore_onend = true;
            }
            if (event.error == 'audio-capture') {
                start_img.src = 'mic.gif';
                showInfo('info_no_microphone');
                ignore_onend = true;
            }
            if (event.error == 'not-allowed') {
                if (event.timeStamp - start_timestamp < 100) {
                    showInfo('info_blocked');
                } else {
                    showInfo('info_denied');
                }
                ignore_onend = true;
            }
        };

        recognition.onend = function() {
            recognizing = false;
            if (ignore_onend) {
                return;
            }
            start_img.src = 'mic.gif';
            if (!final_transcript) {
                showInfo('info_start');
                return;
            }
            showInfo('');
            if (window.getSelection) {
                window.getSelection().removeAllRanges();
                var range = document.createRange();
                range.selectNode(document.getElementById('final_span'));
				document.getElementById("myForm").submit();
                window.getSelection().addRange(range);
            }
            if (create_email) {
                create_email = false;
                createEmail();
            }
        };

        recognition.onresult = function(event) {
            var interim_transcript = '';
			
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    //final_transcript += event.results[i][0].transcript;
					final_transcript = event.results[i][0].transcript;
                } else {
                    //interim_transcript += event.results[i][0].transcript;
					interim_transcript = event.results[i][0].transcript;
					
                }
            }
			
            final_transcript = capitalize(final_transcript);
            final_span.innerHTML = linebreak(final_transcript);
            interim_span.innerHTML = linebreak(interim_transcript);
            //document.getElementById('res').value = linebreak(final_transcript);
            if (final_transcript || interim_transcript) {
                showButtons('inline-block');
              //  document.getElementById('res').value = linebreak(final_transcript);
			    if(document.getElementById('res').value == "")
				{
				document.getElementById('res').value = linebreak(interim_transcript).toLowerCase();;
				document.getElementById("btn").click();
				//alert("Ok")
				}
              //  recognition.onend();
				
            }
        };
    }

    function upgrade() {
        start_button.style.visibility = 'hidden';
        showInfo('info_upgrade');
    }

    var two_line = /\n\n/g;
    var one_line = /\n/g;
    function linebreak(s) {
        return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
    }

    var first_char = /\S/;
    function capitalize(s) {
        return s.replace(first_char, function(m) {
            return m.toUpperCase();
        });
    }

    function createEmail() {
        var n = final_transcript.indexOf('\n');
        if (n < 0 || n >= 80) {
            n = 40 + final_transcript.substring(40).indexOf(' ');
        }
        var subject = encodeURI(final_transcript.substring(0, n));
        var body = encodeURI(final_transcript.substring(n + 1));
        window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
    }

    function copyButton() {
        if (recognizing) {
            recognizing = false;
            recognition.stop();
        }
        copy_button.style.display = 'none';
        copy_info.style.display = 'inline-block';
        showInfo('');
    }

    function emailButton() {
        if (recognizing) {
            create_email = true;
            recognizing = false;
            recognition.stop();
        } else {
            createEmail();
        }
        email_button.style.display = 'none';
        email_info.style.display = 'inline-block';
        showInfo('');
    }

    function startButton(event) {
        if (recognizing) {


            recognition.stop();
            return;
        }
        final_transcript = '';
        recognition.lang = select_dialect.value;
        recognition.start();
        ignore_onend = false;
        final_span.innerHTML = '';
        interim_span.innerHTML = '';
        start_img.src = 'mic-slash.gif';
        showInfo('info_allow');
        showButtons('none');
        start_timestamp = event.timeStamp;
    }

    function showInfo(s) {
        if (s) {
            for (var child = info.firstChild; child; child = child.nextSibling) {
                if (child.style) {
                    child.style.display = child.id == s ? 'inline' : 'none';
                }
            }
            info.style.visibility = 'visible';
        } else {
            info.style.visibility = 'hidden';
        }
    }

    var current_style;
    function showButtons(style) {
        if (style == current_style) {
            return;
        }
        current_style = style;
        copy_button.style.display = style;
        email_button.style.display = style;
        copy_info.style.display = 'none';
        email_info.style.display = 'none';
    }
</script>
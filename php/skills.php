<?php
include_once(".dbconfig.inc");
include_once(".mlhconfig.inc");
//Data for list
$query = "select skill_id, skill_name from hackgsu2.skills order by skill_name";
$list_counter = 1;
    $result = mysqli_query($con, $query);

$p_access_token;
if (isset($_GET['access_token'])) {
    $p_access_token = $_GET['access_token'];
}
if (isset($_GET['code'])) {
    $p_access_token = $_GET['code'];
}
if (!isset($p_access_token)) {
	$p_access_token = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://www.gsu.edu/wp-content/themes/gsu-core/favicon.ico">
    <title>hackGSU / Oct 21-23 / Georgia State University</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/cover.css" rel="stylesheet">
	<link rel="alternate" href="http://www.hackgsu.com/mobile" media="handheld">
	<link rel="alternate" href="http://www.hackgsu.com/mobile" media="only screen and (max-width: 640px)">
	<link rel="stylesheet" type="text/css" href="http://hackgsu.com/new/test/beta/01/css/register.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
		var queryStrFragment=window.location.hash;

		if(queryStrFragment.length!=0)
		{
			window.location.replace(window.location.pathname + window.location.search + window.location.hash.replace("#","?"));
		}
	</script>

  </head>

<body>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">
		<br/><br/>
        <div class="cover-container">
        	<!-- MLH Badge-->
			<a id="mlh-trust-badge" style="display:block;max-width:100px;min-width:60px;position:absolute;right:50px;top:0;width:10%;z-index:10000" href="https://mlh.io/seasons/na-2017/events?utm_source=na-2017&utm_medium=TrustBadge&utm_campaign=na-2017&utm_content=white" target="_blank"><img src="https://s3.amazonaws.com/logged-assets/trust-badge/2017/white.svg" alt="Major League Hacking 2017 Hackathon Season" style="width:100%"></a>
          <div class="masthead clearfix" style="float:left">
            <div class="inner" style=>
              <div id="navigation" style="location: fixed; float:left; right:10px">
					<nav >
						<div class="nav masthead-nav" >
							<a class="no-decoration" href="http://hackgsu.com"><span class="nav-text"> << back to hackGSU</span></a>
							<!-- <li><a href="#">FAQ</a></li>
							<li class="active"><a href="#">Register Now!!</a></li> -->
							<!--
							<li><a href="#location">Location</a></li>
							<li><a href="#schedule">Schedule</a></li>
							-->
							<!-- <li><a href="#">Sponsors</a></li>
							<li><a href="#"></a></li> -->
							<!--
							<li><a href="https://www.facebook.com/events/936572959745025/" target="_blank"><img width="100%" src="assets/img/facebook.png" alt="Facebook Event"></a></li>
							<li><a href="http://hackgsu-2016.devpost.com" target="_blank"><img width="100px" src="assets/img/devpost.svg" alt="Devpost"></a></li>
							-->
						</div>
					</nav>
              </div> <!--navigation-->

			  <!-- start:  content and jump points -->
			  <div id="content" >
				<div id="hackers">
				<font color="#000000">
				<br/><br/><br/><br/>
				<section id="volunteer_list">
					<div class="inner" >
					<br/>
					<h1 class="sky-text">&#60;!-- hackGSU HACKERS --></h1>
					<!-- <div class="card mlh-code-container"> -->
						<p class="info-title mlh-code sky-text">Your MLH Confirmation Code:<br><font color="#ffffff"><?php echo($p_access_token); ?></font></p>
					<!-- </div> -->
					

					<form name="skills_form" id="skills_form" action="skills_save.php" enctype="multipart/form-data" method="POST">
					    <input type="hidden" id="p_access_token" name="p_access_token" style="background-color:#000" value="<?php echo($p_access_token);?>">
						<div class="col-lg-8 col-lg-offset-2 table-responsive scroller no-h-padding">
							<table width="100%" class="table-responsive scroller">
								<tr>
									<td style="vertical-align: middle;align=left">
										<font color="#CCC" size="+1"><p class="info-title skinny-text">Recruiters want to know more about you.<br>What have you worked with?</p></font>
									</td>
								</tr>
							</table>



<!--Skills data for HackGSU database-->
							<table class="table-responsive scroller hide-me">
								<tr>
									<td style="vertical-align: middle;text-align=left">
										<p class="info-title"> <input type = "hidden" name = "email_address" size = "50" id = "email_address" ></p>
										<p class="info-title"> <input type = "hidden" name = "access_code" size = "50" id = "access_code" value="<?php echo($p_access_token); ?>"></p>
									</td>
								</tr>
							</table>
						<div class="card">
							<table class="table" width="100%" align="center" >
										<thead>
										  <tr align="center">
											<th width="19%"><p class="info-title card-text">Language/Skill</p></th>
											<th width="80%" style="text-align:center"><p class="info-title card-text">Exposure Level - Experience</p></th>
										  </tr>
										</thead>
										<tbody>
<?php
	while($row=mysqli_fetch_object($result))
	{

	echo
 '			              <tr> '
.'			                <td align="left" > <p class="skill-title card-text">'
.'							<input type="checkbox" name="yes_'. str_replace("+","plus",str_replace("/","_",str_replace(" ","",$row -> skill_name))) .'"'
.'							 id="yes_'. str_replace("+","plus",str_replace("/","_",str_replace(" ","",$row -> skill_name))) .'" value="'. $row -> skill_id .'">'
.'                           &nbsp;&nbsp;&nbsp;&nbsp; '
. 							 $row -> skill_name
.'							</td> '

.'			                <td align="center"> '
.'			                <select style="color:black" name="exp_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'							id="exp_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'			                > '
.'			                  <option value="0">No Exposure</option>'
.'			                  <option value="1">Some Exposure</option>'
.'			                  <option value="2">Pretty Good</option>'
.'			                  <option value="3">Really Good</option>'
.'			                  <option value="4">Expert</option>'
.'			                </select>'
.'                          &nbsp;&nbsp;'
.'			                <select style="color:black" name="time_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'							id="time_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'			                > '
.'			                  <option value="0">No experience</option>'
.'			                  <option value="1">0-1 month</option>'
.'			                  <option value="2">2-5 months</option>'
.'			                  <option value="3">6-12 months</option>'
.'			                  <option value="4">>1 year</option>'
.'			                </select>'
.'                          </p></td> '
.'			              </tr> '
;

            $list_counter++;
	} //end while
?>
							</tbody>
						  </table>
						</div>
						<table width="100%" class="table-responsive scroller">
								<tr>
									<td style="vertical-align: middle;">
										<font color="#CCC" size="+1"><p class="info-title skinny-text">What else would you like recruiters to know about you?</p></font>
									</td>
								</tr>
							</table>
						  <table class="card" style="min-height: 50vw">
							<tbody>
							  <tr id="id02" style="visibility: hidden;">
								<td align="center"colspan="100%">
								<textarea style="background-color:#000" name="mlh_details" id="mlh_details" rows="4" cols="50" maxlength="255" ></textarea>
								</td>
							  </tr>
							  <tr>
								<td align="center"colspan="100%"><p class="info-title card-text skinny-text">Your GPA (overall): <input style="background-color:#fff;text-align: center;" type = "text" name = "gpa" id = "gpa" size = "5" > </p>
								<p class="info-title card-text skinny-text text-bump-under">Here's your chance to brag! Give us your 30-second spill:
								<br/><textarea style="background-color:#000" name="speech" id="speech" rows="4" cols="50" placeholder="start typing here..." maxlength="255"></textarea></p>
								</td>
							  </tr>
							</tbody>
						</table>
						<table width="100%" class="table-responsive scroller">
								<tr>
									<td style="vertical-align: middle;">
										<font color="#CCC" size="+1"><p class="info-title skinny-text">Got a resume? Share it!<br>If not, it's ok.<br>Submit the form when you're done.</p></font>
									</td>
								</tr>
							</table>
						<table class="card">
							<tbody>
							  <tr>
								<td align="center" colspan="100%"><p class="info-title card-text skinny-text text-bump-under">Upload your resume(optional):<input type="file" class="btn center" name="resume_file" id="resume_file"></p></td>
							  </tr>
							</tbody>
						  </table>
						  <table>
							<tbody>
							  <tr>
								<td align="center" colspan="100%"><input class="btn btn-success" type="submit" value="Submit" name = "submit_button" id = "submit_button" ></td>
							  </tr>
							</tbody>
						  </table>
						</div>
					</form>
				</section>
				</div>
			</div>
		</div>
	</div>
	</div>

<!--Data from MLH Database-->
<script type="text/javascript">
var xmlhttp = new XMLHttpRequest();
var url = "https://my.mlh.io/api/v1/user?access_token=<?php echo($p_access_token);?>&reponse_type=code"
 //alert(url);
xmlhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();


function myFunction(response) {
    var arr = JSON.parse(response);

    var i;
    var out = "<table>";
    out+= mlh_dump(arr);
    out += "</table>";


}
function mlh_dump(obj) {
    var out = "";
    var data = '';
    for (var i in obj) {
        if(i=='data') {
           data=obj[i]
         }
    }
    for (var i in data) {
        if(i=='school') {
           school=data[i]
         }
        else {
           out += "hacker_" + i + ": " + data[i] + ",";
        }
        if (i=='email') {
           document.getElementById("email_address").innerHTML = data[i];
           document.getElementById("email_address").value = data[i];
        }
    }

    for (var i in school) {
        out += "school_"+ i + ": " + school[i] + ",";
    }

    // or, if you wanted to avoid alerts...
    document.getElementById("mlh_details").innerHTML = out;
}
</script>

</body>
</html>

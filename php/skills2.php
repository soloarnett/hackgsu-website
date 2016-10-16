<?php
include_once("includes/db_config.php");
include_once("includes/db_connect_top.php");
include_once("includes/header.html");
//Data for list
$query = "select skill_id, skill_name from hackgsu2.skills order by skill_name";
$list_counter = 1;

    $result = mysqli_query($con, $query);
?>



	<form name="skills_form" id="skills_form" action="skills_save.php">
		<div class="col-lg-8 col-lg-offset-2 table-responsive scroller">
          	<table>
          		<tr>
          			<td style="vertical-align: middle;align=left">
						<p class="lead"><font color="#CCC" size="+1">
							What have you worked with?</font>
						</p><font color="#CCC">
							<br/></font>
          			</td>
          		</tr>
          	</table>
          	<table class="table">
			            <thead>
			              <tr>
			                <th>Language/Skill</th>
			                <th>Experience Level</th>
			                <th>Time Used</th>
			              </tr>
			            </thead>
			            <tbody>
<?php
	while($row=mysqli_fetch_object($result))
	{

	echo
 '			              <tr> '
.'			                <td align="left"> '
.'							<input type="checkbox" name="yes_'. str_replace("/","_",str_replace(" ","",$row -> skill_name)) .'"'
.'							 id="'. str_replace("/","_",str_replace(" ","",$row -> skill_name)) .'" value="'. $row -> skill_id .'">'
. 							 $row -> skill_name
.'							</td> '

.'			                <td align="left"> '
.'			                <select name="exp_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'							id="exp_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'			                > '
.'			                  <option value="1">Some Exposure</option>'
.'			                  <option value="2">Pretty Good</option>'
.'			                  <option value="3">Really Good</option>'
.'			                  <option value="4">Expert</option>'
.'			                </select>'
.'			                <td align="left"> '
.'			                <select name="time_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'							id="time_'
.							str_replace("/","_",str_replace(" ","",$row -> skill_name)) . '"'
.'			                > '
.'			                  <option value="1">0-1 month</option>'
.'			                  <option value="2">2-5 months</option>'
.'			                  <option value="3">6-12 months</option>'
.'			                  <option value="4">>1 year</option>'
.'			                </select>'
.'                          </td> '
.'			              </tr> '
;

            $list_counter++;
	} //end while
?>
						  <tr>
						    <td>Your 30-second elevator <br/>speech about yourself</td>
						    <td colspan="2"><textarea name="speech" id="speech" rows="4" cols="30" maxlength="255"></textarea></td>
						  </tr>
						    <td colspan="3"><input class="btn btn-success" type="submit" value="Submit"></td>
						  <tr>
						  </tr>

			            </tbody>
          </table>
		</div>
	</form>
</section>

<?php
include_once("includes/db_connect_bottom.php");
include_once("includes/footer2.html");
?>
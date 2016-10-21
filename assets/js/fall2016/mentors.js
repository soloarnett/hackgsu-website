

function getRequests(){

	$('#mentors-container').load("assets/php/fall2016/mentors.php", function() {

		var count=30;

		var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

		function timer()
		{
		  count=count-1;
		  if (count <= 0)
		  {
		     clearInterval(counter);
		     getRequests();
		     //counter ended, do something here
		     return;
		  }

		  $('#refresh').html('Try not to type close to refresh. Refresh in <font color="red">' + count + '</font> seconds');
		}




	});
	// setTimeout(getRequests, 30000);


}


///////////////////////////////////////////////////////////////// DOCUMENT READY /////////////////////////////////////////////////////////////////

$(document).ready(function(){

	getRequests();








});
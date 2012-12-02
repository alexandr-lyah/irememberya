<script type="text/javascript">

var name = "Nick Frost"
var pictureurl_right = "http://m.c.lnkd.licdn.com/media/p/2/000/022/3e0/2824410.jpg";
var pictureurl_wrong = "http://m.c.lnkd.licdn.com/media/p/4/000/182/3cc/38a92ec.jpg";
var title_right = "CEO";
var title_wrong = "Bus driver";
var company_right = "AngelList";
var company_wrong = "Ebay";

$(document).ready(function(){
	console.log("document ready")
	getNextData();
	$(".pictureframe").click(function() {
		console.log(" id = " + $(this).attr("id"))
		var newclassname = "picclickedwrong";
		var pictureCorrect = pictureIsCorrect($(this).attr("id"));
		updateScore(pictureCorrect);
		if(pictureCorrect) {
			newclassname = "picclickedright";
		}
	  $(this).addClass(newclassname);
		//$('#continuebutton').visible();
		$("#continuepicturebutton").css("visibility", "visible");
	});
	$("#continuepicturebutton").click(function() {
		console.log("continuebutton clicked");
		getNextData();
		showTitleQuestion();
	});
	$('.persontitle').click(function() {
		console.log("persontitle clicked");
		var titleCorrect = titleIsCorrect($(this).attr("id"));
	})
});

function pictureIsCorrect(pictureClassName) {
	console.log(" pictureClassName = " + pictureClassName)
	//please update this code in PHP or JSON
	return pictureClassName == "leftprofilepicframe"
}

function updateScore(correct) {
	
}


function getNextData() {
	console.log("getNextData")
	$.getJSON('testjson.php', function(data) {
		console.log(data);
		var items = [];
		$.each(data, function(key, val) {
	    items.push(key + ' >>>' + val);
	  });

	  //$("#continuebutton").append(items);
		updateInfo();
	})
}

function updateInfo() {
	$('#namecontainer').html(name);
	$('#picright').attr("src", pictureurl_right);
	$('#picleft').attr("src", pictureurl_wrong);
}

function showTitleQuestion() {
	$("#titlequestion").css("visibility", "visible");
	$("#picturequestion").hide();
}


function titleIsCorrect(pictureClassName) {
	console.log(" pictureClassName = " + pictureClassName)
	//please update this code in PHP or JSON
	return pictureClassName == "leftprofilepicframe") {
	
}
</script>


<div class="content center">
	
	<div class="innercontainer" id="picturequestion" style="display:xnone">
		<div>
			<h1>Who is <span id="namecontainer"></span>?</h1>
		</div>
		<div id="leftprofilepicframe" class="pictureframe">
			<div class="profilepicinnerframe">
				<img class="profilepic" id="picleft" xsrc="" />
			</div>
		</div>
		<div id="rightprofilepicframe" class="pictureframe">
			<div class="profilepicinnerframe">
				<img class="profilepic" id="picright" xsrc="" />
				<!--
				<img class="profilepic" src="http://m.c.lnkd.licdn.com/media/p/4/000/182/3cc/38a92ec.jpg" />
				
				-->
			</div>
		</div>
		
		<div class="button hidden" id="continuepicturebutton">Continue</div>
	</div>
	
	<div class="innercontainer hidden" id="titlequestion">
		<div>
			<h1>What is their title?</h1>
		</div>
		
		<div class="leftcolumn">
 			<div class="xprofilepicinnerframe">
					<img class="profilepic" id="picright" src="http://m.c.lnkd.licdn.com/media/p/4/000/182/3cc/38a92ec.jpg" />
					
			</div>
			<div>Nick Frost</div>
			
		</div>
	
		<div class="rightcolumn">
			<div id="titleone" class="persontitle">hacker</div>
			<div id="titletwo" class="persontitle">Social Media Officer</div>
		</div>
		
		
		
		
	</div>
	
	<div class="innercontainer hidden" id="companyquestion">company</div>

<div>
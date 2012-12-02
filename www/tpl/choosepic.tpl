<script type="text/javascript">

var name = "Nick Frost"
var pictureurl_right = "http://m.c.lnkd.licdn.com/media/p/2/000/022/3e0/2824410.jpg";
var pictureurl_wrong = "http://m.c.lnkd.licdn.com/media/p/4/000/182/3cc/38a92ec.jpg";
var job_right = "CEO";
var job_wrong = "Bus driver";
var company_right = "AngelList";
var company_wrong = "Ebay";

function getNextData() {
	console.log("getNextData")
	$.getJSON('details.php', function(data) {
		var items = [];
		$.each(data, function(key, val) {
			if(key =="cool") {
				$.each(val, function(key2, val2) {
					if(key2 == "name") {
						name = val2
					}
					else if(key2 == "pic") {
						pictureurl_right = val2
					}
					else if(key2 == "job") {
						job_right = val2
					}
					else if(key2 == "company") {
						company_right = val2
					}
				});
			}
			else {
				$.each(val, function(key2, val2) {
					if(key2 == "pic") {
						pictureurl_wrong = val2
					}
					else if(key2 == "job") {
						job_wrong = val2
					}
					else if(key2 == "company") {
						company_wrong = val2
					}
				});
			}
	  });
		updateInfo();
	})
}


$(document).ready(function(){
	getNextData();
	$(".profilepic").click(function() {
		var pictureCorrect = pictureIsCorrect($(this).attr("src"));
		updateScore(pictureCorrect);
		var newclassname = "picclickedwrong";
		if(pictureCorrect) {
			newclassname = "picclickedright";
		}
	  $(this).parent().parent().addClass(newclassname);
		$("#continuepicturebutton").css("visibility", "visible");
	});
	
	$("#continuepicturebutton").click(function() {
		showJobQuestion();
	});
	$('.personjob').click(function() {
		var jobCorrect = jobIsCorrect($(this).html());
		showJobCorrect(jobCorrect, this);
	})
	
	$("#continuejobbutton").click(function() {
		showCompanyQuestion();
	});
	
	$('.personcompany').click(function() {
		var companyCorrect = companyIsCorrect($(this).html());
		showCompanyCorrect(companyCorrect, this);
	});
	
	
	$("#continuecompanybutton").click(function() {
		showEndResult();
	});
	
	$(".reconnectbutton").click(function() {
		refresh();
		getNextData();
	});
	
});

function pictureIsCorrect(pictureSrc) {
	console.log(" pictureSrc = " + pictureSrc)
	return pictureSrc == pictureurl_right;
}

function updateScore(correct) {
	
}

function updateInfo() {
	$('#namecontainer').html(name);
	if(randomBoolean()) {
		$('#picright').attr("src", pictureurl_right);
		$('#picleft').attr("src", pictureurl_wrong);
	}
	else {
		$('#picright').attr("src", pictureurl_wrong);
		$('#picleft').attr("src", pictureurl_right);
	}
}

function showJobQuestion() {
	//$("#titlequestion").css("visibility", "visible");
	$("#titlequestion").show();
	$('#titlepiccorrect').attr("src", pictureurl_right);
	$('#namecorrect').html(name);
	$("#picturequestion").hide();
	if(randomBoolean()) {
		$('#titleone').html(job_wrong);
		$('#titletwo').html(job_right);
	}
	else {
		$('#titleone').html(job_right);
		$('#titletwo').html(job_wrong);
	}
}

function randomBoolean() {
	randomvalue = Math.random();
	return randomvalue > 0.5;
}


function jobIsCorrect(jobTitle) {
	console.log(" jobTitle = " + jobTitle)
	return jobTitle == job_right;
}

function companyIsCorrect(company) {
	console.log(" company = " + company)
	return company == company_right;
}

function showCompanyQuestion() {
	console.log("showCompanyQuestion");
	//update right question
	$('#titlecompanyquestion').html("What is their company?");
	$('#jobcorrect').html(job_right);
	$('.personjob').hide();
	$('#continuejobbutton').hide();
	
	if(randomBoolean()) {
		$('#companyone').html(company_wrong);
		$('#companytwo').html(company_right);
	}
	else {
		$('#companyone').html(company_right);
		$('#companytwo').html(company_wrong);
	}
	$('.personcompany').show();
	
	//hide buttons title
	//show buttons company
}

function showJobCorrect(correct, clickedButton) {
	var classname = "correctbutton";
	if(!correct) {
		classname = "incorrectbutton";
	}
	$(clickedButton).addClass(classname);
	$('#continuejobbutton').css("visibility", "visible");
}

function showCompanyCorrect(correct, clickedButton) {
	//alert("correct compy: " + correct);
	//$('#continuecompanybutton').show();
	console.log("clickedButton:" + clickedButton);
	var classname = "correctbutton";
	if(!correct) {
		classname = "incorrectbutton";
	}
	$(clickedButton).addClass(classname);
	$('#continuecompanybutton').css("visibility", "visible");
}

function showEndResult() {
	//alert("end!");
	$('#titlequestion').hide();
	$('#picright2').attr("src", pictureurl_right);
	
	$('#reconnectname').html(name);
	$('#reconnectjob').html(job_right);
	$('#reconnectcompany').html(company_right);
	
	$('#getintouchquestion').show();
}

function refresh() {
	$('#picturequestion').show();
	$('#titlequestion').hide();
	$('#getintouchquestion').hide();
	$('.personcompany').removeClass("correctbutton");
	$('.personcompany').removeClass("incorrectbutton");
	$('.personjob').removeClass("correctbutton");
	$('.personjob').removeClass("incorrectbutton");
	$('#leftprofilepicframe').removeClass("picclickedright");
	$('#rightprofilepicframe').removeClass("picclickedright");
	$('#leftprofilepicframe').removeClass("picclickedwrong");
	$('#rightprofilepicframe').removeClass("picclickedwrong");
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
			</div>
		</div>
		
		<div class="button hidden" id="continuepicturebutton">Continue</div>
	</div>
	
	<div class="innercontainer nodisplay" id="titlequestion">
		<div>
			<h1 id="titlecompanyquestion">What is their title?</h1>
		</div>
		
		<div class="leftcolumn">
 			<div class="xprofilepicinnerframe">
					<img class="profilepic" id="titlepiccorrect" src="" />
				</div>
			
			<div id="namecorrect" class="beneathpictext"></div>
			<div id="jobcorrect" class="beneathpictext"></div>
			
		</div>
	
		<div class="rightcolumn">
			<div id="titleone" class="personjob">hacker</div>
			<div id="titletwo" class="personjob">Social Media Officer</div>
			
			<div class="button hidden" id="continuejobbutton">Continue</div>
			
			<div id="companyone" class="personcompany nodisplay">hacker</div>
			<div id="companytwo" class="personcompany nodisplay">Social Media Officer</div>
			
			<div class="button hidden" id="continuecompanybutton">Continue</div>
		</div>
		
	
	</div>
	
	<!--<div class="innercontainer hidden" id="companyquestion">company</div> -->
	
	<div class="innercontainer nodisplay" id="getintouchquestion">
		<div>time to reconnect?</div>
		<div id="reconnectop">
			<div id="reconnectpicture">
				<img class="profilepic" id="picright2" xsrc="" />
			</div>
			<div id="reconnectinfo">
				<div id="reconnectname"></div>
				<div id="reconnectjob"></div>
				<div id="reconnectcompany"></div>
			</div>
		</div>
		<div id="reconnectbottom">
			<div class="button reconnectbutton" id="contactsoon">Contact Soon</div>
			
			<div class="button reconnectbutton" id="contactrecently">Contacted recently</div>
			
			<div class="button reconnectbutton" id="contactskip">Skip</div>
		</div>
	 </div> 
	

<div>
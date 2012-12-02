var name = "Nick Frost"
var pictureurl_right = "http://m.c.lnkd.licdn.com/media/p/2/000/022/3e0/2824410.jpg";
var pictureurl_wrong = "http://m.c.lnkd.licdn.com/media/p/4/000/182/3cc/38a92ec.jpg";
var job_right = "CEO";
var job_wrong = "Bus driver";
var company_right = "AngelList";
var company_wrong = "Ebay";
var score = 0;

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
		var scoreChange = -1;
		if(pictureCorrect) {
			newclassname = "picclickedright";
			scoreChange = 1;
		}
		updateScore(scoreChange);
	  $(this).parent().parent().addClass(newclassname);
		$("#continuepicturebutton").show();
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
	return jobTitle == job_right;
}

function companyIsCorrect(company) {
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
	var scoreChange = 1;
	if(!correct) {
		classname = "incorrectbutton";
		scoreChange = -1;
	}
	$(clickedButton).addClass(classname);
	$('#continuejobbutton').css("visibility", "visible");
	updateScore(scoreChange);
}

function showCompanyCorrect(correct, clickedButton) {
	//alert("correct compy: " + correct);
	//$('#continuecompanybutton').show();
	console.log("clickedButton:" + clickedButton);
	var classname = "correctbutton";
	var scoreChange = 1;
	if(!correct) {
		classname = "incorrectbutton";
		scoreChange = -1;
	}
	$(clickedButton).addClass(classname);
	$('#continuecompanybutton').css("visibility", "visible");
	updateScore(scoreChange);
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

function updateScore(scoreChange) {
	 score += scoreChange;
	 $('#scorenumber').html("" + score);
}

function refresh() {
	$('#picturequestion').show();
	$('#titlequestion').hide();
	$('#getintouchquestion').hide();
	$('#continuepicturebutton').hide();
	$('.personcompany').removeClass("correctbutton");
	$('.personcompany').removeClass("incorrectbutton");
	$('.personjob').removeClass("correctbutton");
	$('.personjob').removeClass("incorrectbutton");
	$('#leftprofilepicframe').removeClass("picclickedright");
	$('#rightprofilepicframe').removeClass("picclickedright");
	$('#leftprofilepicframe').removeClass("picclickedwrong");
	$('#rightprofilepicframe').removeClass("picclickedwrong");
	$('#reconnectinfo').children().html('');
	$('.beneathpictext').html('');
}

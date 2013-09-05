/*
/////////project functions//////////
*/


//handles tabs in project.php
function projectTabStateMachine(){
	
	//declare var
	this.currentOpenTab;
	//declare methods
	this.construct = construct;
	this.showOverview = showOverview;
	this.showDocuments = showDocuments;
	this.showTimeArchived = showTimeArchived;
	this.showPartners = showPartners;
	this.showFunders = showFunders;
	this.hideAll = hideAll;
	this.initEventListeners = initEventListeners;
	
	
	function construct(){
		this.currentOpenTab = "overview";
		this.showOverview();
		this.initEventListeners();
	}
	
	function showOverview(){
		hideAll();
		$(".overview").show();
		$("li[class='active']").removeAttr('class');
		$("#overviewTab").addClass("active");
	}
	
	function showDocuments(){
		hideAll();
		$(".documents").show();
		$("li[class='active']").removeAttr('class');
		$("#documentsTab").addClass("active");
	}
	
	function showTimeArchived(){
		hideAll();
		$(".timearchived").show();
		$("li[class='active']").removeAttr('class');
		$("#timeTab").addClass("active");
	}
	
	function showPartners(){
		hideAll();
		$(".partners").show();
		$("li[class='active']").removeAttr('class');
		$("#partnersTab").addClass("active");
	}
	
	function showFunders(){
		hideAll();
		$(".funders").show();
		$("li[class='active']").removeAttr('class');
		$("#fundersTab").addClass("active");
	}
	
	function hideAll(){
		$(".overview").hide();
		$(".documents").hide();
		$(".timearchived").hide();
		$(".partners").hide();
		$(".funders").hide();
	}
	
	function initEventListeners(){
		$("#overviewTab").click(function(){
		  showOverview();
		});
		$("#documentsTab").click(function(){
		  showDocuments();
		});
		$("#timeTab").click(function(){
		  showTimeArchived();
		});
		$("#partnersTab").click(function(){
		  showPartners();
		});
		$("#fundersTab").click(function(){
		  showFunders();
		});
	}
}

function fetchProjectData(id){
	$.getJSON("../databaseFunctions/fetch.php", {fetch: "project", id: id}, function(data){
			var convertedData = eval(data);
			//console.log(convertedData);
			currentProjectData = convertedData;
			
			
			//haha paskanvitut t‰‰ pit‰‰ refactoroida, haksaan t‰h‰n noi muutokset ny
			$("#identifier").append(convertedData['project'][0]['identifier']);
			$("#diary_number").append(convertedData['project'][0]['diary_number']);
			$("#projectcode").append(convertedData['project'][0]['projectcode']);
			$("#project_name").append(convertedData['project'][0]['project_name']);
			$("#acronym").append(convertedData['project'][0]['acronym']);
			$("#keywords").append(convertedData['project'][0]['keywords']);
			
			$("#focuse_areas").append(convertedData['project'][0]['focuse_areas']);
			$("#metropolia_coordinator").append(convertedData['project'][0]['metropolia_coordinator']);
			$("#metropolia_inner_project").append(convertedData['project'][0]['metropolia_inner_project']);
			$("#degree_program_related").append(convertedData['project'][0]['degree_program_related']);
			
			$("#inspector").append(convertedData['project'][0]['inspector']);
			$("#inspected_day").append(convertedData['project'][0]['inspected_day']);
			$("#funding_application").append(convertedData['project'][0]['funding_application']);
			$("#funding_application_sign_day").append(convertedData['project'][0]['funding_application_sign_day']);
			$("#denied_application").append(convertedData['project'][0]['denied_application']);
			$("#funding_decision").append(convertedData['project'][0]['funding_decision']);
			$("#funding_decision_day").append(convertedData['project'][0]['funding_decision_day']);
			$("#funding_decision_notification").append(convertedData['project'][0]['funding_decision_notification']);
			$("#targeted_budget").append(convertedData['project'][0]['targeted_budget']);
			
			$("#start_day").append(convertedData['project'][0]['start_day']);
			$("#end_day").append(convertedData['project'][0]['end_day']);
			$("#duration").append(convertedData['project'][0]['duration']);
			
			//initialize click event that handles data changes
			$(".overviewData").click(function(){
			if(!isSomethingSelected){
				isSomethingSelected = true;
				selectedElement = this;
				var contents = $(this).html();
				$(this).replaceWith("<input class='modify' value='"+ contents +"' type='text'></input>");
				}
			});
			
			$("*").keydown(function(keyPressEvent){
				
				//if user presses enter
				if(keyPressEvent['keyCode'] == 13){
					var temp;
					var temp2;
					//alert($(selectedElement).attr("id"));
					//console.log($(".modify").val());
					//console.log($(selectedElement).attr("id"));
					currentProjectData['project'][0][$(selectedElement).attr("id")] = $(".modify").val();
					console.log(currentProjectData);
					temp = $(".modify").val();
					temp2 = $(selectedElement).attr("id");
					$(selectedElement).html("<td id='"+ temp2 +"' class='overviewData'>"+ temp +"</td>");
					isSomethingSelected = false;
					
				}
			});
			
			$("#sendUpdate").click(function(){
				var tables = $(currentProjectData).serializeArray();
				var temp = {0:'project'};
				var data =  $(temp).serializeArray();
			
				$.post("../databaseFunctions/update.php", {table:JSON.stringify(temp), data: JSON.stringify(currentProjectData)}, function(){
				
				//do something with callback, refresh page perhaps?
				});
			});
			
			//return convertedData;
			
	});
}

function fetchProjectScript(){
	$.getJSON("../databaseFunctions/session.php", {send:false},
			function(data){
				if(data){
					var convertedData = eval(data);
					//return fetchProjectData(convertedData['id']);
					var temp = fetchProjectData(convertedData['id']);
					//console.log(fetchProjectData(convertedData['id']));
				}else{
					alert("failed to send/retrieve data");
				}
			});
	}

/*
/////////globals////////
*/
	var currentProjectData;
	var selectedElement;
	var isSomethingSelected = false;
/*
/////////main//////////
*/
	
$(document).ready(function(){
	
	
	
	var tab = new projectTabStateMachine();
	tab.construct();
	
	var projectData = fetchProjectScript();
	
	
	
});
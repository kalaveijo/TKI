
// fetches list of projects from database and appends them to index.php
// attaches event listener to created tr tags
function appendProjectList(){
	$.post("../databaseFunctions/fetch.php", {fetch: "projectList"}, function(data){
			var convertedData = eval(data);
			for (project in convertedData){
				$("#tbody").append("<tr class='hentry'><td class='no'>"+ convertedData[project].id +"</td><td class='projectName'><a href='project.html'>"+ convertedData[project].project_name +"</a></td><td class='diary' >"+ convertedData[project].diary_number +"</td><td class='identifier'>"+ convertedData[project].identifier+"</td><td class='timeCreated'>12:00 4th Apr 2011</td><td class='timeModified'>"+ convertedData[project].valid_starttime+"</td><td class='status'>active</td></tr>");
			}
			
			//eventlistener for tr tags
			$(".hentry").click(function(value){
			var projectId = $(this).find("td:first-child").text();
			
			var projectData = convertedData[projectId - 1];
			console.log(projectData);
			managePageChange( {id: projectData['id']}, "project.php", true);
			});
	});
}





function managePageChange(stuffToSend, page, send){
if(send){
	$.post("../databaseFunctions/session.php", {script:stuffToSend, send:send},
			function(data){
				if(data){
					//redirect
					window.location = page;
				}else{
					alert("failed to send/retrieve data");
				}
			});
}else{
	$.getJSON("../databaseFunctions/session.php", {script:"", send:send},
			function(data){
				if(data){
					var convertedData = eval(data);
					return convertedData;
				}else{
					alert("failed to send/retrieve data");
				}
			});
}
}




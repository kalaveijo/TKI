$(document).ready(function(){
			$.post("sessionAjaxTest.php", {name: "john"}, function(data){
				$("#body").append("<br>" + data);
			});
		});
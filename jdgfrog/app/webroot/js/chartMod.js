/*
This javascipt file uses JQuery to change the specific forms to the choosen chart selected. 
Each form will be shown or hiden depending on the selected chart and the form will be reset if the user
is presented the form again when that specific chart is selected again. 
*/
$(document).ready(function(){
	$("#xAxisBox").hide();
	$("#yAxisBox").hide();
	$("#singleBox").hide();
	$("select#xAxisBox")[0].selectedIndex = 0; 
	$("select#yAxisBox")[0].selectedIndex = 0;  

    $("#barGraphRadio").click(function(){
		$("#xAxisBox").show();
		$("#yAxisBox").show();   
		$("#singleBox").hide(); 
		$("select#xAxisBox")[0].selectedIndex = 0; 
		$("select#yAxisBox")[0].selectedIndex = 0;  
	});
    $("#lineGraphRadio").click(function(){
		$("#xAxisBox").show();
		$("#yAxisBox").show();      
		$("#singleBox").hide();
		$("select#xAxisBox")[0].selectedIndex = 0; 
		$("select#yAxisBox")[0].selectedIndex = 0;  
	});
	$("#histogramRadio").click(function(){
		$("#xAxisBox").show();
		$("#yAxisBox").show();
		$("#singleBox").hide();    
		$("select#xAxisBox")[0].selectedIndex = 0; 
		$("select#yAxisBox")[0].selectedIndex = 0;   
	});
	$("#pieChartRadio").click(function(){
		$("#singleBox").show();     
		$("#xAxisBox").hide();
		$("#yAxisBox").hide();
		$("select#singleBox")[0].selectedIndex = 0; //sets the index back
	});
	$("#geoChartRadio").click(function(){
		$("#singleBox").show();
		$("#xAxisBox").hide();
		$("#yAxisBox").hide();
		$("select#singleBox")[0].selectedIndex = 0; 
		   
	});
});

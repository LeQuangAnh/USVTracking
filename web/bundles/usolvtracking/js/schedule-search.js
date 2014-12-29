/*
jQuery("#list2").jqGrid(
		{ 
			url:'server.php?q=2', 
			datatype: "json", 
			colNames:['ModuleID','WBS ID', 'Plan Start', 'Plan Finish','Plan Cost'], 
			colModel:[ 
			           {name:'module_id',index:'module_id', width:55}, 
			           {name:'wbs_id',index:'wbs_id', width:90}, 
			           {name:'planstart',index:'planstart', width:100}, 
			           {name:'planfinish',index:'planfinish', width:80, align:"right"}, 
			           {name:'plancost',index:'plancost', width:150, sortable:false} 
			         ], 
			rowNum:10, 
			rowList:[10,20,30], 
			pager: '#pager2', 
			sortname: 'module_id', 
			viewrecords: true, 
			sortorder: "desc", 
			caption:"Project Name" }); 
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
*/

$(document).ready(function() {

	   //listen for the form beeing submitted
	   $("#schedule").submit(function(){
	      //get the url for the form
	      var url=$("#schedule").attr("action");
	   
	      //start send the post request
	       $.post(url,{
	           formName:$("#schedule").val(),
	           other:"attributes"
	       },function(data){
	           //the response is in the data variable
	    	   
	    	   $('#output').html(data);
	   /*
	            if(data.responseCode==200 ){           
	                $('#output').html(data.greeting);
	                $('#output').css("color","red");
	            }
	           else if(data.responseCode==400){//bad request
	               $('#output').html(data.greeting);
	               $('#output').css("color","red");
	           }
	           else{
	              //if we got to this point we know that the controller
	              //did not return a json_encoded array. We can assume that           
	              //an unexpected PHP error occured
	              alert("An unexpeded error occured.");

	              //if you want to print the error:
	              $('#output').html(data);
	           }
	           */
	       });//It is silly. But you should not write 'json' or any thing as the fourth parameter. It should be undefined. I'll explain it futher down

	      //we dont what the browser to submit the form
	      return false;
	   });
	});
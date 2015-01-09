$(document).ready(function () {
	$("#searchButton").click(function () {		
		$("#jqGridTasks").jqGrid('GridUnload');
		$.ajax(
	    {
       type: $("[name='schedulesearchtype']").attr("method"),
       url: $("[name='schedulesearchtype']").attr("action"),
       data: 
       {
       	project: function() { return $("#schedulesearchtype_project").val(); }
       },
       dataType: "json",
       success: function(data)
       {
          colD = data.colData;
          colN = data.colNames;
          colM = data.colModel;
          colG = data.groupHeaders;

          // Init Grid Data
          jQuery("#jqGridTasks").jqGrid({
          	jsonReader : {
          		root: "rows",
          		row: "rows",
              cell: "cell",
              id: "id"
          	},
            url: $("[name='schedulesearchtype']").attr("action"),
            datatype: 'jsonstring',
            mtype: $("[name='schedulesearchtype']").attr("method"),
            datastr : colD,
            colNames:colN,
            colModel :colM,
            pager: jQuery('#jqGridTasksPager'),
            rowNum: 10,
            rowList: [10, 20, 30],
            viewrecords: true,
            gridview: true,
            height: 'auto',
            width: 800,
            shrinkToFit: false,
            caption: $("#schedulesearchtype_project").val()
          })
          
          // Group Header - with colspan
          jQuery("#jqGridTasks").jqGrid('setGroupHeaders', {
          	useColSpanStyle: true,
          	groupHeaders: colG
          });
          
          // Set column Freeze
          jQuery("#jqGridTasks").jqGrid('setFrozenColumns');
       },
       error: function(x, e)
       {
         alert(x.readyState + " "+ x.status +" "+ e.msg);   
       }
	    });
			setTimeout(function() 
			{
				$("#jqGridTasks").jqGrid('setGridParam', { datatype : 'json' }); 
			}, 50);

  });
});
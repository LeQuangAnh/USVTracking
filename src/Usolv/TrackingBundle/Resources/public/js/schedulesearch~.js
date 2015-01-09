$(document).ready(function () {
	$("#searchButton").click(function () {
		$("#jqGridTasks").jqGrid({            
    	url: $("[name='schedulesearchtype']").attr("action"),
        postData: {
        	project: function() { return $("#schedulesearchtype_project").val(); }
        },
        datatype: "json",
        mtype: $("[name='schedulesearchtype']").attr("method"),
        colNames: ["Module", "WBS", "Plan Start", "Plan Finish", "Plan Cost"],
        colModel: [
            { name: "module", align:"center"},
            { name: "wbs", align:"center"},
            { name: "planstart", align:"center"},
            { name: "planfinish", align:"center"},
            { name: "plancost", align:"center"},
        ],
        pager: "#jqGridTasksPager",
        rowNum: 10,
        rowList: [10,20],
        sortname: "module",
        sortorder: "asc",
        height: 'auto',
        viewrecords: true,
        gridview: true,
        caption: $("#schedulesearchtype_project").val()
    });
  });
});

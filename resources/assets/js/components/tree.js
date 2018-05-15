$(function() {
  $('#tree').jstree({
    'core' : {
      'data' : {
        "url" : "ajax/tree-default",
        "dataType" : "json" 
      }
    }
  });
});
$(function() {
  $("#set-to-search").click(function() {
    $("#needle-fields").show();
    $("#haystack").attr("rows", 5);
  });

  $("#set-to-enumerate").click(function() {
    $("#needle-fields input").val("");
    $("#needle-fields").hide();
    $("#haystack").attr("rows", 9);
  });
});

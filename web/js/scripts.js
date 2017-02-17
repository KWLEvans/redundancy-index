$(function() {
  $("#set-to-search").click(function() {
    $("#needle-fields").show();
    $("#haystack").attr("rows", 5);
    $("#input-form").attr("action", "/result");
    $(this).addClass("selected");
    $(this).prop("required", true);
    $("#set-to-enumerate").removeClass("selected");
  });

  $("#set-to-enumerate").click(function() {
    $("#needle-fields input").val("");
    $("#needle-fields").hide();
    $("#needle").prop("required", false);
    $("#haystack").attr("rows", 9);
    $("#input-form").attr("action", "/enumerate");
    $(this).addClass("selected");
    $("#set-to-search").removeClass("selected");
  });

  $("#sort-numerically-button").click(function(event) {
    event.preventDefault();
    $("#sort-form").attr("action", "/numerical");
    $("#sort-form").submit();
  });

  $("#sort-alphabetically-button").click(function(event) {
    event.preventDefault();
    $("#sort-form").attr("action", "/alphabetical");
    $("#sort-form").submit();
  });

  $(".plus-image").click(function() {
    $(this).parent().next().slideDown();
    $(this).hide();
    $(this).next().show();
  });

  $(".minus-image").click(function() {
    $(this).parent().next().slideUp();
    $(this).hide();
    $(this).prev().show();
  });
});

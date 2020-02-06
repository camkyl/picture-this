function searchq() {
    var searchTxt = $("input[name='search']").val();

    $.post("/../app/users/search.php", { searchval: searchTxt }, function(
        output
    ) {
        $("#output").html(output);
    });
}

// This is The Searching Jquery
// Store the initial display status of each list item
// Store the initial display status as a data attribute
$(".list-item").each(function() {
    var listItem = $(this);
    listItem.data('initial-display', listItem.css('display'));
});

$("#search").on("input", filter);

function filter() {
    var term = $("#search").val().toLowerCase();

    $(".list-item").each(function() {
        var listItem = $(this);

        // If the search term is empty, use the initial display status
        if (term === "") {
            listItem.css("display", listItem.data('initial-display'));
        } else {
            // Otherwise, filter based on the search term
            if (listItem.text().toLowerCase().indexOf(term) !== -1) {
                listItem.css("display", "block");
            } else {
                listItem.css("display", "none");
            }
        }
    });
}
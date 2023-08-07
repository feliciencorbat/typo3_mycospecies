$(
    function () {

        $('#autocomplete_species').autocomplete(
            {
                source: "./api/v1/species/autocomplete",
                minLength: 2,
                select: function (event, ui) {
                    $("#species").val(ui.item.uid);
                    $("#selected_species").empty().append("<i>" + ui.item.genus + " " + ui.item.species + "</i> " + ui.item.author + "<br/>");
                }

            }
        )

        // Custom render of autocomplete (with genus, species and author)
        .autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
            .append("<div><i>" + item.genus + " " + item.species + "</i> " + item.author + "</div>")
            .appendTo(ul);
        };

    }
);

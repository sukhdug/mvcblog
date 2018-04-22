jQuery(document).ready(function () {
    $(".liked").on("click", function () {
        var id = $(this).attr("article_id");
        $.get({
            type: 'GET',
            url: "ajax.php",
            dataType: 'html',
            data: {controller: 'Articles', action: 'Liked', id: id},
            success: function (data) {
                $("#like" + id + " > span").html(data);
            },
            error: function (e) {
                alert("Error" + e);
                console.log(e);
            }
        });
    });
});

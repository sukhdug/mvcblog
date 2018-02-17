jQuery(document).ready(function () {

    $(".liked").bind("click", function () {

        var id = $(this).attr("article_id");
        $.ajax({
            type: 'POST',
            url: "ajax.php",
            data: {controller: 'Articles', action: 'Liked', id: id},
            beforeSend: function(xhr){
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function (data) {
                $("#like" + id + " > span").html(data);
            },
            error: function (e) {
                alert("Error");
                console.log(e);
            }
        });
    });
});

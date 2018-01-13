jQuery(document).ready(function(){

    $("span.showfullcontent").css('color', '#ff0000');
    $("span.showfullcontent").click(function(){
        var id = $(this).attr("article_id");
        $.ajax({
            url: "/controller/AjaxController.php",
            type: 'post',
            data: {id: id},
            beforeSend: function(xhr){
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(data){

                $(".content" + id).html(data);
                $("#show" + id).hide();
            }
        });
    });
});
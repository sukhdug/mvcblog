jQuery(document).ready(function () {
    $("button.delete_user").on("click", function (event) {
        var result = confirm("Вы уверены, что хотите удалить пользователя? Пользователь будет окончательно удален из БД");
        if (result == false) {
            event.preventDefault();
        }
    });
});
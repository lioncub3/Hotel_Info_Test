$(function () {
    //Форма сообщений
    var modal_message = $(".message-form");
    //переменная переключающая видимость формы сообщений
    var show_message = false;
    //
    
    showMessage();

    //Через 10 секунд открывает форму сообщений только один раз(пока куки не почистят)
    function showMessage(){
        if (Cookies.get("show_message") == undefined){
            setTimeout(function(){
                modal_message.show();
                Cookies.set("show_message", false);
            }, 10000);
        }
    }

    //Открытие и закрытие формы сообщений на кнопку в правом нижнем углу
    $(".message-button").click(function () {
        if (show_message == false) {
            modal_message.show();
            show_message = true;
            
        }
        else {
            modal_message.hide();
            show_message = false;
        }
    });

    //Закрытие формы сообщений на крестик на форме
    $(".message-close").click(function () {
        modal_message.hide();
        show_message = false;
    });

    var message_form = $(".message-form div div form");

    $("#whatsapp").click(function () {
        // $("#whatsapp").css("background", "green");
        message_form.show();
        $("#messageotelstatform-messanger").val("");
    });

    $("#telegram").click(function () {
        // $("#telegram").css("background", "green");
        message_form.show();
        $("#messageotelstatform-messanger").val("");
    });

    $("#viber").click(function () {
        // $("#viber").css("background", "green");
        message_form.show();
        $("#messageotelstatform-messanger").val($("#viber").val());
    });
});
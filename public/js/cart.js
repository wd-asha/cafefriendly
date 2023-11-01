$(function () {
    let
        quantityItem = $('.quantity-has-select'),
        total = $('#total');

    quantityItem.on('click', function () {
        $(this).addClass('quantity-select')
            .delay(500)
            .queue(function () {
                $(this).removeClass('quantity-select').dequeue()
            });

        if ($(this).text() === "+") {
            /*переводим текст в число*/
            quantityInt = parseInt($(this).prev().val());
            quantityInt = quantityInt + 1;
            /*запоминаем новое количество (для контроллера)*/
            $(this).prev().val(String(quantityInt));
            /*показываем сылку пересчета*/
            $(this).parent().next().show();
            /*прячем старые значения*/
            $(this).parent().next().next().hide();
            total.hide();
        }

        if ( ($(this).text() === "-") && (parseInt($(this).prev().prev().val()) > 1) ) {
            /*переводим текст в число*/
            quantityInt = parseInt($(this).prev().prev().val());
            quantityInt = quantityInt - 1;
            /*запоминаем новое количество (для контроллера)*/
            $(this).prev().prev().val(String(quantityInt));
            /*показываем сылку пересчета*/
            $(this).parent().next().show();
            /*прячем старые значения*/
            $(this).parent().next().next().hide();
            total.hide();
        }
    })

});
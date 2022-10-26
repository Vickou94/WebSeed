$(document).ready(function () {
    const btn = $('.btn_view');
    const details_view = $('.details_view');
    $(details_view).css('display', 'none');
    for (let i = 0; i < btn.length; i++) {
        $(btn[i]).click(function () {
            if ($(details_view[i]).css('display') === 'none') {
                $(details_view[i]).css('display', 'contents');
            } else {
                $(details_view[i]).css('display', 'none');
            }
            return false;
        });
    }
});
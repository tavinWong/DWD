/**
 * Created by user on 2016/2/18.
 */
$(document).ready(function(){
    $('#loginBtn').on('show.bs.popover',function(){
        $('#registerBtn').popover('hide');
    })
    $('#loginBtn').popover({
        html: true,
        placement: "bottom",
        content: function () {
            return $(this).parent().find('.loginForm').html();
        }
    })
    $('#registerBtn').on('show.bs.popover',function(){
        $('#loginBtn').popover('hide');
    })
    $('#registerBtn').popover({
        html: true,
        placement: "bottom",
        content: function () {
            return $(this).parent().find('.registerForm').html();
        }
    })
    $('#userBtn').popover({
        html: true,
        placement: "bottom",
        content: function (){
            return $(this).parent().find('.userInfo').html();
        }
    })
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    })
});

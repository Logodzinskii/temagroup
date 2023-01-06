$(document).ready(function(){
    $('.messages_cookies-close').click(function(){
        $('.messages_cookies').hide(100);
        document.cookie = "messages_cookies=true; max-age=31556926";
        return false;
    });
});

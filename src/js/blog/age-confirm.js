function imAdult(confirm){
    //deleteCookie('isAdult');
    setCookie("isAdult", confirm);
    if(confirm == true){
        $(".modal-age-dialog").hide();
    }else{
        location.reload();
    }
}
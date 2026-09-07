function blogNextPage()
{
    $("#blog-home-page").preloader({
        text: 'loading',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });

    let nextPage =  parseInt($("#blog-cur-page").val(), 10)+1;
    let onPage = 4;
    let blogCountArts = parseInt($("#blog-count-arts").val(), 10)
    let seeLeft = blogCountArts - nextPage*onPage;

    console.log($("#blog-cur-page").val());

    $.post(langSl+"/blog/filterhome",
        "curPage="+nextPage,
        function (data) {
            if(data.result == true){
                $(".blog-art-list").find(".blog-art-container").last().parent().after(data.viewData.listView);
                $(".blog-art-list").preloader("remove");
                $("#blog-cur-page").val(nextPage);
                if(seeLeft > 0){
                    $("#blog-see-left").html(seeLeft);
                }else{
                    $("#blog-see-more").hide();
                }
            }
        });
}
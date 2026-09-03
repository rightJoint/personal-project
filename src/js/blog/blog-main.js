$(document).ready(function (){
    blogPg();
})

function blogPg()
{
    $(".blog-pagination").find("span.p_num, span.p_btn").each(function () {
        $(this).on("click", function () {
            if ($(this).hasClass("active")) {
                //  alert("nothing");
            } else {
                $(".blog-pagination span.p_num").removeClass("active");
                $(".blog-pagination span.p_btn").removeClass("active");
                $(this).addClass("active");
                filterBlog();
            }
        });
    });
}

function filterBlog()
{
    var langSl = '/ru';

    $(".blog-art-list").preloader({
        text: 'loading',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });

    $.post(langSl+"/blog/filter",
        "filterCat="+$("#blog-filter-cat").val()+"&"+
        "filterArtName="+$("#blog-filter-artName").val()+"&"+
        "curPage="+$(".blog-pagination span.active").attr("page")+"&"+
        "sortField="+$("#blog-sort-field").val()+"&"+
        "sortOrder="+$("#blog-sort-order").val()+"&"+
        "onPage="+$("#blog-on-page").val()+"&"+
        "inRow="+$("#blog-in-row").val(),
        function (data) {
        if(data.result == true){
            $('.blog-art-list').html(data.viewData.listView);
            $('#blog-count-arts').html(data.viewData.blogCountArts);
            $('.blog-pagination').html(data.viewData.pg);
            $(".blog-art-list").preloader("remove");
            blogPg();
        }
    });
}
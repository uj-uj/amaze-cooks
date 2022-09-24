$(".category-card").click(function () {
    var v = $(this).attr("attr")
    console.log('val is', v);

    $(".category-poper-" + v).toggle(1000);

});

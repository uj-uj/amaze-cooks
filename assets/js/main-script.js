$(".category-card").click(function () {
    var g =$(this)
    console.log('g is ',g);
    var v = $(this).attr("attr")
    console.log('val is', v);
    $(".category-poper-" + v).toggle(1000);

});

$(".filter-button").click(function () {
    $(".filter-options").toggle(1000)
});




$(".show-contact").click(function (e) { 
  
//please implement api call here
  console.log('working!!');
  console.log( $(this).parent().siblings());
  
  var contact_info=$(this).parent().siblings()
  contact_info.toggleClass("contact-info");
 

  $(this).toggle();

  
});


function track_count(name){
  alert("hey "+name+"viewed account")

}

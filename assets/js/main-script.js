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
  var mobile_info=$(".mobile-info")
  console.log('yo',mobile_info);
  //please implement api call here
  console.log('working!!',mobile_info);
  console.log( $(this).parent());
  
  var contact_info=$(this).parent().siblings()
  var mobile_info=contact_info.children(".mobile-info")
  var phone_button=contact_info.children(".phone-button")
  cater_name = mobile_info.attr("cater-name")

  user_name = mobile_info.attr("user-name")

  console.log('cater name is',cater_name);
  contact_info.toggleClass("contact-info");
  Contact:  '.$row["mobile"].'

  $(this).toggle();
  jQuery.ajax({
    type: "POST",
    url: '/amaze-cooks1/auth1/functions.php',
    dataType: 'json',
    data: {functionname: "get_mobile_info", arguments: [cater_name]},
    success: function (obj, textstatus) {

                if( !('error' in obj) ) {
                    if(obj['result'] == "successful"){
                    mobile=obj['mobile'];
                    console.log('(got mobile as ',mobile);
                    console.log("successfull")
                    mobile_info.html("Contact : "+mobile);
                    phone_button.attr("action","tel:"+mobile)
                }
                else
                mobile_info.html("failed to load ");
                }
                else {
                    console.log(obj.error);
                }
            }
        });







  
});


function track_count(user_name,cater_name){
  // alert("hey "+user_name+" viewed account")
  
  

}

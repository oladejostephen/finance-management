$('input').change(function(e){
    var c = $(this).is(":checked");
    var i = parseInt($(this).attr('increment'));
    var current_value = parseInt($('span#increment-me').text());
    if (c){
        $('span#increment-me').text(current_value+i);
        console.log("this works")
    }else{
        $('span#increment-me').text(current_value-i);
    }
})

$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
})

let BaseRecordForAll = {
   mailer: function(value){
      var ajaxSetting = {
         method: 'post',
         url: '/mailer',
         data: {
            email: value,
         },
         success: function(data){
            //alert(data);
            var dataJson=JSON.parse(data);
            if(dataJson.mail) swal({
               title: "Сongratulations!",
               text: "'We sent a message to your email!",
               icon: "success",
             });
         },
         error: function(data) {
            console.log(data.responseText);
         },
      };
      $.ajax(ajaxSetting); 
   },   
};
    
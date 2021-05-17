$('document').ready(function(){
    var username_state = false;
    var email_state = false;
    $('#username').on('blur', function(){
     var username = $('#username').val();
     if (username == '') {
         username_state = false;
         return;
     }
     $.ajax({
       url: 'registration.php',
       type: 'post',
       data: {
           'username_check' : 1,
           'username' : username,
       },
       success: function(response){
         if (response == 'taken' ) {
             username_state = false;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_error");
             $('#username').siblings("span").text('Sorry... Username already taken');
         }else if (response == 'not_taken') {
             username_state = true;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_success");
             $('#username').siblings("span").text('Username available');
         }
       }
     });
    });		
    //  $('#email').on('blur', function(){
    //     var email = $('#email').val();
    //     if (email == '') {
    //         email_state = false;
    //         return;
    //     }
    //     $.ajax({
    //      url: 'register.php',
    //      type: 'post',
    //      data: {
    //          'email_check' : 1,
    //          'email' : email,
    //      },
    //      success: function(response){
    //          if (response == 'taken' ) {
    //          email_state = false;
    //          $('#email').parent().removeClass();
    //          $('#email').parent().addClass("form_error");
    //          $('#email').siblings("span").text('Sorry... Email already taken');
    //          }else if (response == 'not_taken') {
    //            email_state = true;
    //            $('#email').parent().removeClass();
    //            $('#email').parent().addClass("form_success");
    //            $('#email').siblings("span").text('Email available');
    //          }
    //      }
    //     });
    // });
   
    $('#reg_btn').on('click', function(){
        var name = $('#name').val();
        var username = $('#username').val();
        var role = $('#email').val();
        var uid = $('#uid').val();
        if (username_state == false) {
         $('#error_msg').text('Fix the errors in the form first');
       }else{
         // proceed with form submission
         $.ajax({
             url: 'registration.php',
             type: 'post',
             data: {
                 'save' : 1,
                 'name' : name,
                 'username' : username,
                 'password' : password,
                 'role' : role,
                 'uid' : uid,
             },
             success: function(response){
                 alert('user saved');
                 $('#name').val('');
                 $('#username').val('');
                 $('#email').val('');
                 $('#password').val('');
                 $('#role').val('');
                 $('#uid').val('');
             }
         });
        }
    });
   });
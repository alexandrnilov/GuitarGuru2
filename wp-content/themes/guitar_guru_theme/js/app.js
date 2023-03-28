$('document').ready(function(){

  $('#reg-btn').on('click',function(e){
    $.ajax({
      type: 'POST',
      data: {
        action: 'userReg',
        email: $('#reg-form [name="email"]').val(),
        pass: $('#reg-form [name="pass"]').val(),
        pass2: $('#reg-form [name="pass2"]').val()
      },
      url: app_obj.url+'users.php',
      success: function(success){
        var jsonData = JSON.parse(success);
        if (jsonData.result == '1' )location.reload();
      }
    });
    return false;
  });

  $('#log-btn').on('click',function(e){
    $.ajax({
      type: 'POST',
      data: {
        action: 'userLog',
        email: $('#log-form [name="email"]').val(),
        pass: $('#log-form [name="pass"]').val(),
      },
      url: app_obj.url+'users.php',
      success: function(success){
        var jsonData = JSON.parse(success);
        if (jsonData.result == '1' )location.reload();
      }
    });
    return false;
  });

  $('#exit-btn').on('click',function(e){
    $.ajax({
      type: 'POST',
      data: {
        action: 'userExit'
      },
      url: app_obj.url+'users.php',
      success: function(success){
        location.reload();
      }
    });
    return false;
  });
});

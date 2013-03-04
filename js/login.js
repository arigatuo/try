window.loginFunc = {
  userLogin : function(username, pwd){
      if(username.length>0 && pwd.length>0){
          $.getJSON(siteSettings.baseUrl+"main/Ajax/UserLogin", {username:username,pwd:pwd}, function(returnVal){
              if(returnVal != null && returnVal.length > 0 && returnVal[0] > 0){
                  $(".loginUsername").html(returnVal[1]);
                  $(".loginUserHead").val("http://bbs.lady8844.com/uc_server/avatar.php?uid="+returnVal[0]+"&size=middle");
                  $(".loginInfo").html(returnVal[2]);
                  $('#pwd').val('');
                  $(".beforeLogin").hide();
                  $(".afterLogin").show();
              }else{
                  window.alert('登录失败');
                  $('#pwd').val('');
              }
          });
      }else{
          window.alert('请输入用户名和密码');
      }
  },
  userLogout: function(){
      $.getJSON(siteSettings.baseUrl+"main/Ajax/UserLogout", {}, function(returnVal){
          if(returnVal!=null && returnVal.length>0){
              $('.loginInfo').html(returnVal);
          }
          $(".afterLogin").hide();
          $(".beforeLogin").show();
      });
  }
};

$(function(){
    $("#loginSubmit").click(function(){
        loginFunc.userLogin($("#username").val(), $("#pwd").val());
    })
    $("#logoutSubmit").click(function(){
       loginFunc.userLogout();
    });
})
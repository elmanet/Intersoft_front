<script type="text/javascript">
      $(function(){
 
        $("input[name=username]").keyup(function(e){
          var username = $(this).val();
          var status=$("#status");
 
          status.removeClass("checked").removeClass("error")
          if(username.length > 0){
            $.ajax({
              type:"POST",
              url:"checking.php",
              data:"username="+username,
              dataType:"json",
              beforeSend:function(){
                  status.html("Buscando...");
              },
              success:function(response){
                  if(response.valid==true){
                    status.addClass("checked");
                  }else{
                    status.addClass("error");
                  }
                  status.html(response.msg);
              }
            })
          }else{
              status.html("Ingrese un usuario");
          }
 
        });
 
      })
    </script>
    <style type="text/css">
 	#status{
        color:#555555;
        font-weight:bold;
        padding-bottom:2px;
        padding-left:16px;
      }
 
      #status.checked{
        background:url("images/site/check.png") no-repeat scroll 0 0 transparent;
        background-size:16px;
        color:#3581CC;
      }
      #status.error{
        background:url("images/site/error.png") no-repeat scroll 0 0 transparent;
        background-size:16px;
        color:#EA5200;
      }
    </style>


$(document).ready(function() {

 
  $(".btn").click(function () {
        let method = $(this).attr("data-method");
        let url = 'http://' + window.location.host + `/api/`;
        let data = {
            "jsonrpc": "2.0", 
            "method": method, 
            "params": [42, 23], 
            "id": 1
        };

        $.ajax({
          method: "GET",
          url: url,
          headers: {
            "Content-Type": "application/json"
          },

          dataType: "json",
          data: data,
          success: function (data) {
            if (data.id == 1) {
                $(".result").empty().append(data.result);
                
            }
            
            
          },
          error: (xhr, ajaxOptions, thrownError) => {
            console.warn(xhr.responseText)
            console.log(thrownError);


          },
          statusCode: {
            200: function () {
              console.log( "Ok" );
            },
            400: function () {
              console.log( "notOk" );
            }
          }
        });


  });

});

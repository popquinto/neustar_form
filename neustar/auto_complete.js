function showName(str){ //Function called from index.php in onclick action
    var hostname = $('#inputHostname').val();
    var ip = $('#inputIp').val();

    $.ajax({
      type: "POST",
      url: '../neustar/classes/GetAndInsertData.php',
      dataType: 'json',
      data: { 
            'hostname': hostname, 
            'ip': ip
        },
          
          success: function(data) {
            data = $.parseJSON(JSON.stringify(data));
            if (data['status'] == 'Denied'){ //Ask if the hostname was not duplicated
              alert('Could not insert duplicate dns!');//Tell user he can't insert duplicate dns
            }
            $('#table tbody').empty();
            $.each(data['Result'], function(i, item) {// Populate table html with our json response from DB
                var $tr = $('<tr>').append(
                    $('<td>').text(item.hostname),
                    $('<td>').text(item.ip)
                ).appendTo('#table');
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { //Error handling
             console.log(errorThrown);
          }
        });

}
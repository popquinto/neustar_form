function showName(str){ //Function called from index.php in onclick action
    var hostname = $('#inputHostname').val();
    var ip = $('#inputIp').val();
    if (hostname == '' || ip == '') {
      alert('Please enter valid data');
    } else {
        $.ajax({
        type: "POST",
        url: '../neustar/classes/GetAndInsertData.php',
        dataType: 'json',
        data: { 
              'hostname': hostname, 
              'ip': ip,
              'action': 'insert'
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
              $('#inputHostname').val('');
              $('#inputIp').val('');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { //Error handling
               console.log(errorThrown);
            }
          });
    }
}

function search(hostname){
    var inputDnsSearch = $('#inputDnsSearch').val();

    $.ajax({
      type: "POST",
      url: '../neustar/classes/GetAndInsertData.php',
      dataType: 'json',
      data: { 
            'hostname': inputDnsSearch,
            'action': 'search'
        },
          
          success: function(data) {
            console.log(data);
            if (data['status'] == 'Hostname not found'){ //Ask if the hostname was not found
                alert('DNS not found! \n Try another one');//Tell user dns provided was not found
                $('#inputDnsSearch').val('');
                $('#table tbody').empty();
                $('#inputDnsSearch').focus();
              }
            else {
                $('#table tbody').empty();
                alert('DNS found!');
                $.each(data['Result'], function(i, item) {// Populate table html with our json response from DB
                    var $tr = $('<tr>').append(
                        $('<td>').text(item.hostname),
                        $('<td>').text(item.ip)
                    ).appendTo('#table');
                });
                $('#inputDnsSearch').val('');
                $('#inputDnsSearch').focus();
            }            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { //Error handling
             console.log(errorThrown);
          }
        });
}
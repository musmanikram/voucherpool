function getRecipients(){

    /*$.ajax({
        type: 'GET',
        url: apiUrl+'recipients',
        dataType: 'json',
        success: function(response) {
            return response;
        },
        error: function(error) {
            console.log(error);
        }
    });*/


    var recipients = sendRequest('GET','recipients',null);
    //alert(recipients);

    $('#recipients-table > tbody').append(
        $.map(recipients.data, function (recipient, index) {
            return '<tr><td>' + recipient.name + '</td><td>' + recipient.email + '</td></tr>';
        }).join()
    );

}


function getAllRecipients(){

    var recipients = sendRequest('GET','recipients',null);

    $('#recipients-table > tbody').append(
        $.map(recipients.data, function (recipient, index) {
            return '<tr>' +
                        '<td>' + (index+1) + '</td>' +
                        '<td>' + recipient.name + '</td>' +
                        '<td>' + recipient.email + '</td>' +
                        '<td><a href="recipient-details.php?id=' + recipient.id + '">details</a></td>' +
                '</tr>';
        }).join()
    );

}

function getSingleRecipient(recipientId){

    var recipients = sendRequest('GET','recipients/'+recipientId,null);

    $('#recipients-vouchers > tbody').append(
        $.map(recipients.data.vouchers, function (voucher, index) {
            return '<tr>' +
                '<td>' + (index+1) + '</td>' +
                '<td>' + voucher.code + '</td>' +
                '<td>' + voucher.expiry_date + '</td>' +
                '<td>' + voucher.is_used + '</td>' +
                '</tr>';
        }).join()
    );

}


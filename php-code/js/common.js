function sendRequest(type,url,data){
    var returnResponse;
    $.ajax({
        type: type,
        url: apiUrl+url,
        dataType: 'json',
        async: false,
        success: function(response) {
            returnResponse = response;
        },
        error: function(error) {
            console.log(error);
        }
    });

    return returnResponse;

}
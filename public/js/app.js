
function hacerCambio(divById ,url)
{
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        after: function(){

        },
        success: function(data){

            $("#"+divById).html("");
            $("#"+divById).html(data);
        }
    });
}

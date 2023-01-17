$( "#form" ).submit(function( event ) {
    event.preventDefault();
    let name = ( $("#name").val() )
    let price = ( $("#price").val() )
    let table = ($("#table"));
    let lastId = $("#table tr td[data-id]").last().data('id')
    if (!lastId) {
        lastId = 1;
    } else {
        lastId += 1;
    }
    jsonData = {name: name, price: price}
    $.post( "add", jsonData )
        .done(function() {
            table.append(`<tr><td data-id=`+lastId+`>` +lastId+ `</td><td>`+name+`</td><td>`+price+`</td></tr>`);
        }
    );
    
});

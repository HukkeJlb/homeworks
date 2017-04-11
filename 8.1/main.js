var button = $('#submit');
button.on('click', function () {
    var title = $('input[name=title]').val();

    $.ajax({
        url: 'rest.php',
        method: 'GET',
        data: {
            title: title
        },
        dataType: 'json'
    }).done(function (data) {
        console.log(data);
    });
})
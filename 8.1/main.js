var button = $('#submit');
button.on('click', function () {

    $.ajax({
        cache: false,
        url: 'rest.php',
        method: 'GET',
        dataType: 'json'
    }).done(function (table) {
        goods = '<table class="table table-bordered"><tr><th>Категория</th><th>Артикул</th><th>Название</th><th>Бренд</th><th>Описание</th><th>Цена</th><th width="90">Скидка, %</th><th>Количество покупок</th></tr>';
        for (var key = 0; key < table.length; key++) {
            goods += '<td>' + table[key].category.name + '</td>';
            goods += '<td>' + table[key].article + '</td>';
            goods += '<td>' + table[key].name + '</td>';
            goods += '<td>' + table[key].brand + '</td>';
            goods += '<td>' + table[key].description + '</td>';
            goods += '<td>' + table[key].price + '</td>';
            goods += '<td>' + table[key].discount + '</td>';
            goods += '<td>' + table[key].purchased + '</td></tr>';
        }
        goods += '</table>';
        $('#goods').html(goods);
    });
})
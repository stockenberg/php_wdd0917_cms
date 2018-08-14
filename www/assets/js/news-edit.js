

$('h2').dblclick(function (ev) {
    var h2 = $(this);
    var content = h2.html();

    $(this).remove();
    
    $('.container-fluid').prepend('<div id="edit">' +
        '<label>Edit Content</label>' +
        '<input type="text" name="" id="headline" class="form-control" value="' + content + '" />' +
        '<button id="save">Save it!</button></div>');

    $('#save').click(function () {
        var headline = $('#headline').val();

        $.ajax({
            url: 'http://localhost:4567/app/api.php?case=update-news',
            method: 'POST',
            data: {headline: headline, id: location.search.split('id=')[1]}
        }).then(function (res) {
            console.log(JSON.parse(res));
            console.log(headline);
            $('#edit').remove();
            $('.container-fluid').prepend('<h2>'+headline+'</h2>');
        });
    })

});


$("#search").on('click', function (e) {
    e.preventDefault();
    var data = {};
    data['input'] = $('#input').val();
    $.ajax({
        url: '/home',
        type: 'post',
        data: data,
        success: function (data) {

        }
    });
});

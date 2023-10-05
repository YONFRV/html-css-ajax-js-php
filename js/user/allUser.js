$(document).ready(function () {
    $.ajax({
        url: '../include/user/allUser.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var tableBody = $('#user-table');
            tableBody.empty();
            $.each(data, function (index, user) {
                var row = '<tr>' +
                    '<td>' + user.name + '</td>' +
                    '<td>' + user.email + '</td>' +
                    '<td><button>Edit</button></td>' + 
                    '</tr>';
                tableBody.append(row);
            });
        },
        error: function () {
            alert('Error al obtener los datos de los usuarios');
        }
    });
});
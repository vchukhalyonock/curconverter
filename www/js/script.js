$(document).ready(() => {
        $('#inputUSD').keypress((key) => {
                if (key.charCode < 48 || key.charCode > 57) return false;
            }
        );

        $('#convertButton').click(() => {
            $.ajax({
                contentType: 'application/json',
                data: {
                    value: $('#inputUSD').val()
                },
                dataType: 'json',
                method: 'post',
                url: '/index.php',
                success: (data) => {
                    $('#outputRMB').value(data.result);
                }
            });
        });
    }
);
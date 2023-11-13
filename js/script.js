$(document).ready(function(){
    $('#bnt_auth').on('click', function () {
        let user = $("#email").val();
        let pass = $("#password").val();

        $.ajax({
            type: "POST",
            url: "login.php",
            dataType: "json",
            data: {
                user: user,
                pass: pass
            },
            success: function (response) {
                if (response.success) {
                    // Redireciona para a página desejada em caso de sucesso
                    window.location.href = "telaprincipal.php";
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                // Exibe mensagens de erro no console em caso de falha na requisição
                alert(xhr.responseJSON.message);
            }
        });
    });

});
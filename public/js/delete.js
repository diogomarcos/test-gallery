$(document).ready(function () {
    $('.delete').click(function (e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var parent = $(this).parent("td").parent("tr");

        bootbox.dialog({
            message: "Tem certeza de que deseja excluir a foto?",
            title: "<i class='icon-trash'></i> Excluir Foto",
            buttons: {
                success: {
                    label: "Não",
                    className: "btn-success",
                    callback: function () {
                        $('.bootbox').modal('hide');
                    }
                },
                danger: {
                    label: "Sim",
                    className: "btn-danger",
                    callback: function () {
                        $.post('/delete', {'id': id})
                            .done(function (response) {
                                // bootbox.alert(response);
                                parent.fadeOut('slow');
                                location.reload();
                            })
                            .fail(function () {
                                bootbox.alert('Ocorreu algum erro...');
                            })

                    }
                }
            }
        });
    });
});
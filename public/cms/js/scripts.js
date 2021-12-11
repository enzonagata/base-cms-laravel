function loadPreview(input, width, height) {
    var img = document.getElementById('output');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            specificCrop(e.target.result, width, height, function (image) {
                img.src = image;
                document.getElementById("base64").innerHTML = image;
            });
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        img.src = '';
    }
}

$(function () {
    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };

    $('.phone').mask(maskBehavior, options);
    $('.money').mask('00000000.00', { reverse: true });
})

$(function () {

    //Inicializa o mulselect
    $('#select_categories').select2();

    var stringNotSaving = '<i class="fas fa-save"></i> Salvar';
    var stringSaving = 'Salvando...';

    //Para cadastro de informacoes
    if ($('form#form_cadastre').length > 0) {
        $('form#form_cadastre').submit(function (e) {
            var url = $(this).attr('action');
            var serialize = $(this).serialize();
            var form = $(this);
            var reload = $(this).data('reload');
            $.ajax({
                url: url,
                type: 'post',
                data: serialize,
                beforeSend: function () {
                    $("button[type='submit']").attr('disabled', 'true');
                    $("button[type='submit']").html(stringSaving);
                },
                success: function (response) {
                    if (response.status == 200) {
                        new PNotify({
                            title: 'Sucesso!',
                            text: 'Informações salvas com sucesso!',
                            type: 'success'
                        });
                        setTimeout(function () {
                            location.href = reload;
                        }, 2000);
                    }
                },
                complete: function () {
                    $("button[type='submit']").attr('disabled', 'false');
                    $("button[type='submit']").html(stringNotSaving);
                },
                error: function () {
                    new PNotify({
                        title: 'Erro!',
                        text: 'Ocorreu um erro ao atualizar.',
                        type: 'error'
                    });
                }
            })
            return false;
        });
    };


    //Inicializar Datatable
    var datatableInit = function () {
        var table = $('#datatable-default');
        var url_lista = table.data('list');
        var url_edit = table.data('edit');
        var url_delete = table.data('delete');
        var cols = table.data('cols');

        var DataTable = table.DataTable({
            "processing": true,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_ registros por página",
                "zeroRecords": "Nenhuma informação cadastrada",
                "info": "Exibindo _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(Filtrado de _MAX_ do total de registros)",
                "sSearch": "Pesquisar",
                "paginate": { "previous": "Anterior", "next": "Próxima" }
            },
            ajax: {
                "url": url_lista,
            },
            columns: cols,
            columnDefs: [{
                "targets": -1,
                "render": function (xhr, type, row, meta) {
                    return " <a href='" + url_edit + "/" + row['id'] + "'>\n" +
                        "<i class='fas fa-edit'></i>\n" +
                        "</a>\n" +
                        "<a href='" + url_delete + '/' + row['id'] + "' class=\"on-default remove-row\">\n" +
                        "<i class='far fa-trash-alt'></i>" +
                        "</a>";
                }
            }]
        });

        $(document).on('click', '.remove-row', function (e) {
            e.preventDefault();
            if (confirm("Deseja realmente apagar esse registro?")) {
                //Remover a linha
                DataTable
                    .row($(this).parents('tr'))
                    .remove()
                    .draw();
                var href = $(this).attr('href');

                $.ajax({
                    url: href,
                    type: 'get',
                    success: function (response) {
                        new PNotify({
                            title: 'Sucesso!',
                            text: 'Excluido com sucesso!',
                            type: 'success'
                        });
                    },
                    error: function () {
                        new PNotify({
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao excluir.',
                            type: 'error'
                        });
                    },
                    complete: function () {
                        DataTable.ajax.reload();
                    }
                });
                return true;
            } else {
                e.preventDefault();
                return false;
            }
        });
    };

    //Inicializar Datatable
    var datatableInitNoDelete = function () {
        var table = $('#datatable-default-nodelete');
        var url_lista = table.data('list');
        var url_edit = table.data('edit');
        var url_delete = table.data('delete');
        var cols = table.data('cols');

        var DataTable = table.DataTable({
            "processing": true,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_ registros por página",
                "zeroRecords": "Nenhuma informação cadastrada",
                "info": "Exibindo _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(Filtrado de _MAX_ do total de registros)",
                "sSearch": "Pesquisar",
                "paginate": { "previous": "Anterior", "next": "Próxima" }
            },
            ajax: {
                "url": url_lista,
            },
            columns: cols,
            columnDefs: [{
                "targets": -1,
                "render": function (xhr, type, row, meta) {
                    return " <a href='" + url_edit + "/" + row['id'] + "'>\n" +
                        "<i class='fas fa-edit'></i>\n" +
                        "</a>\n";
                }
            }]
        });
    };

    $(function () {
        datatableInit();
        datatableInitNoDelete();
        $('.summernote').summernote({
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            },
            height: 300,
            minHeight: 300,
            
        });
    });

    //remover imagem principal
    $('a#remove_image_default').on('click', function () {
        $('#output').attr('src', '');
        $(this).hide();
        $('input[name="remove_image_default"]').val('1');
    })

});
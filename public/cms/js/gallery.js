// Multiple images preview in browser
var template = $('#thumb_template').html();
var imagesPreview = function (input, placeToInsertImagePreview, id) {
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var images = {};
                Mustache.parse(template);
                resizeOriginal(e.target.result, 1000, 1000, images, function (original, images) {
                    images.original = original;
                    resizeThumb(original, images, function (thumb, images) {
                        images.thumb = thumb;
                        var rendered = Mustache.render(template,
                            {
                                thumb: images.thumb,
                                original: images.original
                            }
                        );
                        $(placeToInsertImagePreview).append(rendered);
                    });
                });
            }
            reader.onprogress = function (data) {
                console.log(data);
                if (data.lengthComputable) {
                    var progress = parseInt(((data.loaded / data.total) * 100), 10);
                    console.log(progress);
                    $("#progressBar").text(progress + ' %');
                    $("#progressBar").css('width', progress + '%');
                }
            }
            reader.readAsDataURL(input.files[i]);
        }
    }

};

//Adicionar gatilhi
$(document).on("change", '.gallery-photo-add', function () {
    var uniqid = $(this).attr('data-id');
    imagesPreview(this, 'div.gallery', uniqid);
});

//Remover item da galeria
$(document).on("click", '#gallery_item_remove', function () {
    var id_image = $(this).data('id');
    $(this).parent().remove();
    $("#gallery_item_remove_image").append('<input type="hidden" name="image_gallery_remove[]" value="' + id_image + '">');
});


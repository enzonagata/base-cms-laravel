function resizeOriginal(base64, wantedWidth, wantedHeight, images, callback) {
    //Criamos um elemento de imagem apra receber a imagem base64
    var img = document.createElement('img');
    var dataURL;

    //Quando o evento OnLoad é acionado, redimencionamos a imagem;
    img.onload = function () {
        //Criamos o Canvas e pegamos seu context
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');

        //Verificamos o tomanho da imagem, para redimensionarmos propocionalmente
        if (img.width > wantedWidth)
            var ratio = wantedWidth / img.width
        else if (img.height > wantedHeight)
            var ratio = wantedHeight / img.height
        else
            var ratio = 1;

        //Seta os novos tamanhos da imagem
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        //Aqui redimensionamos a imagem com o methodo canvas drawImage();
        ctx.drawImage(this, 0, 0, canvas.width, canvas.height);
        callback(canvas.toDataURL("image/jpeg"), images);
    };
    // We put the Data URI in the image's src attribute
    img.src = base64;
}

function resizeThumb(base64, images, callback) {
    var copyImg = document.createElement('img');
    copyImg.onload = function () {
        //Copia
        var copyCanvas = document.createElement('canvas');
        var copyCtx = copyCanvas.getContext('2d');
        var MAX_WIDTH = 540;
        var MAX_HEIGHT = 370;
        copyCanvas.width = copyCanvas.height = MAX_WIDTH || MAX_WIDTH;
        copyCtx.drawImage(this, ...getWidthHeight(this, MAX_WIDTH));
        //image.thumb = copyCanvas.toDataURL();
        callback(copyCanvas.toDataURL("image/jpeg"), images)
    }
    copyImg.src = base64;
}

//Redimensionar e cortar
function resizeCrop(base64, wantedWidth, wantedHeight, images, callback) {
    var copyImg = document.createElement('img');
    copyImg.onload = function () {
        //Copia
        var copyCanvas = document.createElement('canvas');
        var copyCtx = copyCanvas.getContext('2d');
        var MAX_WIDTH = wantedWidth;
        var MAX_HEIGHT = wantedHeight;
        copyCanvas.width = copyCanvas.height = MAX_WIDTH || MAX_WIDTH;
        var getSize = getWidthHeight(this, MAX_WIDTH);
        copyCtx.drawImage(this, getSize[0], getSize[1], getSize[2], getSize[3]);
        //image.thumb = copyCanvas.toDataURL();
        callback(copyCanvas.toDataURL("image/jpeg"), images)
    }
    copyImg.src = base64;
}

function specificCrop(base64, wantedWidth, wantedHeight,callback) {
    var copyImg = document.createElement('img');
    copyImg.onload = function () {
        //Copia
        var copyCanvas = document.createElement('canvas');
        var copyCtx = copyCanvas.getContext('2d');
        var MAX_WIDTH = wantedWidth;
        var MAX_HEIGHT = wantedHeight;
        copyCanvas.width = MAX_WIDTH
        copyCanvas.height = MAX_HEIGHT;
        copyCtx.imageSmoothingQuality = 'low';

        if (copyCanvas.width > copyCanvas.height) {
            var getSize = getWidthHeightCrop(copyImg, MAX_WIDTH, MAX_HEIGHT);
        } else {
            var getSize = getWidthHeightCrop(copyImg, MAX_WIDTH, MAX_HEIGHT);
        }
        copyCtx.drawImage(this, getSize[0], getSize[1], getSize[2], getSize[3]);
        //image.thumb = copyCanvas.toDataURL();
        callback(copyCanvas.toDataURL("image/jpeg"))
    }
    copyImg.src = base64;
}

//Tamanhos para cortar imagem
var getWidthHeightCrop = function (img, wantedWidth, wantedHeight) {
    var imgWidth = img.width;
    var imgHeight = img.height;

    if (imgWidth > imgHeight) {
        console.log('1');
        //Finalizado
        //Se a imagem selecionada for de largura maior que a altura
        //Se a altura for maior do que a proposta
        if (wantedWidth < imgWidth) {
            console.log('2');
            var ratioW = wantedWidth / imgWidth;
            var ratioH = wantedHeight / imgHeight;

            if ((wantedHeight * ratioW) >= imgHeight) {
                console.log('3');
                var left = (wantedWidth - (imgWidth * ratioH)) / 2;
                return [left, 0, imgWidth * ratioH, wantedHeight];
            } else if ((wantedHeight * ratioW) <= imgHeight) {
                console.log('4');
                var top = (wantedHeight - (imgHeight * ratioW)) / 2;
                return [0, top, wantedWidth, imgHeight * ratioW];
            } else if ((wantedWidth * ratioH) <= imgWidth) {
                console.log('5');
                var top = (wantedHeight - (imgHeight * ratioW)) / 2;
                return [0, top, wantedWidth, imgHeight * ratioW];
            } else {
                console.log('6');
                return [0, 0, wantedWidth, wantedHeight];
            }

        } else if (wantedWidth > imgWidth) {
            console.log('7');
            //Proporção do tamanho original com o tamanho pedido
            var ratioW = wantedWidth / imgWidth;
            var ratioH = wantedHeight / imgHeight;
            //Se a altura da imagem redimensionada for menor que a altura pedida
            if ((imgHeight * ratioW) > wantedHeight) {
                console.log('8');
                var top = (wantedHeight - (imgHeight * ratioW)) / 2;
                return [0, top, wantedWidth, imgHeight * ratioW];
            } else if ((imgHeight * ratioW) < wantedHeight) {
                console.log('8');
                var left = ((imgWidth * ratioH) - wantedWidth) / 2;
                return [-left, 0, imgWidth * ratioH, wantedHeight];
            } else {
                console.log('10');
                return [0, 0, wantedWidth, wantedHeight];
            }
        }else if(wantedWidth == imgWidth){
            console.log('23');
            var ratioW = wantedWidth / imgWidth;
            var ratioH = wantedHeight / imgHeight;
            var top = (wantedHeight - (imgHeight * ratioW)) / 2;
            return [0, top, wantedWidth, imgHeight * ratioW];
        } else {
            console.log('22');
            return [0, 0, wantedWidth, wantedHeight];
        }
    } else if (imgWidth < imgHeight) {
        console.log('11');
        //Se a largura da imagem selecionada for menor que a altura
        //Se a altura for maior do que a proposta
        if (wantedHeight < imgHeight) {
            console.log('12');
            var ratioW = wantedWidth / imgWidth;
            var ratioH = wantedHeight / imgHeight;
            if ((wantedHeight * ratioW) > imgHeight) {
                console.log('13');
                var left = (wantedWidth - (imgWidth * ratioH)) / 2;
                return [left, 0, imgWidth * ratioH, wantedHeight];
            } else if ((wantedHeight * ratioW) < imgHeight) {
                console.log('14');
                var left = (wantedWidth-(imgWidth * ratioH)) / 2;
                return [left, 0, imgWidth * ratioH, wantedHeight];
            } else {
                console.log('15');
                return [0, 0, wantedWidth, wantedHeight];
            }

        } else if (wantedHeight > imgHeight) {
            console.log('16');
            //Proporção do tamanho original com o tamanho pedido
            var ratioW = wantedWidth / imgWidth;
            var ratioH = wantedHeight / imgHeight;
            //Se a altura da imagem redimensionada for menor que a altura pedida
            if ((imgHeight * ratioW) > wantedHeight) {
                console.log('17');
                var top = (wantedHeight - (imgHeight * ratioW)) / 2;
                return [0, top, wantedWidth, imgHeight * ratioW];
            } else if ((imgHeight * ratioW) < wantedHeight) {
                console.log('18');
                var left = ((imgWidth * ratioH) - wantedWidth) / 2;
                return [-left, 0, imgWidth * ratioH, wantedHeight];
            } else {
                console.log('19');
                return [0, 0, wantedWidth, wantedHeight];
            }
        } else {
            console.log('20');
            return [0, 0, wantedWidth, wantedHeight];
        }


    } else {
        console.log('21');
        //Caso a imagem seja quadrada
        var ratioW = wantedWidth / imgWidth;
        var ratioH = wantedHeight / imgHeight;
        if (wantedWidth > imgWidth) {
            console.log('22');
            var top = ((imgWidth * ratioH) - wantedWidth) / 2;
            return [0, top, wantedWidth, imgHeight * ratioW];
        } else if (wantedWidth < imgWidth) {
            console.log('23');
            var left = ((imgHeight * ratioW) - wantedHeight) / 2;
            return [left, 0, imgWidth * ratioH, wantedHeight];

        }
    }
};

// Returns a promise that resolves to the cropped
var getWidthHeight = function (img, side) {
    var width = img.width;
    var height = img.height;

    if (width === height) {
        return [0, 0, side, side];
    } else if (width < height) {
        var rat = height / width;
        var top = (side * rat - side) / 2;
        return [0, -1 * top, side, side * rat];
    } else {
        var rat = width / height;
        var left = (side * rat - side) / 2;
        return [-1 * left, 0, side * rat, side];
    }
};
function giphyPluginChangeImage(imgId, term) {
    setInterval(function() {
      // Llama a la API de Giphy para obtener una imagen de la categoría 'animals'
    var apiUrl = "http://api.giphy.com/v1/gifs/random?api_key=YOUR_API_KEY&tag=" + term;
    jQuery.getJSON(apiUrl, function(data) {
        // Obtiene la URL de la imagen de Giphy

        // Actualiza la imagen en el elemento HTML correspondiente al ID único
        jQuery('#' + imgId).attr('src', imgUrl);
});
    }, 10000); // Cambiar la imagen cada 10 segundos
}
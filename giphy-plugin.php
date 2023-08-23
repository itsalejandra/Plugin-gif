<?php
/**
 * Mi plugin 2.0
 *
 * @package           Mi plugin 2.0
 * @author            Alejandra Sanchez
 * @copyright         2023 Alejandra Sanchez Lorenzo
 * @license           GPL-2.0-or-later
 * @link              https://github.com/itsalejandra/plugin2.0.git
 * @author            itsalejandra
 *
 * @wordpress-plugin
 * Plugin Name:       Mi plugin 2.0
 * Plugin URI:        https://example.com/plugin-name
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alejandra Sanchez Lorenzo
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */
// Función para mostrar los GIFs de Giphy relacionados con animales
function giphy_shortcode($atts) {
    // Define el término de búsqueda para animales
    $term = 'animals';

    // Realiza la llamada a la API de Giphy
    $url = "http://api.giphy.com/v1/gifs/random?api_key=nUxCG7pA3P3b3W393dZ8UUvNPuZs83bI&tag=" . urlencode($term);
    $response = wp_remote_get($url);

    // Verifica si la llamada a la API fue exitosa
    if (is_wp_error($response)) {
        return "Error en la llamada a la API de Giphy.";
    }

    // Decodifica la respuesta JSON de la API de Giphy
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    // Obtiene la URL del GIF de Giphy
    $gif_url = $data->data->images->original->url;

    // Muestra el GIF en la página
    return "<img src='" . $gif_url . "' alt='Giphy GIF'>";
}
add_shortcode('giphy', 'giphy_shortcode');
?>

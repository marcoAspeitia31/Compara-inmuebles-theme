<?php
/**
 * Template part for displaying a descripcion del inmueble form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>
<h2>Localización</h2>
<div class="row">
  <div class="col-12">
    <h6>Dirección del inmuebles</h6>
    <div class="input-item input-item-name ltn__custom-icon">
        <input type="text" name="ubicacion" id="direccion_inmueble" placeholder="Calle falsa 123">
        <div id="direcciones_sugerencias"></div>
    </div>
  </div>
  <div class="col" class="property-details-google-map mb-60" style="height: 400px;" id="map">
  <div>
</div>
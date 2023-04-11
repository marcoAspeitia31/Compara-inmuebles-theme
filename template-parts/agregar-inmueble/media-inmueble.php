<?php
/**
 * Template part for displaying a media del inmueble form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>
<h2>Media del inmueble</h2>
<div class="row">
  <div class="col-md-6">
    <h6>Imagen destacada</h6>
    <input type="file" id="imagen_destacada" name="imagen_destacada" class="btn theme-btn-3 mb-10"><br>
    <p>
        <small>* At least 1 image is required for a valid submission.Minimum size is 500/500px.</small><br>
    </p>
  </div>
  <div class="col-md-6">
    <h6>Galeria de imagenes</h6>
    <input type="file" id="galeria_imagenes" name="galeria_imagenes" multiple="multiple" class="btn theme-btn-3 mb-10">
    <p>
        <small>* Se deben de seleccionar todas las imagenes al mismo tiempo al subir.</small><br>
    </p>
  </div>
  <div class="col-md-6">
    <h6>Imagenes slider</h6>
    <input type="file" id="imagenes_slider" name="imagenes_slider" multiple="multiple" class="btn theme-btn-3 mb-10">
    <p>
        <small>* Se deben de seleccionar todas las imagenes al mismo tiempo al subir.</small><br>
    </p>
  </div>
  <div class="col-md-6">
      <h6>Link de YouTube video del inmueble (opcional)</h6>
      <div class="input-item input-item-name ltn__custom-icon">
          <input type="text" name="ltn__name" placeholder="https://www.youtube.com/watch?v=ZsV8aj0LKs4">
      </div>
  </div>
</div>
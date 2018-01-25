<?php
//kpr(get_defined_vars());
//http://drupalcontrib.org/api/drupal/drupal--modules--node--node.tpl.php
//node--[CONTENT TYPE].tpl.php

//$content['field_name']['#theme'] = "nomarkup";
//hide($content['field_name']);
if ($classes) {
  $classes = ' class="'. $classes . ' "';
}

if ($id_node) {
  $id_node = ' id="'. $id_node . '"';
}

hide($content['comments']);
hide($content['links']);
?>

<!-- node.tpl.php -->
<article <?php print $id_node . $classes .  $attributes; ?> role="article">


  <div class="lp-left">

    <figure class="logo--ilives">

      <img src="http://via.placeholder.com/350x150">
      <figcaption>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis urna tellus, vel laoreet magna feugiat nec. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam nibh risus, eleifend at consectetur vitae, pulvinar et quam. Sed et ligula egestas, laoreet libero nec, malesuada diam. Donec id bibendum nisi, vitae aliquet nulla. Fusce maximus, enim id scelerisque vulputate, metus turpis rhoncus ipsum, at fermentum nisl neque et elit. Morbi nunc urna, tincidunt ac eleifend ac, dignissim convallis ipsum. Suspendisse laoreet euismod lacus nec porttitor. Proin a lorem cursus, porta tortor et, euismod justo. Praesent sed ligula nec augue egestas commodo. Mauris sagittis porttitor cursus. Nunc fermentum efficitur hendrerit. Sed bibendum varius urna et faucibus.
      </figcaption>
    </figure>
  </div>
  <div class="lp-right">

    <div class="lp-search-block">
      <h3 class="lp-search-block__title">
        Search IslandLives' online collections:
      </h3>



      <ul class="lp-search-block__tabs tabs" data-tabs id="lp-search-block__tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Full-Text</a></li>
        <li class="tabs-title"><a href="#panel2">Tab 2</a></li>
      </ul>

      <div class="tabs-content" data-tabs-content="lp-search-block__tabs">
        <div class="tabs-panel is-active" id="panel1">
          <div class="input-group">
            <input class="input-group-field" type="text" placeholder="Search IslandLives...">
            <div class="input-group-button">
              <input class="button" type="submit">
            </div>
          </div>
        </div>

        <div class="tabs-panel" id="panel2">
          <div class="input-group">
            <input class="input-group-field" type="text" placeholder="Search IslandLives...">
            <div class="input-group-button">
              <input class="button" type="submit">
            </div>
          </div>
        </div>
      </div>




      <ul class="menu lp-search-block__links">
        <li>
          <a href="/">Advanced Search</a>
        </li>
        <li>
          <a href="/">Search Tips</a>
        </li>
      </ul>
    </div>



    <!-- slider -->
    <div class="lp-slideshow orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
      <div class="orbit-wrapper">
        <div class="orbit-controls">
          <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
        </div>
        <ul class="orbit-container">
          <li class="is-active orbit-slide">
            <figure class="orbit-figure">
              <img class="orbit-image" src="https://placehold.it/1200x600/999?text=Slide-1" alt="Space">
              <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
            </figure>
          </li>
          <li class="orbit-slide">
            <figure class="orbit-figure">
              <img class="orbit-image" src="https://placehold.it/1200x600/888?text=Slide-2" alt="Space">
              <figcaption class="orbit-caption">Lets Rocket!</figcaption>
            </figure>
          </li>
          <li class="orbit-slide">
            <figure class="orbit-figure">
              <img class="orbit-image" src="https://placehold.it/1200x600/777?text=Slide-3" alt="Space">
              <figcaption class="orbit-caption">Encapsulating</figcaption>
            </figure>
          </li>
          <li class="orbit-slide">
            <figure class="orbit-figure">
              <img class="orbit-image" src="https://placehold.it/1200x600/666&text=Slide-4" alt="Space">
              <figcaption class="orbit-caption">Outta This World</figcaption>
            </figure>
          </li>
        </ul>
      </div>
      <!--
      <nav class="orbit-bullets">
        <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
        <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
        <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
        <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
      </nav>
      -->
    </div>
    <!-- /slider -->
  </div>


  <div class="lp-feature-blocks">

    <div class="lp-feature-block media-object featured-collection">
      <div class="media-object-section">
        <div class="lp-feature-block__image thumbnail">
          <img src= "https://placehold.it/150x150">
        </div>
      </div>
      <div class="lp-feature-block__text media-object-section main-section">
        <h4>Featured Collection</h4>
        <p>Praesent urna mi, pulvinar et magna lobortis, suscipit vulputate leo. Mauris lobortis tincidunt enim sit amet auctor. Aenean convallis, risus vitae maximus malesuada, ligula elit fringilla ligula, non finibus sapien magna a eros. Sed non dapibus metus.</p>
      </div>
    </div>
    <div class="lp-feature-block media-object featured-community">
      <div class="media-object-section">
        <div class="lp-feature-block__image thumbnail">
          <img src= "https://placehold.it/150x150">
        </div>
      </div>
      <div class="lp-feature-block__text media-object-section main-section">
        <h4>Featured Community</h4>
        <p>Praesent urna mi, pulvinar et magna lobortis, suscipit vulputate leo. Mauris lobortis tincidunt enim sit amet auctor. Aenean convallis, risus vitae maximus malesuada, ligula elit fringilla ligula, non finibus sapien magna a eros. Sed non dapibus metus.</p>
      </div>
    </div>
  </div>



  <div class="content">
    <?php print render($content);?>
  </div>


</article>

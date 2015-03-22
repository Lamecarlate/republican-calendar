<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?php echo $name ; ?> &mdash; Calendrier républicain</title>
  <!--<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/normalize.css" />-->
  <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/style.css" />
</head>
<body class="<?php echo $view->body_css() ; ?>">
  <div class="global">
    <header>
      <div>Calendrier républicain</div>
      <?php if(empty($error) || !$error->is_critical) : ?>
      <p><?php echo $day['formatted'] ;?> &mdash; <?php echo $view->views_variables['day_number'] . ' ' . $view->views_variables['month'] ;?></p>
      <h1><?php echo $name ; ?></h1>
      <?php else : ?>
      <p class="h1-like">Erreur critique</p>
      <?php endif ;?>
    </header>
    <main class="site-main">
      <?php if(!empty($error)) : ?>
      <div class="error error--<?php echo strtolower($error->error_code) ; ?>">
        <p><?php echo $error->display_errors(); ?></p>
      </div>
      <?php else : ?>
      <div class="image">
        <img class="main-image" src="<?php echo $image_href ; ?>" alt="<?php echo $name ; ?>" />
      </div>
      
      <?php endif ;?>

    </main>
    <?php if(empty($error) || !empty($name)) :  ?>
    <aside>
      Page Wikipédia : <a href="http://fr.wikipedia.org/wiki/<?php echo $name ; ?>"><?php echo $name ; ?></a>
    </aside>
    <?php endif ;?>
    <footer class="main-footer">
      Créé par <a href="http://lamecarlate.net">Chaopale Lamecarlate</a>
    </footer>
  </div>
  <script src="<?php echo ASSETS_URL; ?>/script.js"></script>
</body>
</html>

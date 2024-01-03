# MusMag Theme

Handle the app UI. It is an hybrid theme: it uses the theme.json file and the templates in the PHP version.

At this point, it has two views: archive-event.php and single-event.php (the Event post type is added by MusMag plugin).

The single-event.php exposes three hooks (check the code for details).

## Architecture

The theme uses PHP Composer to handle classes autoloding and to add some PHP packages. Plus, it uses Node to add some frontend packages and Gulp for css and js files manipulation.
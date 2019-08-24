<?php

require_once 'vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',


]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if ($_POST):

  $job = new Job();
  $job->title = $_POST['title'];
  $job->description = $_POST['description'];
  $job->save();

endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Job</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" class="form">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="input-title-description" placeholder="Title">
          <small id="input-title-description" class="form-text text-muted">Write your title</small>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" id="description" aria-describedby="input-description-description" placeholder="Description">
          <small id="input-description-description" class="form-text text-muted">Write your description</small>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</body>
</html>

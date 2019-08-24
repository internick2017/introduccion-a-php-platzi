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
    <form action="/david/job/store" method="post" class="form">
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

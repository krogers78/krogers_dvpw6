<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Grade</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body class="container p-3" style="background-color: rgb(248, 232, 251)">
  <h1>Edit the Student's Grade</h1>
  <p><a href="/">Go Back</a></p>
  <form action="/home/editGrade" method="POST">
    <p class="form-group row">
      <label for="sname" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sname" name="sname" placeholder="Jane Doe" value="<?= $data[0]['studentname'] ?>">
      </div>
    </p>
    <p class="form-group row">
      <label for="spercent" class="col-sm-2 col-form-label">Percent (%) Grade:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="spercent" name="spercent" placeholder="85" value="<?= $data[0]['studentpercent'] ?>">
      </div>
    </p>
    <?php $_SESSION['id'] = $data[0]['studentid'] ?>
    <input type="submit" value="Save Grade" class="btn btn-primary">
  </form>
</body>
</html>
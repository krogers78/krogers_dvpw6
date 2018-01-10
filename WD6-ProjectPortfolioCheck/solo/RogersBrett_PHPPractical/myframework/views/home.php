<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student's Grade Report</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body class="container p-3" style="background-color: rgb(248, 232, 251)">
  <h1 class="h2">Student Grades Report (Teacher's App)</h1>
  <h3 class="lead">Input your student's name & final grade percentage (%):</h3>
  
  <form action="/home/newgrade" method="POST">
    <p class="form-group row">
      <label for="sname" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sname" name="sname" placeholder="Jane Doe">
      </div>
    </p>
    <p class="form-group row">
      <label for="spercent" class="col-sm-2 col-form-label">Percent (%) Grade:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="spercent" name="spercent" placeholder="85">
      </div>
    </p>
      <input type="submit" value="Submit Query" class="btn btn-primary">
  </form>
  <?php
    // var_dump($data['err']);
    if ($data['err']) { ?>
      <p><?= $data['err'] ?></p>
   <?php } ?>
  <!-- The table to hold the results from the database -->
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">Name</th>
        <th scope="col" class="text-center">Percent Grade</th>
        <th scope="col" class="text-center">Letter Grade</th>
        <th scope="col" class="text-center">Delete</th>
        <th scope="col" class="text-center">Update</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        // print_r($data);
        foreach ($data['dbData'] as $d) { ?>
        <tr>
          <th class="text-center" scope="row"><?= $d['studentid'] ?></th>
          <td class="text-center"><?= $d['studentname'] ?></td>
          <td class="text-center"><?= $d['studentpercent'] ?>%</td>
          <td class="text-center"><?= $d['studentlettergrade'] ?></td>
          <td class="text-center"><a href="/home/deletegrade/?id=<?= $d['studentid'] ?>" class="btn btn-primary">Delete</a></td>
          <td class="text-center"><a href="/home/editForm/?id=<?= $d['studentid'] ?>" class="btn btn-primary">Edit</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
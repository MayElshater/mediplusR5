<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add to Client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Client</h2>
  <form action='insert.php'  method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="client">Client name:</label>
      <input type="text" class="form-control" id="client" placeholder="Enter client name" name ='client_name'>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name='email'>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name='phone'>
    </div>
    <div class="form-group">
      <label for="salesAmount">salesAmount:</label>
      <input type="number" class="form-control" id="salesAmount" placeholder="Enter Sales Amount" name='sales_amount'>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name= 'image'>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

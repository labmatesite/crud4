<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>
<?php if ( $this->session->flashdata('success')) { ?>
<div class="alert alert-success">
  <?php echo  $this->session->flashdata('success');  ?>
</div>
<?php }  ?>
<?php if ( $this->session->flashdata('danger')) { ?>
<div class="alert alert-danger">
  <?php echo  $this->session->flashdata('danger');  ?>
</div>
<?php }  ?>

<div class="container">
  <form method="POST" class="form-inline" action="<?=  base_url('insert') ?>">

    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control"  placeholder="Enter text" name="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter text" name="email"  required>
    </div>

    <div class="form-group">
      <label for="email">City:</label>
      <input type="text" class="form-control"  placeholder="Enter text" name="city"  required>
    </div>

    <div class="form-group">
      <label for="email">Age:</label>
      <input type="text" class="form-control"  placeholder="Enter text" name="age"  required>
    </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
<?php if (isset($data)) { ?>
  <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>city</th>
        <th>age</th>
        <th>delete</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($data as $key => $value) { ?>

      <tr>
        <td><?= $value['name'] ?></td>
        <td><?= $value['email']  ?></td>
        <td><?= $value['city']  ?></td>
        <td><?= $value['age']  ?></td>
        <td><a href="<?= base_url('delete/'.$value['id']) ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
        <td><a href="<?= base_url('update/'.$value['id']) ?>"><button type="button" class="btn btn-primary">Update</button></a></td>
      </tr>
      <?php } ?>


    </tbody>
  </table>
<?php } ?>

<?php if (isset($update)) { ?>

<div id="myModal" class="modal fade in" role="dialog" style="display: block;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form method="POST" class="form-inline" action="<?=  base_url('updatedata') ?>">

    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" value="<?= $update['name']; ?>" id="name" name="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control"  value="<?= $update['email']; ?>" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="email">City:</label>
      <input type="text" class="form-control"  value="<?= $update['city']; ?>" id="city" name="city" required>
    </div>

    <div class="form-group">
      <label for="email">Age:</label>
      <input type="text" class="form-control"  value="<?= $update['age']; ?>" id="age" name="age">
    </div>
    <input type="hidden" value="<?= $update['id']; ?>" name="id">
    <button type="button" onClick="cleardata()">Reset</button>
    <button type="submit" class="btn btn-default">Submit</button>

  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>

<?php }  ?>
</div>
<script type="text/javascript">
  function cleardata(){
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
    document.getElementById('city').value = "";
    document.getElementById('age').value = "";
  }
</script>

</body>
</html>

<?php include('connection.php'); ?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="adminstyle.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.css" />
  <title>DGH-Tıcaret</title>

</head>

<body class="arkaplan">
  <div class="container-fluid ">
    <h2 class="text-center">URUN LISTESI</h2>
    <p class="datatable design text-center bilgi">URUNBILGILERI</p>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">URUN EKLE</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table table-dark">
              <thead>   
                <th>Id</th>
                <th>URUN ADI</th>
                <th>URUN FIYATI</th>
                <th>BASLANGIC TARIHI</th>
                <th>BITIS TARIHI</th> 
                <th>FOTOĞRAF</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.js"></script>

  <script src="islemler.js"> </script>
  <!-- Update Urun Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">URUN GUNCELLE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">URUN ADI</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nameField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">URUN FIYATI</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mobileField" class="col-md-3 form-label">BASLANGIC TARIHI</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="mobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="cityField" class="col-md-3 form-label">BITIS TARIHI</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="cityField" name="City">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Urun Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">URUN EKLEME</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form" action="add_user.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="addUserField" class="col-md-3 form-label">URUN ADI</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addUserField" name="name" >
            </div>
          </div>
          <div class="form-group">
            <label for="addEmailField" class="col-md-3 form-label">URUN FIYATI</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addEmailField" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="addMobileField" class="col-md-3 form-label">BASLANGIC TARIHI</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="addMobileField" name="mobile">
            </div>
          </div>
          <div class="form-group">
            <label for="addCityField" class="col-md-3 form-label">BITIS TARIHI</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="addCityField" name="city">
            </div>
          </div>
      
            <input id="uploadImage" type="file" accept="image/*" name="image" />
            <div id="preview"><img src="filed.png" /></div><br>
            <input class="btn btn-success" type="submit" value="Upload">
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</body>

</html>
<script type="text/javascript">

</script>
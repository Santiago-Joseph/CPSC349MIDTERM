<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Data Form</title>
</head>
<body>
    <form>
        
        <div class="form-group col-md-3">
          <label for="firstName">FIRST NAME:</label>
          <input type="text" class="form-control" id="firstName">
        </div>
        <div class="form-group col-md-3">
            <label for="lastName">LAST NAME:</label>
            <input type="text" class="form-control" id="lastName">
          </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">EMAIL:</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-md-1 pt-0 moveLegend">MAJOR:</legend>
              <div class="col-sm-10">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    CS
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    CSCE
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                  <label class="form-check-label" for="gridRadios3">
                    MATH
                  </label>
                </div>
              </div>
            </div>
          </fieldset>
          
        <button type="submit" class="btn btn-primary">SUBMIT</button>
        <button type="submit" class="btn btn-primary">RESET</button>
      </form>
</body>
</html>

<!-- PART 2   Write the php code to connect to a remote database, 
and display an error message if the connection fails.   -->
<?php
    $connection = mysqli_connect("localhost", "root", "", "midtermDatabase");
    if (!$connection) {
        echo "Failed to connect to database". mysqli_connect_error();
        exit();
    }
?>

<!-- PART 3 Fill in the missing HTML and php code needed to insert information into the database administrator table we studied in class.
Assume it has fields admin_id, admin_password, and admin_name -->

<?php
$row = mysqli_fetch_object($result);
$db_userid = $row->admin_id;
$db_password = $row→admin_password;
$encryptpasswd = sha1($userPasswd);        // Note: sha1 encryption is obsolete $db_name = $row->admin_name;
$db_name = $row->admin_name;

if ($db_userid != $userid || $db_password != $encryptpasswd) {   
    $sql = "INSERT INTO adminTable (admin_id, admin_password, "admin_name")  VALUES ($db_userid, $encryptpasswd, $db_name)";                                                                      // TODO 
    $result = mysqli_query($connection, $sql);
    if (!$result) {        
        echo ("Insert to administrator failed. ". mysqli_error($connection));
                exit();    
            } 
        }
?>
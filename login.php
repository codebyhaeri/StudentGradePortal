<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-warning">
            <div class="col-8">
                <div class="mb-2 mt-2">
                    <form action="process_login.php" method="POST">
                        <div class="input-group">
                            <label for="" class="form-label">Fullname</label>
                            <input name="l_fullname" type="text" class="form-control" placeholder="ex: Jane B. Doe">

                            <label for="" class="form-label">Course and Section</label>
                            <input name="l_section" type="text" class="form-control" placeholder="ex: BSIT-2B">
                            
                            <label for="" class="form-label">Password</label>
                            <input name="l_uniquepass" type="text" class="form-control" placeholder="Password">

                            <input type="submit" value="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="style/js/bootstrap.js"></script>
</html>
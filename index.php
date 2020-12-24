

<?php 

  $host = 'localhost';
  $username = 'root';
  $password = '';
  $db_name = 'newshour';
  // DSN >> data source name
  $dhc = 'mysql:host='.$host.';dbname='.$db_name;
  // connection
  // create a PDO instance
  $pdo = new PDO($dhc,$username,$password);  
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

  #pdo query
  // $stmt = $pdo->query('SELECT * FROM category');

  // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  //   echo $row['c_name'].'<br>';
  // }

  // while($row = $stmt->fetch()){
  //   echo $row->c_name .'<br>';
  // }

  # PDO statement (PREPARED STATEMENTS -> prepare and execute)
  $name = 'omar';
  $role = true;
  $id = 1;
  // unsafe options
  //$sql = "SELECT * FROM category WHERE c_name = '$name'";

  // FETCH MULTIPLE POSTS (we have two ways-> positional parameter, named parameter)

  // positional parameter
  // $sql = 'SELECT * FROM category WHERE c_name = ?';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute([$name]);
  // $posts = $stmt->fetchAll();

  // named parameter
    // $sql = 'SELECT * FROM users WHERE u_name = :name && u_role = :role';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['name' => $name, 'role'=>$role]);
    // $posts = $stmt->fetchAll();

    // foreach ($posts as $post) {
    //   echo $post->u_name.'<br>';
    // }


  ### now FETCH SINGLE POST

    // $sql = 'SELECT * FROM users WHERE u_id = :id;';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // $posts = $stmt->fetch();

    // echo $posts->u_mail;

  ### GET Row COUNT
  // $stmt = $pdo->prepare('SELECT * FROM users WHERE u_name = ?');
  // $stmt->execute([$name]);
  // $posts = $stmt->rowCount();

  // echo $posts;


  ############### INSERT ###############
  $cat_name = 'Health';
  $cat_desc = 'This is a Health Category';

  $sql = 'INSERT INTO category (c_name, c_desc) VALUES (:c_name, :c_desc)';

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['c_name' => $cat_name, 'c_desc'=> $cat_desc]);

  //echo "category added";

  $sql = 'SELECT * FROM category';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  $posts = $stmt->fetchAll();

  foreach ($posts as $cat) {
    # code...
    echo $cat.'<br>';
  }

?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">

            </div>
          </div>
        </div>    
      </div>  
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
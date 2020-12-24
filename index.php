

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
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
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
  $limit = 1;
  // unsafe options
  //$sql = "SELECT * FROM category WHERE c_name = '$name'";

  // FETCH MULTIPLE POSTS (we have two ways-> positional parameter, named parameter)

  // positional parameter
  $sql = 'SELECT * FROM category WHERE c_name = ? LIMIT ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $limit]); // emulation problem
  $posts = $stmt->fetchAll();

  // named parameter
    // $sql = 'SELECT * FROM users WHERE u_name = :name && u_role = :role';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['name' => $name, 'role'=>$role]);
    // $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
      echo $post->u_name.'<br>';
    }


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
  // $cat_name = 'Health';
  // $cat_desc = 'This is a Health Category';

  // $sql = 'INSERT INTO category (c_name, c_desc) VALUES (:c_name, :c_desc)';

  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['c_name' => $cat_name, 'c_desc'=> $cat_desc]);

  //echo "category added";


  ############### UPDATE ###############

  // $id = 1;
  // $cat_name = 'Nuts';

  // $sql = 'UPDATE category SET c_name = :name WHERE c_id = :id';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['name' => $cat_name, 'id' => $id]);

  // echo "post updated!";

  ############### Delete ###############

  // $id = 1;

  // $sql = 'DELETE FROM category WHERE c_id = :id';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['id' => $id]);

  // echo "post deleted!";
  
  ############### Search ###############

  // $search = '%post%';

  // $sql = 'SELECT * FROM category WHERE c_name = ?';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute([$search]);
  // $posts = $stmt->fetchAll();

  // foreach($posts as $post){
  //   echo $post->title.'<br>';
  // }


?>








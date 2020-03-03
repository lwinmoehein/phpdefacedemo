<?php
include 'dbconfig.php';
?>
<html>
<header>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>To Do List</title></header>
<body>
<div class="container">
<div class="mx-auto" style="width: 200px;">
<div class="form-group purple-border">
  <label for="exampleFormControlTextarea4">To Do List App</label>
  <textarea class="form-control" id="todotext" rows="3"></textarea>
  <button id="todoclick" type="button" class="btn btn-primary">Add todo</button>

</div>

<ul class="list-group" id="tlist">

<?php
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  // Perform query
  if ($result = $mysqli -> query("SELECT * FROM todos order by id desc")) {
     while($todo=$result->fetch_object()){
         echo "<li class='list-group-item'>";
          echo htmlspecialchars($todo->todo_item, ENT_QUOTES, 'UTF-8');
         //echo $todo->todo_item;
         echo "</li>";
     }
    // Free result set
    $result -> free_result();
  }

  $mysqli -> close();

?>
</ul>
</div>
</div>
<script>
$(document).ready(function(){
  $("#todoclick").click(function(){
    $todo=$("#todotext").val();
    // $.get('addtodo.php', { todo: $todo},
    // function(returnedData){
    //       if(returnedData==="ok"){
    //         $("#tlist").prepend("<li class='list-group-item'> "+$todo+"</li>");
    //         alert('todo added');
    //         $('#todotext').val('');

    //       }
    //     });
    window.location="addtodo.php?todo="+$todo;
});
});
</script>
</body>
</html>

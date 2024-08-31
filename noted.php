<?php
// working on a all data table at modereationform.php 26 dec 2023; 

$mysqli = mysqli_connect('localhost', 'root', '', 'bookworms');

$limit = 3; // Number of records to show per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $mysqli->query("SELECT * FROM Buku LIMIT $start, $limit");
$total_records = $mysqli->query("SELECT COUNT(*) FROM Buku")->fetch_row()[0];
$total_pages = ceil($total_records / $limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="script/External_Source/Css/bootstrap.css">
</head>

<body>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Cover Buku</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Harga Buku</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $o = 1;
      while ($row = $result->fetch_assoc()) {
        // Display the data
      ?>
        <tr>

          <td><?php echo $o ?></td>
          <td><img height="100px" width="70px" style="object-fit: cover; object-position:center;" src="image/Collection/<?php echo $row['CoverBuku'] ?>" alt='Image'></td>
          <td style="vertical-align: middle;"><?php echo $row['NamaBuku']; ?>
            <br>
            test
          </td>
          <td><?php echo $row['HargaBuku']; ?></td>

        </tr>
      <?php
        $o++;
      }
      ?>
    </tbody>
  </table>
  <?php
  // Define the number of page links to show on either side of the current page
  $count = 5; // Adjust this value to show more or fewer page links

  // Calculate the start and end page numbers
  $startPage = max(1, $page - $count);
  $endPage = min($total_pages, $page + $count);

  // Generate the page links
  for ($i = $startPage; $i <= $endPage; $i++) {
    if ($i == $page) {
      echo "<strong>$i</strong> "; // The current page number is not a link
    } else {
      echo "<a class='btn' href='?page=$i'>$i</a> ";
    }
  }

  // Optionally, you can add "First", "Last", "Previous", and "Next" links
  if ($startPage > 1) {
    echo "<a href='?page=1'>First</a> ";
    echo "... ";
  }
  if ($page > 1) {
    echo "<a class='btn' href='?page=" . ($page - 1) . "'>Previous</a> ";
  }
  if ($page < $total_pages) {
    echo "<a type='button' class='btn' href='?page=" . ($page + 1) . "'>Next</a> ";
  }
  if ($endPage < $total_pages) {
    echo "... ";
    echo "<a href='?page=$total_pages'>Last</a>";
  }
  ?>

  <script src="script/External_Source/Js/jquery.slim.min.js"></script>
  <script src="script/External_Source/Js/jquery.min.js"></script>
  <script src="script/External_Source/Js/bootstrap.bundle.js"></script>
  <script>
    document.getElementById("calculateTotal").addEventListener("click", function() {
      var item1Count = parseInt(document.getElementById("item1Count").value);
      var item2Count = parseInt(document.getElementById("item2Count").value);

      var item1Price = 50000; // Replace with actual price
      var item2Price = 90000; // Replace with actual price

      var totalPrice = (item1Count * item1Price) + (item2Count * item2Price);

      document.getElementById("totalPrice").innerText = "Total Price: IDR " + totalPrice;
    });
  </script>
</body>

</html>








<!-- // $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//     // Rename the uploaded file to a random name
//     $new_name = uniqid() . '.' . $imageFileType;
//     rename($target_file, $new_name);
//     echo "The file has been renamed to: ". htmlspecialchars($new_name);
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
?> -->












<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head> -->
<!-- 
<body>
  <div id="dynamicInput">
    <div>
      <input type="text" name="myInputs[]">
      <button type="button" onclick="removeInput(this);">Remove</button>
    </div>
  </div>
  <button type="button" onclick="addInput('dynamicInput');">Add a text input</button>

  <script>
    function addInput(divName) {
      var inputContainer = document.getElementById(divName);
      var inputCount = inputContainer.getElementsByTagName('input').length;

      if (inputCount < 6) {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<input type='text' name='myInputs[]'> <button type='button' onclick='removeInput(this);'>Remove</button>";
        inputContainer.appendChild(newdiv);
      } else {
        alert("Maximum of 6 inputs reached");
      }
    }

    function removeInput(inputDiv) {
      var parentDiv = inputDiv.parentNode;
      parentDiv.parentNode.removeChild(parentDiv);
    }
  </script>
</body>

</html> -->



<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div id="dynamicInput">
    <input type="text" name="myInputs[]">
  </div>
  <button type="button" onclick="addInput('dynamicInput');">Add a text input</button>

  <script>
    function addInput(divName) {
      var newdiv = document.createElement('div');
      newdiv.innerHTML = "<input type='text' name='myInputs[]'>";
      document.getElementById(divName).appendChild(newdiv)

      var inputCount = inputContainer.getElementsByTagName('input').length;

      if (inputCount < 6) {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<input type='text' name='myInputs[]'>";
        inputContainer.appendChild(newdiv);
      } else {
        alert("Maximum of 6 inputs reached");
      }
    }
  </script>
</body>

</html> -->




<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div id="dynamicInput">
    <input type="text" name="myInputs[]">
  </div>
  <button type="button" onclick="addInput('dynamicInput');">Add a text input</button>

  <script>
    function addInput(divName) {
      var inputContainer = document.getElementById(divName);
      var inputCount = inputContainer.getElementsByTagName('input').length;

      if(inputCount < 6) {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<input type='text' name='myInputs[]'>";
        inputContainer.appendChild(newdiv);
      } else {
        alert("Maximum of 6 inputs reached");
      }
    }
  </script>
</body>

</html> -->

<!-- 
// include "Script/Conn.php"

<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <div id="dynamicInput">
    <div class="inputField">
      <select name="myInputs[]">
        
      </select>
      <button type="button" class="remove">Remove</button>
    </div>
  </div>
  <button type="button" id="addInput">Add a text input</button>

  <script>
    $(document).ready(function() {
      var maxFields = 6;
      var addButton = $('#addInput');
      var wrapper = $('#dynamicInput');
      var x = 1;

      $(addButton).click(function() {
        if (x < maxFields) {
          x++;
          $.get("getOptions.php", function(data) {
            var fieldHTML = '<div class="inputField"><select name="myInputs[]">' + data + '</select><button type="button" class="remove">Remove</button></div>';
            $(wrapper).append(fieldHTML);
          });
        }
      });

      $(wrapper).on('click', '.remove', function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      });
    });
  </script>

</body>

</html> -->



<!-- <!DOCTYPE html>
<html>

<body>

  <p>Click "Load More" to increase the value of j by 6:</p>

  <button onclick="loadMore()">Load More</button>

  <p id="demo"></p>

  <script>
    // Set the initial value of j
    var j = 9;

    // Display the initial value of j
    document.getElementById("demo").innerHTML = "The value of j is: " + j;

    function loadMore() {
      // Increase the value of j by 6
      j += 6;

      // Display the new value of j
      document.getElementById("demo").innerHTML = "The value of j is: " + j;
    }
  </script>

</body>

</html> -->
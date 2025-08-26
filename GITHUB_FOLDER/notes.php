<?php
    include'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="public/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>


     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./public/logonew.png" width=150px height=80px  /></a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto"> 
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="notes.php">Notes</a> 
         
        </li>
        <li class="nav-item">
             <a class="nav-link" href="about.php">About</a>
       </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main>




<section class="find py-5"><div class="row">
  <div class="col-12 d-flex justify-content-end pe-4">
    <a href="users/login.php">
      <button type="submit" name="notes" class="btn btn-primary px-5 py-2 mt-1">Upload</button>
    </a>
  </div> 
</div>

  <div class="container">
    <h1 class="text-center mb-4">Find Your Notes </h1>
    <div class="text-center text-muted">Please select course, year, and semester to view notes.</div>
    <br><br>

    <form class="row g-4 justify-content-center"  method="post">
      
  <div class="col-md-4 mb-3">
        <label for="course" class="form-label">Select Department</label>
        <select id="course" class="form-select" name="course">
          <option selected disabled>Choose from options below</option>
          <option value="civil">Civil</option>
          <option value="cse">Computer Science</option>
          <option value="mech">Mechanical</option>
          <option value="electrical">Electrical</option>
          <option value="ai">AI & ML</option>
        </select>
      </div>

  <div class="col-md-4 mb-3">
        <label for="year" class="form-label">Select Year</label>
        <select id="year" name="year"   class="form-select wide-dropdown">
          <option selected disabled>Choose from options below</option>
          <option value="1">1st Year</option>
          <option value="2">2nd Year</option>
          <option value="3">3rd Year</option>
        </select>
      </div>

  <div class="col-md-4 mb-3">
        <label for="semester" class="form-label">Select Semester</label>
        <select id="semester" name="semester" class="form-select wide-dropdown">
          <option selected disabled>Choose from options below</option>
          <option value="1">Semester 1</option>
          <option value="2">Semester 2</option>
          <option value="3">Semester 3</option>
          <option value="4">Semester 4</option>
          <option value="5">Semester 5</option>
          <option value="6">Semester 6</option>
        </select>
      </div>
<br><br>
      <div class="col-md-4 d-flex text-center">
        <button type="submit" name="notes" class="btn btn-primary px-5 py-2 mt-3 "> Get your Notes </button>
      </div>

    </form>

    <hr>
    

<br><br>


<?php

if (isset($_POST['notes'])){

  
    echo   '<h2 class="text-center mb-3">Available Notes</h2>';

    $s2 = $connection->prepare("select * from files_upload where  course= ? AND year=? and semester= ? and status=1 order by id desc");
    $s2->execute([  
      $_POST['course'],
      $_POST['year'],
      $_POST['semester']
      ]);
    if($s2->rowCount() > 0)

    {
    echo '<div class="d-flex justify-content-center">
        <div style="width: 100%; max-width: 800px; overflow-x: auto;">
          <table class="table table-bordered table-striped" style="width: 100%; font-size: 18px;">;

            <tr>
                
                <th>Filename</th>
                <th>Description</th>
                <th>Download</th>
                 </tr>';

    $r2 = $s2->fetchAll();
    foreach ($r2 as $row2) {
        echo '<tr>
                
                <td>' . $row2['filename'] . '</td>
                <td>' . $row2['description'] . '</td>
                <td>
                
                       <a href="./uploadedfiles/' .$row2['path'].'" download="' .$row2['filename'].'">
                            <button>Download</button>
                        </a>        
            
                
                </td>
              </tr>';
    }
  
    echo ' </div> 
    </table>';
    
    }
         }     
else 
{
    echo '<center>No data found</center>';
}


?>













<br><br><br><br>

      
    </div>

  </div>
</section>






</main>



<footer class="bg-dark text-light py-4 ">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <h5>About DiploDocs</h5>
        <div class="note">
          A community-built platform where students help each other by sharing notes.It is specifically for the diploma students of LPU and outside. Together we learn, together we grow.
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class=" text-decoration-none">Home</a></li>
          <li><a href="#" class=" text-decoration-none">Notes</a></li>
          <li><a href="#" class=" text-decoration-none">About Us</a></li>
          <li><a href="#" class=" text-decoration-none">Terms & conditions</a></li>
          <li><a href="#" class=" text-decoration-none">Blogs</a></li>
           <li><a href="#" class=" text-decoration-none">Gallery</a></li>

        </ul>
      </div>

      <div class="col-md-3 mb-3">
        <h5>Policies & Support</h5>
        <ul class="list-unstyled">
          <li><a href="#" class=" text-decoration-none">Privacy policy</a></li>
          <li><a href="#" class=" text-decoration-none">Help & support</a></li>
          <li><a href="#" class=" text-decoration-none">FaQs</a></li>
          <li><a href="#" class=" text-decoration-none">Terms of service</a></li>
          <li><a href="#" class=" text-decoration-none">Contact us</a></li>

        </ul>
      </div>

      <div class="col-md-3 mb-3">
        <h5>Connect With Us</h5>
        <div class="note">PLEASE NOTE: Our team takes 24-48 working hours to get back on mail. Request you to only send follow-up mails if you have not received a response within 48 working hours (excluding weekends).</div>
        <p>Email: <a href="mailto:support@diplodocs.in" class="text-light">support@diplodocs.in</a></p>
        <a href="#" class="text-light me-2"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-light me-2"><i class="bi bi-telegram"></i></a>
       <a href="#" class="text-light me-2"><i class="bi bi-facebook fs-4"></i>
</a>
  
      </div>
    </div>

    <hr class="border-light">
    <p class="text-center mb-0">Copyright © 2025 DiploDocs | All Rights Reserved | Made with ❤️ by Akanksha</p>
  </div>
</footer>
   
</main>

  
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



     <script>
  document.getElementById("year").addEventListener("change", function () {
    const selectedYear = this.value; 
    const semesterSelect = document.getElementById("semester"); 

    
    const allOptions = [
      { value: "1", text: "Semester 1", year: "1" },
      { value: "2", text: "Semester 2", year: "1" },
      { value: "3", text: "Semester 3", year: "2" },
      { value: "4", text: "Semester 4", year: "2" },
      { value: "5", text: "Semester 5", year: "3" },
      { value: "6", text: "Semester 6", year: "3" }
    ];

   
    semesterSelect.innerHTML = '<option selected disabled>Choose from options below</option>';

    
    allOptions.forEach(option => {
      if (option.year === selectedYear) {
        const newOption = document.createElement("option");
        newOption.value = option.value;
        newOption.text = option.text;
        semesterSelect.appendChild(newOption);
      }
    });
  });
</script>


</body>
</html>
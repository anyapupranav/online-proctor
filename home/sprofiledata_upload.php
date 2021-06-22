<?php
   session_start();
?>
<?php
 
  // If upload button is clicked ...
  if (isset($_POST['submit']) && isset($_FILES['fileimage'])) {

  $conn = new mysqli('localhost','root','','proctordb');
  $un = $_SESSION['username'];

    $sname = $conn->real_escape_string($_REQUEST['sname']);
    $dept = $conn->real_escape_string($_REQUEST['dept']); 
    $doj = $conn->real_escape_string($_REQUEST['doj']);
    $dob = $conn->real_escape_string($_REQUEST['dob']);
    $pemail = $conn->real_escape_string($_REQUEST['pemail']);
    $clgemail = $conn->real_escape_string($_REQUEST['clgemail']);
    $smobile = $conn->real_escape_string($_REQUEST['smobile']);
    $bloodgroup = $conn->real_escape_string($_REQUEST['bloodgroup']);
    $fathername = $conn->real_escape_string($_REQUEST['fathername']);
    $fatherprofession = $conn->real_escape_string($_REQUEST['fatherprofession']);
    $fathermobile = $conn->real_escape_string($_REQUEST['fathermobile']);
    $paddress = $conn->real_escape_string($_REQUEST['paddress']);
    $gaddress = $conn->real_escape_string($_REQUEST['gaddress']);
 
    $filename = $_FILES['fileimage']['name'];
    $filesize = $_FILES['fileimage']['size'];
    $tempname = $_FILES['fileimage']['tmp_name'];
    $error = $_FILES['fileimage']['error'];

    if($error === 0){
        if($filesize > 125000){
            echo "File size is too large.";
        }
        else{
            $fileExtension = pathinfo($filename,PATHINFO_EXTENSION);
            $actualfileExtension = strtolower($fileExtension);

            $allowed_extensions = array("jpg", "jpeg", "png"); 

			if (in_array($actualfileExtension, $allowed_extensions)) {
				$new_filename = uniqid("IMG-", true).'.'.$actualfileExtension;
				$file_upload_path = 'students_profile_pics/'.$new_filename;
				move_uploaded_file($tempname , $file_upload_path);



                 $sql = "UPDATE studentsdetails
	SET sname = '$sname',dept='$dept',pemail='$pemail',smobile='$smobile',clgemail='$clgemail',dob='$dob',doj='$doj',bloodgroup='$bloodgroup',fathername='$fathername',fatherprofession='$fatherprofession',fathermobile='$fathermobile',paddress='$paddress',gaddress='$gaddress',dataconform='1',imagefilename='$new_filename'
	WHERE registernumber = '$un'";
                
                if ($conn->query($sql) === TRUE){
                    echo '<script>alert("Details Successfully Updated.");window.location.href= "/online proctor/home/student.php";</script>';
                }



			}else {
				echo "You can't upload files of this type";
			}
        }
        }
     else{
		 echo '<script>alert("Please upload a profile picture!");window.location.href= "/online proctor/home/profile.php";</script>';
     }
     }


      if (isset($_POST['edit'])) {
            $conn = new mysqli('localhost','root','','proctordb');
            $un = $_SESSION['username'];
            $sql = "UPDATE studentsdetails SET dataconform = '3' where registernumber = '$un'";
	        if ($conn->query($sql) === TRUE){
                        echo '<script>window.location.href= "/online proctor/home/profile.php";</script>';
            }
      
      }
      if (isset($_POST['cancel'])) {
            $conn = new mysqli('localhost','root','','proctordb');
            $un = $_SESSION['username'];
            $sql = "UPDATE studentsdetails SET dataconform = '1' where registernumber = '$un'";
	        if ($conn->query($sql) === TRUE){
                        echo '<script>window.location.href= "/online proctor/home/profile.php";</script>';
            }
      
      }
?>








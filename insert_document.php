<?php
//inserts document into the database
session_start();
if ($db_conn=OCILogon("ora_p1t7", "a36959104", "ug")) {
    $email = $_SESSION['email'];
    $course = $_SESSION[('course' . (string)$_POST['courseSelect'])];
    $docURL = $_POST['docURL'];
    $docName = $_POST['docname'];
    $docId = 1;

    
    //find largest document id
    $cmdstr = "select max(document_id) from document";
    
    $parsed = OCIParse($db_conn, $cmdstr); // parse the statement
   if (!$parsed){
      $e = OCIError($db_conn);  
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   }

   $r=OCIExecute($parsed, OCI_DEFAULT); 
    if (!$r){
      $e = oci_error($parsed); 
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   }
   
    $row = OCI_Fetch_Array($parsed, OCI_NUM);
    if (empty($row)) {
      $_SESSION['insert_document_result'] = "Internal server error";
      OCILogoff($db_conn);
      header('Location: noteshare.php');
   }
   else {
    $docId += $row[0];
   }
   

   //insert document
   $cmdstr = "insert into document values($docId, '$docName', default, '$docURL', '$course[0]', '$course[2]', '$course[3]', '$course[4]',  $course[5], '$email')";

   $parsed = OCIParse($db_conn, $cmdstr); // parse the statement
   if (!$parsed){
      $e = OCIError($db_conn);  
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   }

   $r=OCIExecute($parsed, OCI_DEFAULT); 
    if (!$r){
      $e = oci_error($parsed); 
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   } 
  OCICommit($db_conn);
  echo("insert worked");
  
  
  $cmdstr = "select * from document where document_id = $docId";
   
   $parsed = OCIParse($db_conn, $cmdstr);
   if (!$parsed){
      $e = OCIError($db_conn);  
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   }

   $r=OCIExecute($parsed, OCI_DEFAULT); 
    if (!$r){
      $e = oci_error($parsed); 
      $_SESSION['insert_document_result'] =  htmlentities($e['message']);
      header("location:doc_upload.php");
      exit;
   }  
   
   $row = OCI_Fetch_Array($parsed, OCI_NUM);
   if (empty($row)) {
    $_SESSION['insert_document_result'] = "Fail";
    header("location:doc_upload.php");
   }

    OCILogoff($db_conn);
    $_SESSION['insert_document_result'] = "Success!";
    header("location:doc_upload.php");
    
}
else {
  $e = OCIError();  
  echo htmlentities($e['message']);
}

?>
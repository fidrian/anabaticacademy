<?php

session_start();
    function connectDB() {
		$servername = "remotemysql.com";
		$username = "gAhuN8MGYk";
		$password = "6XeduFerLR";
		$dbname = "gAhuN8MGYk";
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}

    function myBook($id) {
        $conn = connectDB();
      
        $sql = "SELECT b.title, u.file 
                FROM book b
                INNER JOIN unggah u ON u.no = b.upload_id
                WHERE b.book_id = $id";
      
        if(!$result = mysqli_query($conn, $sql)) {
          die("Error: $sql");
        }
        mysqli_close($conn);
        return $result;
    }
      
    
    $result = myBook($_GET["id"]);
    $file = mysqli_fetch_assoc($result);
    $extension = explode(".", $file['file']);
    $filedir = __DIR__ . "/../file_buku/".$file['file']; 
    if($extension[1]=="pdf"){
    if (file_exists($filedir))
    {
        header("Content-type: application/pdf");  
        header('Content-Disposition: inline; filename="' . $name . '"');
        header("Content-Length: " . filesize($filedir));  
        readfile($filedir); //Send the file to the browser
    }else{
        echo  "<script type='text/javascript'>alert('Preview Gagal');</script>";
    }
    }else if($extension[1]=="jpeg"){
    if (file_exists($filedir))
    {
        $type = 'image/jpeg';
        header('Content-Type:'.$type);
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }else{
        echo  "<script type='text/javascript'>alert('Preview Gagal');</script>";
    }
    }else{
    if (file_exists($filedir))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=\"" . basename($filedir) . "\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filedir));
        ob_clean();
        flush();
        readfile($filedir); //showing the path to the server where the file is to be download
        exit;
    }else{
        echo  "<script type='text/javascript'>alert('Download Gagal');</script>";
    }
    }

?>
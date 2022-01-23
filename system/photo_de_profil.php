<?php
include_once('db\connexionDB.php');
    if (isset($_POST['modification'])) {
        if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
            $taille = 2097152;
            $extension = array('jpg','jpeg','gif','png');
            if ($_FILES['avatar']['size'] <= $taille) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if (in_array($extensionUpload, $extension)) {
                    $image = basename($_FILES['avatar']['name']);
                    $image=str_replace(' ','|',$image); 
                    $result = move_uploaded_file($_FILES['avatar']['tmp_name'], "system\pp_img/".$image);

                    if ($result) {
                        $updateAvatar = $BDD->prepare('UPDATE users SET avatar = :avatar WHERE ID_users = :id');
                        $updateAvatar->execute(array('avatar' => $_FILES['avatar']['name'], 'id' => $_SESSION['ID_users']));

                        header("Location: profil.php?ID_users=".$_SESSION['ID_users']);
                    } else {
                        $errorMsg = "Error in import...";
                    }
                } else {
                    $errorMsg = "<script>alert('Format image accepté jpg, jpeg, gif or png....')</script>";
                }
            } else {
                $errorMsg = "<script>alert('L'image ne doit pas dépasser 2Mo...')</script>";
            }
        }
    }



?>


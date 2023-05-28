<?php
    function emptyInputSignUp($username, $email, $password, $rptPass){
        $result;
        if(empty($username) || empty($email) || empty($password) || empty($rptPass)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($username) {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($password, $rptPass) {
        $result;
        if($password !== $rptPass){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }
    function uidExisted($conn, $username, $email) {
        $sql = "SELECT * FROM users WHERE username = ? OR userEmail = ?;";
        $stmt = mysqli_stmt_init($conn);

        // prepare sql command to ensure the security of db
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ..\\HTML\\registerPage.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        } else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close();
    }

    function createUser($conn, $username, $email, $password){
        $sql = "INSERT INTO users (username, userEmail, userPwd) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        // prepare sql command to ensure the security of db
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ..\\HTML\\registerPage.php?error=stmtfailed");
            exit();
        }
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ..\\HTML\\registerPage.php?error=none");
        exit();

    }

    function emptyInputLogin($username, $password){
        $result;
        if(empty($username) || empty($password)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $password){
        $uidExists = uidExisted($conn, $username, $username); //either username or email

        if($uidExists === false){
            header("location: ..\\HTML\\loginPage.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists["userPwd"]; //get the value of col userPwd
        $checkPwd = password_verify($password, $pwdHashed);

        if($checkPwd === false){
            header("location: ..\\HTML\\loginPage.php?error=wronglogin");
            exit();
        } else if($checkPwd === true){
            session_start();
            $_SESSION["username"] = $uidExists["username"];
            header("location: ..\\HTML\\index.php");
            exit();
        }
    }
?>
<?php
include '../config/connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim(filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_EMAIL));
  $password = $_POST['Password'];

  if (($email === 'reymelrey.mislang@gmail.com' || $email === 'matbalinton@gmail.com' || $email == 'gwynethvaleriebrucal@gmail.com' || $email == 'calica.eman@gmail.com') && $password === '12345678') {
    $getName;
    if ($email == 'reymelrey.mislang@gmail.com') {
      $getName = "Reymel Mislang";
    } else if ($email == 'matbalinton@gmail.com') {
      $getName = "Matthew Balinton";
    } else if ($email == 'gwynethvaleriebrucal@gmail.com') {
      $getName = "Valerie Brucal";
    } else if ($email == 'calica.eman@gmail.com') {
      $getName = "Emmanuel Calica";
    }
    $_SESSION['Username'] = $getName;
    $_SESSION['Role'] = "Administrator";

    if (isset($_POST['keep_logged_in']) && $_POST['keep_logged_in'] == '1') {
      setcookie('remember_me', $email, time() + (30 * 24 * 60 * 60), '/');
    }
    header("Location: /web1-system/views/AdminPanel.php");
    exit;
  }

  $query = "SELECT * FROM Users WHERE email = ?";
  $statement = $connection->prepare($query);
  $statement->execute([$email]);
  $result = $statement->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    if (password_verify($password, $result['password'])) {
      if ($result['role'] == 'seller') {
        $_SESSION['Username'] = $result['username'];
        $_SESSION['Email'] = $email;
        echo '<script>alert("Login successful!");</script>';
        $_SESSION['userId'] = $result['user_id'];
        $getRole = "Seller";
        $_SESSION['Role'] = $getRole;

        if (isset($_POST['keep_logged_in']) && $_POST['keep_logged_in'] == '1') {
          setcookie('remember_me', $email, time() + (30 * 24 * 60 * 60), '/');
        }
        header("Location: /web1-system/views/SellerPanel.php");
      } else {
        $_SESSION['Username'] = $result['username'];
        $_SESSION['Email'] = $email;
        echo '<script>alert("Login successful!");</script>';
        $_SESSION['userId'] = $result['user_id'];
        $getRole = "Administrator";
        $_SESSION['Role'] = $getRole;
        $_SESSION['user_id'] = $result['user_id'];

        if (isset($_POST['keep_logged_in']) && $_POST['keep_logged_in'] == '1') {
          setcookie('remember_me', $email, time() + (30 * 24 * 60 * 60), '/');
        }
        header("Location: /web1-system/views/MainMenu.php");
      }

      exit; // Ensure that code execution stops after redirection
    } else {
      $_SESSION['error_message'] = 'Wrong Password';
      echo '<script> alert("Wrong Password"); </script>';
    }
  } else {
    echo '<script> alert("Wrong Email, please try again later."); </script>';
    $_SESSION['error_message'] = 'Wrong Email, please try again later.';
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/output.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
    <script src="../scripts/GoogleAuth.js" type="module" defer></script>
  </head>
<body >
<div class=" flex items-center justify-center bg-cover bg-center h-screen relative" style="background-image: url('../assets/img/asf.jpg');">
      <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
      <div class="flex items-center justify-center px-10 w-full lg:p-12">
        <div class="flex items-center xl:p-10">
          <div action = "./login.php" method = "POST" class="flex flex-col w-full h-full pb-6 px-12 bg-white rounded-3xl" autocomplete="off">
          <div class = " w-full text-center">
          <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900 pt-5">Sign In</h3>
            <p class="mb-4 text-grey-700">Enter your email and password</p>
          </div>
            <button id="signInWithGoogle" class="flex items-center justify-center w-full py-4 mb-6 text-sm font-medium transition duration-300 rounded-2xl text-grey-900 bg-grey-300 hover:bg-grey-400 focus:ring-4 focus:ring-grey-300">
              <img class="h-5 mr-2" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png" alt="">
              Sign in with Google
            </button>
            <div class="flex items-center mb-3">
              <hr class="h-0 border-b border-solid border-grey-500 grow">
              <p class="mx-4 text-grey-600">or</p>
              <hr class="h-0 border-b border-solid border-grey-500 grow">
            </div>
            <form action="./login.php" method="post">
            <label for="email" class=" text-sm text-grey-900 text-start font-bold">Email*</label>
            <input id="email" type="email" placeholder="matbalinton@gmail.com" name = "Username" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <label for="password" class="mb-2 text-sm text-start font-bold text-grey-900">Password*</label>
            <input id="password" name="Password" type="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <div class="flex flex-row justify-between mb-8">
              <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                <input type="checkbox" name="keep_logged_in" checked value="1" class="sr-only peer">
                <div
                  class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                  <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                </div>
                <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
              </label>
              <a href="./forget_password.php" class="mr-4 text-sm font-medium text-purple-blue-500">Forget password?</a>
            </div>
            <input type="submit" value = "Submit" class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">
            <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="./registration.php" class="font-bold text-grey-700">Create an Account</a></p>
            </form>
            
          </div>
        </div>
      </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

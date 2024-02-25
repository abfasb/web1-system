<?php
  include '../config/connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
      $password = $_POST['Password'];
      
      $query = "Select * FROM tblUser Where Username = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 's', $username);
      mysqli_stmt_execute($statement);
      $queried = mysqli_stmt_get_result($statement);

      if ($queried && mysqli_num_rows($queried) > 0) {
        $result = mysqli_fetch_assoc($queried);

        if (password_verify($password, $result['Password'])) {
          $_SESSION['Username'] = $username;
          header("Location: /web1-system/views/MainMenu.php");
        }
        else {
          $_SESSION['error_mesage'] = 'Wrong Password';
          echo '<script> alert("Wrong Password"); </script>';
        }
      }
      else {
        $_SESSION['error_message'] = 'Wrong Username, please try again later.';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
    <script src="../scripts/GoogleAuth.js" defer type="module"></script>
  </head>
<body >
<div class=" flex items-center justify-center bg-cover bg-center h-screen relative" style="background-image: url('../assets/img/hotel-bg.png');">
      <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
      <div class="flex items-center justify-center px-10 w-full lg:p-12">
        <div class="flex items-center xl:p-10">
          <form action = "./login.php" method = "POST" class="flex flex-col w-full h-full pb-6 px-12 text-center bg-white rounded-3xl" autocomplete="off">
          <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900 pt-5">Sign In</h3>
            <p class="mb-4 text-grey-700">Enter your email and password</p>
            <button autocomplete = "off" id="signInWithGoogle" class="flex items-center justify-center w-full py-4 mb-6 text-sm font-medium transition duration-300 rounded-2xl text-grey-900 bg-grey-300 hover:bg-grey-400 focus:ring-4 focus:ring-grey-300">
              <img class="h-5 mr-2" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png" alt="">
              Sign in with Google
            </button>
            <div class="flex items-center mb-3">
              <hr class="h-0 border-b border-solid border-grey-500 grow">
              <p class="mx-4 text-grey-600">or</p>
              <hr class="h-0 border-b border-solid border-grey-500 grow">
            </div>
            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
            <input id="email" type="email" placeholder="matbalinton@gmail.com" name = "Username" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
            <input id="password" name = "Password" type="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <div class="flex flex-row justify-between mb-8">
              <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                <input type="checkbox" checked value="" class="sr-only peer">
                <div
                  class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                  <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                </div>
                <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
              </label>
              <a href="#" class="mr-4 text-sm font-medium text-purple-blue-500">Forget password?</a>
            </div>
            <input type="submit" value = "Submit" class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">
            <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="./registration.php" class="font-bold text-grey-700">Create an Account</a></p>
          </form>
        </div>
      </div>
    </div>
    <h1>asdsad</h1>
</body>
</html>

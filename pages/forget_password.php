<?php

include '../config/connection.php';


session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $email = $_POST["email"];
  $token = bin2hex(random_bytes(32)); // Generate a random token
  $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour


  $query = "INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)";
  $statement = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($statement, "sss", $email, $token, $expires_at);
  mysqli_stmt_execute($statement);

  $reset_link = "http://localhost/web1-system/pages/forget_password.php?token=$token";
  $email_subject = "Password Reset";
  $email_body = "Click the following link to reset your password: $reset_link";
  mail($email, $email_subject, $email_body);

  $_SESSION['email_sent'] = true; // Set a session variable to indicate email sent
  header("Location: /web1-system/pages/login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col justify-center items-center h-screen w-screen">
  <div class="max-w-md mx-auto">
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <div class="mb-4 inline-block rounded-full bg-blue-200 p-2 text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
          </div>
          <h1 class="block text-2xl font-bold text-gray-800">Forgot password?</h1>
          <p class="mt-2 text-sm text-gray-600">Don't worry we'll send you reset instructions.</p>
        </div>

        <div class="mt-6">
          <form action="./forget_password.php" method="POST">
            <div class="grid gap-y-4">
              <div>
                <label for="email" class="mb-2 block text-sm text-gray-600">Email address</label>
                <div class="relative">
                  <input type="email" id="email" name="email"
                    class="peer block w-full rounded-md border border-gray-200 bg-gray-50 py-3 px-4 text-sm outline-none ring-offset-1 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500"
                    required aria-describedby="email-error" />
                  <div
                    class="pointer-events-none absolute top-3 right-0 hidden items-center px-3 peer-invalid:flex">
                    <svg class="h-5 w-5 text-rose-500" width="16" height="16" fill="currentColor"
                      viewBox="0 0 16 16" aria-hidden="true">
                      <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                  </div>
                  <p class="mt-2 hidden text-xs text-rose-600 peer-invalid:block" id="email-error">Valid email
                    address required for the account recovery process</p>
                </div>
              </div>

              <button type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-md border border-transparent bg-blue-500 py-3 px-4 text-sm font-semibold text-white transition-all hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="submit">Reset
                password</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <p class="mt-3 flex items-center justify-center divide-x divide-gray-300 text-center">
      <span class="inline pr-3 text-sm text-gray-600">
        Remember your password?
        <a class="font-medium text-blue-600 decoration-2 hover:underline" href="./login.php"> Sign in here </a>
      </span>
      <a class="pl-3 text-sm text-gray-600 decoration-2 hover:text-blue-600 hover:underline" href="#"
        target="_blank"> Contact Support </a>
    </p>
  </div>
</body>
</html>

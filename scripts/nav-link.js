document.getElementById('get-started-btn').addEventListener('click', async () => {
    try {
      const response = await fetch('../pages/registration.php');
      const data = await response.text();
      console.log(data); // Display the response in the console
    } catch (error) {
      console.error('Error:', error);
    }
  });

  document.getElementById('sign-up-btn').addEventListener('click', async () => {
    try {
      const response = await fetch('web1-system/pages/login.php');
      const data = await response.text();
      console.log(data); // Display the response in the console
    } catch (error) {
      console.error('Error:', error);
    }
  });

<?php
session_start();
session_destroy();
?>

<script>
    setTimeout(function() {
        alert("Logout Successfully!");
        window.location.href = "/web1-system/pages/login.php";
    }, 100);
</script>

<?php
session_start();
session_destroy();
?>

<script>
    setTimeout(function() {
        alert("Logout Successfully!");
        window.location.href = "/web1-system/views/MainHome.php";
    }, 100);
</script>

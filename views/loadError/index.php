<?php
    require 'views/layouts/header.php';
    require 'views/layouts/navigation.php';
?>
<h1>Página de errores</h1>
    <p class="error"><?php echo $this->message ?></p>
<?php
    require 'views/layouts/footer.php';
?>
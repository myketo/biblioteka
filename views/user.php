<?php
    $controller = new UserController;
    $controller->setUserData($_SESSION['logged_in']);
    echo $controller->name;
    echo "<br>";
    echo "<a href='".Route::homePage()."/user/borrowed'>Wypożyczone</a><br>";
    Route::loadSubView();
?>

<form method='post'><input type='submit' name='unset' value='wyloguj'></form>
<?php if(isset($_POST['unset'])){ session_unset(); session_destroy(); } ?>
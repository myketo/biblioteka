<h1>Admin Panel</h1>

<a href='<?= Route::homePage() ?>/admin/returnbook'>Zwróć książkę</a>
<a href='<?= Route::homePage() ?>/admin/addbook'>Dodaj książkę</a>
<br>

<?php
    Route::loadSubView();
?>

<form method='post'><input type='submit' name='unset' value='wyloguj'></form>
<?php if(isset($_POST['unset'])){ session_unset(); session_destroy(); } ?>
<form method='POST'>
    <input type='text' name='input' placeholder='Wyszukiwarka'>
    <select name='column'>
        <option value='title'>Tytuł</option>
        <option value='author'>Autor</option>
        <?php if(isset($_SESSION['is_admin'])) echo "<option value='id'>ID</option>"; ?>
    </select>
    <input type='submit' name='submitSearch' value='Wyszukaj'>
</form>
<?php
    if(isset($_POST['submitSearch'])){
        $book = new BooksView;
        $book->showBook($_POST['input'], $_POST['column']);
    }
?>
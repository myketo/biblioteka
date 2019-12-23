<?php
    $user = new UserView($_SESSION['logged_in']);
    $user->showBorrowed();
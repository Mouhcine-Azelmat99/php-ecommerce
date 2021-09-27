<?php 

    $admin=new AdminController();
    $admin->logout();
    Redirect ::to('dashboard');
<?php

session_start();
session_destroy();

header('location: /bancocentral/index.php');

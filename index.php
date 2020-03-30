<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set('Asia/Bangkok');

require 'medoo/Exception.php';
require 'medoo/PHPMailer.php';
require 'medoo/SMTP.php';

require_once 'medoo/Medoo.php';
require_once 'config.php';
include 'available.php';

include 'controller/controller.php';



<?php
if (isset($_COOKIE['username'])) {
  header('location: modules/index.php');
} else {
  header('location: login.php');
}

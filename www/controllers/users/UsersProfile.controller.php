<?php
$userModel = new UserModel();
$userId = 1;
$userProfile = $userModel->getUserProfile($userId);

print_r($userProfile);

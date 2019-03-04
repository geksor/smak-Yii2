<?php

use yii\helpers\FileHelper;

/**
 * @param string $fileName
 * @return string
 * @throws \yii\base\Exception
 */
function jsonFile($fileName){
    $dir = __DIR__ . '/';
    $file = $dir.$fileName.'.json';
    if (!is_dir($dir)){
        FileHelper::createDirectory($dir);
    }

    if (!is_file($file)){
        file_put_contents($file, '{}');
    }
    return json_decode(file_get_contents($file), true);
}

$jsonFile = jsonFile('set');
$about = jsonFile('about');
$vacancy = jsonFile('vacancy');
$reminder = jsonFile('reminder');
$payService = jsonFile('payService');

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'Params' => $jsonFile,
    'About' => $about,
    'VacancyPage' => $vacancy,
    'ReminderPage' => $reminder,
    'PayServicePage' => $payService,
];

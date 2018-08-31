<?php
$jsonFile = json_decode(file_get_contents(__DIR__. '/set.json'), true);
$about = json_decode(file_get_contents(__DIR__. '/about.json'), true);
$vacancy = json_decode(file_get_contents(__DIR__. '/vacancy.json'), true);
$reminder = json_decode(file_get_contents(__DIR__. '/reminder.json'), true);
$payService = json_decode(file_get_contents(__DIR__. '/payService.json'), true);

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

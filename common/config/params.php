<?php
Yii::setAlias('@upload', realpath(dirname(__FILE__) . '/../../upload'));

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
];

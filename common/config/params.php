<?php
Yii::setAlias('@frontend', realpath(dirname(__FILE__) . '/../../frontend'));
Yii::setAlias('@upload', realpath(dirname(__FILE__) . '/../../frontend/web/upload'));

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
];

<?php
Yii::setAlias('@upload', realpath(dirname(__FILE__) . '/../../upload'));
Yii::setAlias('@frontend', realpath(dirname(__FILE__) . '/../../frontend'));

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
];

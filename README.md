# yii2-db-reconnect


### composer
```json
"require": {
    "xj/yii2-db-reconnect": "~1.0"
},
```

### config
```php
'db' => [
//    'class' => 'yii\db\Connection',
    'class' => 'xj\dbreconnect\mysql\Connection', //add
    'reconnectMaxCount' => 2,
    //normal
    'dsn' => 'mysql:host=127.0.0.1;dbname=test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
],
```

### log
```php
'log' => [
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'info'],
            'maxLogFiles' => 20,
            'maxFileSize' => 2048,
            'categories' => [
                'xj\dbreconnect\*',
            ],
            'logFile' => '@frontend/runtime/logs/dbreconnect.log',
        ],
    ],
],
```
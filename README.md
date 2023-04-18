# 安装

```bash
composer require wanglijia/laravel-tencent-cloud-sdk-im -vvv
```

## laravel

### 推送配置

```bash
php artisan vendor:publish --tag=laravel-tencentsdk-im
```

## lumen

`bootstrap/app.php`
```php
$app->register(wanglijia\TencentCloudSdkIm\ServiceProvider::class);
```

### 推送配置

```bash
cp  ./vendor/wanglijia/laravel-tencent-cloud-sdk-im/src/config.php ./config/tencentsdkim.php
```

## 更新 `.env`

```dotenv
TENCENT_TIM_APPID=
TENCENT_TIM_SECRET=
TENCENT_TIM_IDENTIFIER=
```

# 使用

```php
use wanglijia\TencentCloudSdkIm\TencentCloudSdkIm;

// 获取 user sig
TencentCloudSdkIm::GenUserSig('user_id');

// 帐号
$account = TencentCloudSdkIm::Account();
// 查询帐号
$account->check('user_id');

// ...
```

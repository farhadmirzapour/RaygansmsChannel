
This package makes it easy to send notifications using Raygan Sms with Laravel 5.3+.

# RayganSms notifications channel for Laravel 5.3+

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/trez/raygan-sms-notification-channel/master.svg?style=flat-square)](https://travis-ci.org/trez/raygan-sms-notification-channel)
[![StyleCI](https://styleci.io/repos/65589451/shield)](https://styleci.io/repos/65589451)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/aceefe27-ba5a-49d7-9064-bc3abea0abeb.svg?style=flat-square)](https://insight.sensiolabs.com/projects/aceefe27-ba5a-49d7-9064-bc3abea0abeb)
[![Quality Score](https://img.shields.io/scrutinizer/g/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://scrutinizer-ci.com/g/trez/raygan-sms-notification-channel)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/trez/raygan-sms-notification-channel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/trez/raygan-sms-notification-channel/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)
<div dir="rtl">
این پکیج امکان ارسال اعلانات (notifications) با استفاده از RayganSms API  را فراهم می کند.

## محتوا

- [نصب](#نصب)
- [استفاده](#استفاده)


## نصب  

با استفاده از composer  قادر به نصب این سرویس می باشید:
</div>

```bash
composer require trez/raygan-sms-notification-channel
```
<div dir="rtl">
توجه داشته باشید جهت ارسال پیام از سرویس RayganSms API  استفاده می نماید که به همراه این پکیج بصورت اتوماتیک نصب می شود. بنابراین چنانچه از قبل این پکیج بر روی پروژه شما نصب و تنظیمات مربوطه را انجام داده اید ، نیازی به اقدام دیگری نمی باشد، در غیر این صورت مطابق دستورالعمل مربوطه )تنظیملت username,password,...(  اقدام نمایید.
</div>
```

### Setting up the SmscRu service

Add your SmscRu login, secret key (hashed password) and default sender name (or phone number) to your `config/services.php`:

```php
// config/services.php
...
'smscru' => [
    'login'  => env('SMSCRU_LOGIN'),
    'secret' => env('SMSCRU_SECRET'),
    'sender' => 'John_Doe'
],
...
```

> If you want use other host than `smsc.ru`, you MUST set custom host WITH trailing slash.

```
// .env
...
SMSCRU_HOST=http://www1.smsc.kz/
...
```

```php
// config/services.php
...
'smscru' => [
    ...
    'host' => env('SMSCRU_HOST'),
    ...
],
...
```

<div dir="rtl">
    
## استفاده

با استفاده از متد `()via` این کانال را به notefication  خود اضافه نمایید:
</div>

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\RayganSms\RaygansmsChannel;
use NotificationChannels\RayganSms\RayganSmsMessage;

class AccountApproved extends Notification
{
    public function via($notifiable)
    {
        return [RaygansmsChannel::class];
    }

    public function toRayganSms($notifiable)
    {
        return (new RayganSmsMessage())
            ->content("your message to send ...");
    }
}
```
<div dir="rtl">
 همچنین جهت اطمینان جهت ارسال پیام به شماره کاربر، متد زیر را به مدل مورد نظر خود که معمولا مدل User  می باشد اضافه می نماییم : 
</div>

```php
    use Notifiable;
    public function routeNotificationForRayganSms()
    {
        return $this->phone_number;
    }
``` 

<div dir="rtl">
    
### متدها

`()content`: متن ارسالی به دریافت کننده.


## تولید کننده

- [Farhad Mirzapour](https://github.com/farhadmirzapour)

## لایسنس

لایسنس (MIT) . جهت اطلاعات در مورد این لایسنس به [License File](LICENSE.md) مراجعه نمایید. 

</div>


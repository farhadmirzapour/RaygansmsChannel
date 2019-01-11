
This package makes it easy to send notifications using <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a> with Laravel 5.3+.

# RayganSms notifications channel for Laravel 5.3+

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/trez/raygan-sms-notification-channel/master.svg?style=flat-square)](https://travis-ci.org/trez/raygan-sms-notification-channel)
[![StyleCI](https://styleci.io/repos/65589451/shield)](https://styleci.io/repos/65589451)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/aceefe27-ba5a-49d7-9064-bc3abea0abeb.svg?style=flat-square)](https://connect.symfony.com/profile/farhadmirzapour/project/raygansmschannel)
[![Quality Score](https://img.shields.io/scrutinizer/g/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://scrutinizer-ci.com/g/trez/raygan-sms-notification-channel)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/trez/raygan-sms-notification-channel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/trez/raygan-sms-notification-channel/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)
<div dir="rtl">
این پکیج امکان ارسال اعلانات (notifications) با استفاده از <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a>  را فراهم می سازد.

## محتوا

- [نصب](#نصب)
- [استفاده](#استفاده)
- [متدها](#متدها)
- [تولیدکننده](#تولیدکننده)
- [لایسنس](#لایسنس)


## نصب  

با استفاده از composer  قادر به نصب این سرویس می باشید:
</div>

```bash
composer require trez/raygan-sms-notification-channel
```
<div dir="rtl" align="justify">
توجه داشته باشید سرویس <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a>  به همراه این پکیج بصورت اتوماتیک بر روی پروژه شما نصب می شود.
    بنابراین چنانچه از قبل پکیج <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a> بر روی پروژه شما نصب و تنظیمات مربوطه را انجام داده اید ، اقدامات مرتبط با نصب به پایان رسیده، در غیر این صورت مطابق مستندات مربوطه این پکیج (تنظیمات username,password, ...)اقدام نمایید.
</div>

<div dir="rtl">
    
## استفاده

با استفاده از متد `()via` این کانال را به notefication  خود اضافه نموده و متد toRayganSms را مطابق زیر جهت ارسال اعلان اضافه می نماییم:
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
 همچنین چنانچه جهت اطمینان از ارسال پیام به شماره کاربر،  از مدل که معمولا مدل User می باشد جهت استخراج شماره تماس کاربر استفاده می نمایید، ابتدا trait زیر را به مدل خود اضافه نمائید :   
</div>

```php
    use Notifiable;
```

<div dir="rtl">
 سپس متد زیر را به مدل اضافه نمائید : 
</div>

```php
    public function routeNotificationForRayganSms()
    {
        return $this->phone_number;
    }
``` 


<div dir="rtl">
    توجه داشته باشید در این مدل ستون حاوی شماره تماس کاربر phone_number  می باشد. در غیر اینصورت this->phone_number$ را مطابق با نام ستون حاوی شماره تماس کاربر تغییر دهید.
</div>
<div dir="rtl">
    
### متدها

`()content`: متن ارسالی به دریافت کننده.


## تولیدکننده

- [Farhad Mirzapour](https://github.com/farhadmirzapour)

## لایسنس

لایسنس (MIT) . جهت اطلاعات در مورد این لایسنس به [License File](LICENSE) مراجعه نمایید. 

</div>


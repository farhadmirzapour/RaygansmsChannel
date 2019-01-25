
This package makes it easy to send notifications using <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a> with Laravel 5.3+.

# RayganSms notifications channel for Laravel 5.3+

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![StyleCI](https://github.styleci.io/repos/164848543/shield?branch=master)](https://github.styleci.io/repos/164848543)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel/badges/build.png?b=master)](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Quality Score](https://img.shields.io/scrutinizer/g/farhadmirzapour/RaygansmsChannel.svg?style=flat-square)](https://scrutinizer-ci.com/g/farhadmirzapour/RaygansmsChannel)
[![Total Downloads](https://img.shields.io/packagist/dt/trez/raygan-sms-notification-channel.svg?style=flat-square)](https://packagist.org/packages/trez/raygan-sms-notification-channel)

<div dir="rtl">
این پکیج امکان ارسال اعلانات (notifications) را با استفاده از پکیج <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a>   فراهم می سازد.

## محتوا

- [نصب و پیکره بندی](#نصب-و-پیکره-بندی)
- [نحوه استفاده](#نحوه-استفاده)
- [متدها](#متدها)
- [تولیدکننده](#تولیدکننده)
- [لایسنس](#لایسنس)


## نصب و پیکره بندی  

با استفاده از composer  قادر به نصب این سرویس می باشید:
</div>

```bash
composer require trez/raygan-sms-notification-channel
```
<div dir="rtl" align="justify">
توجه داشته باشید سرویس <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a>  به همراه این پکیج بصورت اتوماتیک بر روی پروژه شما نصب می شود.
    بنابراین چنانچه از قبل پکیج <a href="https://github.com/farhadmirzapour/RayganSms" target="_blank">RayganSms API</a> بر روی پروژه شما نصب و تنظیمات مربوطه را انجام داده اید ، اقدامات مرتبط با نصب به پایان رسیده، در غیر این صورت مطابق مستندات مربوطه این پکیج (<a href="https://github.com/farhadmirzapour/RayganSms#%D9%BE%DB%8C%DA%A9%D8%B1%D9%87-%D8%A8%D9%86%D8%AF%DB%8C-%D8%AF%D8%B1-%D9%84%D8%A7%D8%B1%D8%A7%D9%88%D9%84" >پیکره بندی در لاراول</a>)اقدام نمایید.
</div>

<div dir="rtl">
    
## نحوه استفاده

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
        return [RayganSmsChannel::class];
    }

    public function toRayganSms($notifiable)
    {
        return (new TextMessage)
            ->content("your message to send ...");
    }
}
```

<div dir="rtl">
 جهت ارسال کد فعال سازی به کاربر می توان به صورت زیر عمل نمود :
</div>    

```php
...
    public function toRayganSms($notifiable)
    {
        return (new AuthCodeMessage)
                    ->content('Welcome');
    }
    ...
```

<div dir="rtl">
 و چنانچه بخواهیم کد فعال سازی دلخواه ارسال کنیم  :
</div> 

```php
...
    public function toRayganSms($notifiable)
    {
        return (new AuthCodeMessage)
                    ->content('کد تایید شما : 325689')
                    ->autoGenerate(false);
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

لایسنس این پکیج (MIT) می باشد . جهت اطلاعات در مورد این لایسنس به [License File](LICENSE) مراجعه نمایید. 

</div>


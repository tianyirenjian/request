Request
===========

在我们获取get或者post参数的时候是这样的

```php
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = trim($email);
if ($email == '') {
    //do sth
}
```

现在你可以这样使用

```php
$request = new \Goenitz\Request\Request();

$email = $request->post->email;
if (is_null($email)) {
    //do sth
}

//or
$email = $request->post('email');

//or set a default value
$email = $request->post('email', 'xxx@xxx.com');
```

支持get, post, request, server, cookie, session数据的获取。

#### 安装方式

```bash
composer require goenitz/request
```

#### 说明

默认会对参数运行trim方法，如果为空字符串，则会转换为null。 
你可以给构造函数传递参数来阻止这种行为。

```php
$request = new \Goenitz\Request\Request(false, false);
```

#### todo

- $_FILES 处理
- 添加一些帮助函数

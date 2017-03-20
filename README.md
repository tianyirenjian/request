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
$email = $request->post['email'];

//or
$email = $request->post('email');

//or set a default value
$email = $request->post('email', 'xxx@xxx.com');

//or get all post data as an array.
$post = $request->post->toArray();
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

#### change logs

##### 0.10

- 添加 `$request->post["key"]` 获取方式
- `ArrayObject` 类添加`toArray`方法， 现在可以通过 `$post = $request->post->toArray();` 直接获取整个post的数据
- `Request` 类添加一些注释，便于IDE进行代码提示

##### 0.01

- 初始功能

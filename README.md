Request
===========

#### 安装方式

```bash
composer require goenitz/request
```

在我们获取 get 或者 post 参数的时候是这样的

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

支持 get, post, request, server, cookie, session 数据的获取。

```php
$page = $request->get->page;
$ip = $request->server->REMOTE_ADDR
// etc.
```

//单独的 ip 方法

```php
$ip = $request->ip();
```

从 v1.0.0 版本开始支持 $_FILES

```php
$files = $request->files->toArray();

$file = $request->files->file;
//or
$file = $request->files('file');
//or
$file = $request->files['file'];

$file->getOriginalFileName();  // "32fa828ba61ea8d33395a581970a304e241f5884.gif"
$file->getOriginalExtension(); // "gif"
$file->getTempName();          // "C:\Users\tianyi\AppData\Local\Temp\php363C.tmp"
$file->getType();              // "image/gif"
$file->getError();             // 0
$file->save('./1.gif');        // true
```


#### 说明

默认会对参数运行 trim 方法，如果为空字符串，则会转换为 null。 
你可以给构造函数传递参数来阻止这种行为。

```php
$request = new \Goenitz\Request\Request(false, false);
```

#### change logs

##### v1.0.0 => v1.1.0

- 添加 ip方法获取ip
- 修改目录结构

##### 0.20 => v1.0.0

- 添加 $_FILES 支持

##### 0.10

- 添加 `$request->post["key"]` 获取方式
- `ArrayObject` 类添加 `toArray` 方法， 现在可以通过 `$post = $request->post->toArray();` 直接获取整个 post 的数据
- `Request` 类添加一些注释，便于 IDE 进行代码提示

##### 0.01

- 初始功能


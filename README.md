# PC28数据站点

本站点基于 [CakePHP](https://cakephp.org) 3.x. 搭建

## 安装

1. 下载 [Composer](https://getcomposer.org/doc/00-intro.md) 或使用 `composer self-update`更新.

2. 安装 `php-mysql, php-intl, php-mbstring php-xml php-xmlrpc`

3. 运行 `php composer.phar install`.

4. 向管理员获取您的数据源密钥

5. 填写您的网站域名地址和数据源密钥到 `src/Template/Pages/home.ctp` 文件的头两行

6. 执行以下命令以能本机访问或者可以发布到公网访问

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.

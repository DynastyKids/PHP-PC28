# PC28数据站点 (PC28 Gambling)

* This website has been archived, please using [React](https://github.com/DynastyKids/React-PC28) version and acquiring a key for requesting data.
* 本站点已经不再提供支持，请使用[React](https://github.com/DynastyKids/React-PC28)版本，并申请新的数据密钥后以正常使用

This website is based on [CakePHP](https://cakephp.org) 3.9.
本站点基于 [CakePHP](https://cakephp.org) 3.9. 搭建

## 安装

1. 下载 [Composer](https://getcomposer.org/doc/00-intro.md) 或使用 `composer self-update`更新.
2. 安装 `php-mysql, php-intl, php-mbstring php-xml php-xmlrpc`
3. 运行 `php composer.phar install`. (如果全局安装了composer, 则在目录内运行 `composer install`).
4. 向管理员获取您的数据源密钥
5. 填写您的网站域名地址和数据源密钥到 `src/Template/Pages/home.ctp` 文件的头两行
6. 执行以下命令以能本机访问或者可以发布到公网访问

```bash
bin/cake server -p 8765
```

然后访问`http://localhost:8765` 即可访问网站.


## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) Or running bash with `composer self-update` if you already have composer installed.
2. Install `php-mysql, php-intl, php-mbstring php-xml php-xmlrpc`
3. Running `php composer.phar install` (If composer installed globally, run `composer install` under project folder).
4. Acquiring the datakey from your salesman.
5. Input your datakey to head of file `src/Template/Pages/home.ctp`
6. Then you can execute following commands to preview it. Or you can publish with your CMS.

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

# ReqHeap - 需求管理系统

ReqHeap 是一个基于 PHP/MySQL 的需求管理系统，用于管理和跟踪项目需求。

## 技术栈

### 编程语言

| 语言 | 用途 |
|------|------|
| PHP | 后端主语言 |
| JavaScript | 前端交互逻辑 |
| HTML/CSS | 前端页面结构与样式 |
| SQL | 数据库操作 |

### 第三方库/组件

| 库/组件 | 用途 | 状态 |
|---------|------|------|
| FCKeditor | WYSIWYG 富文本编辑器 | 内置 |
| dhtmlxTree | 树形菜单 UI 组件 | 内置 |
| dompdf | PDF 生成 | 需单独安装 |
| xls | Excel 导出 | 需单独安装 |

## 目录结构

```
reqheap/
├── admin/          # 管理员功能模块
├── db/             # 数据库 API 和配置
├── FCKeditor/      # 富文本编辑器
├── dhtmlxTree/     # 树形 UI 组件
├── html/           # HTML 工具类
├── img/            # 图片资源
├── ini/            # 配置和国际化文件
├── install/        # 安装脚本
├── main/           # 核心业务逻辑
├── test/           # 测试文件
└── index.php       # 应用入口
```

## 部署环境要求

### 1. Web 服务器

- Apache 2.x + mod_php
- 或 Nginx + PHP-FPM

### 2. PHP 版本

- 最低: PHP 5.3+
- 推荐: PHP 7.0+

### 3. PHP 必需扩展

- `mysqli` - MySQL 数据库连接
- `gd` - 图片处理
- `json` - JSON 处理
- `curl` - HTTP 请求

### 4. 数据库

- MySQL 5.x+
- 需要创建数据库和用户

### 5. 目录权限

- 写权限: `config.ini` (存放数据库配置)
- 写权限: `img/` (上传文件)

## 部署步骤

### 1. 环境准备

安装 Apache2:
```bash
apt-get install apache2
apt-get install libapache2-mod-php7.0
```

安装 PHP7.0 及扩展:
```bash
apt-get install php7.0 php7.0-cli php7.0-cgi php7.0-fpm
apt-get install php7.0-gd php7.0-json php7.0-curl php7.0-mysql php7.0-readline
```

安装 MySQL:
```bash
apt-get install mysql-server mysql-client libmysqlclient-dev
```

### 2. 配置 Web 服务器

修改 Apache 配置文件，将文档根目录指向 `reqheap/` 目录。

### 3. 数据库初始化

```bash
mysql -u root -p
mysql> CREATE DATABASE reqheap;
mysql> GRANT ALL PRIVILEGES ON reqheap.* TO 'reqheap_user'@'localhost' IDENTIFIED BY 'password';
mysql> FLUSH PRIVILEGES;
mysql> quit
```

### 4. 完成安装

1. 运行 `install/install.php` 完成初始化
2. 配置 `config.ini` 数据库连接信息
3. 修改 `ini/params.php` 中的 `PROJECT_URL` 为实际访问地址

## 许可证

GPL-3.0

## 作者

asiaxing@163.com

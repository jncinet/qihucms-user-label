## 安装

```shell
$ composer require jncinet/qihucms-user-label
```

## 开始
### 数据迁移
```shell
$ php artisan migrate
```
### 发布资源
```shell
$ php artisan vendor:publish --provider="Qihucms\UserLabel\LabelServiceProvider"
```

## 后台菜单
+ 会员标签 => user-labels

## 接口
### 读取用户标签
+ 请求方式：GET
+ 请求链接：user/labels
+ 请求参数：
    - labels：[1,2,3] // 标签ID数组
+ 返回值：
```
{
    "data": [
        {
            "id" => 1,
            "name": "标签名称",
        },
        ...
    ]
}
```
### 用户添加标签
+ 请求方式：POST
+ 请求链接：user/add-labels
+ 请求参数：
    - labels：[1,2,3] // 标签ID数组
+ 返回值：
```
{
    "data": [
        {
            "id" => 1,
            "name": "标签名称",
        },
        ...
    ]
}
```
### 用户删除标签
+ 请求方式：POST
+ 请求链接：user/remove-labels
+ 请求参数：
+ 返回值：
```
{
    "data": [
        {
            "id" => 1,
            "name": "标签名称",
        },
        ...
    ]
}
```

## 数据库
### 标签表：labels
| Field             | Type      | Length    | AllowNull | Default   | Comment   |
| :----             | :----     | :----     | :----     | :----     | :----     |
| id                | bigint    |           |           |           |           |
| name              | text      |           |           |           | 标签名称   |

### 会员标签：label_user
| Field             | Type      | Length    | AllowNull | Default   | Comment   |
| :----             | :----     | :----     | :----     | :----     | :----     |
| id                | bigint    |           |           |           |           |
| label_id          | bigint    |           |           |           | 标签ID     |
| user_id           | bigint    |           |           |           | 会员ID     |

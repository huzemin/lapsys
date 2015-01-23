# lapsys
---

项目数据库准备
---

#### 用户表(users)
---

表字段

|     字段名     |   字段类型   |         注释        |
| :------------- | -----------: | :-----------------: |
| id             |           10 |        自增ID       |
| username       |  varchar(50) |       用户名        |
| password       | varchar(100) |  密码 (Hash::make)  |
| email          |  varchar(50) | 用户邮箱 (->unique) |
| image          | varchar(250) |       用户头像      |
| isadmin        |      boolean |     是否为管理员    |
| role_id        |      int(50) |        角色ID       |
| loginnum       |      int(50) |       登陆次数      |
| loginip        |  varchar(20) |        登陆IP       |
| loginclient    | varchar(200) |   登陆客户端信息    |
| remember_token | varchar(100) |   记住密码的Token   |
| created_at     |     datetime |       创建时间      |
| updated_at     |     datetime |       更新时间      |
| deleted_at     |     datetime |     软删除时间      |
 
路由设置

    * /login 登陆
    * /home
    * /register 注册
    * /forget 忘记密码
    * /admin 后台 ( 后台的路由前缀为admin)
    * /admin/users 用户列表
    * /admin/users/edit/{id} 用户编辑

逻辑设置

管理权限: 使用用户表的isadmin 判断是否为管理员，然后后台的相关权限设置通过role表进行

### 用戶角色表

|    字段名     |   字段类型  |   注释   |
| :------------ | ----------- | -------- |
| id            | 5           | 自增ID   |
| role_name     | varchar(30) | 角色名称 |
| status        | tyint       | 状态     |
| author        | text        | 设置     |
| ------------- | ----------- | -------- |
| created_at    | varchar(30) | 创建时间 |
| updated_at    | varhcar(30) | 更新时间 |
| deleted_at    | varchar(30) | 删除时间 |
| ------------- | ----------- | -------- |
| cover_setting | text        | 备份     |
| updated_user  | int         | user_id  |
| ------------- | ----------- | -------- |
|               |             |          |

### 文章表(posts)
---

表字段

|   字段名    |   字段类型   |              注释             |
| :---------- | -----------: | :---------------------------: |
| id          |           10 |             自增ID            |
| user_id     |          int |             用户ID            |
| title       | varchar(100) |              标题             |
| content     |         text |            文章内容           |
| description | varchar(250) |            短描述             |
| author      |  varchar(50) |              作者             |
| refer       | varchar(250) |           refer url           |
| website     |  varchar(50) |            网站名称           |
| tags        | varchar(250) |              标签             |
| viewnum     |      int(10) |            浏览次数           |
| storenum    |      int(10) |            收藏次数           |
| likenum     |      int(10) |            赞次数             |
| status      |     tyint(2) |    状态: 0:正常 1:不可评论    |
| s_comment   |      boolean |         true:允许评论         |
| s_login     |      boolean |        true:登陆可查看        |
| s_store     |      boolean | true:可以保存到自己的文章列表 |
| created_at  |     datetime |            创建时间           |
| updated_at  |     datetime |            更新时间           |
| deleted_at  |     datetime |          软删除时间           |

路由设置

    /posts/action/user_id/id
    
### 评论表(comments)
---
表字段

|   字段名   | 字段类型 |    注释    |
| :--------- | -------: | :--------: |
| id         |       10 |   自增ID   |
| user_id    |      int |   用户ID   |
| post_id    |      int |   文章ID   |
| comment_id |      int |   评论ID   |
| comments   |     text |    评论    |
| top        |      int |    支持    |
| down       |      int |   不支持   |
| created_at | datetime |  创建时间  |
| updated_at | datetime |  更新时间  |
| deleted_at | datetime | 软删除时间 |

    /comments/

### 个人收藏( stores )
---

表字段

|   字段名   | 字段类型 |     注释     |
| :--------- | -------: | :----------: |
| id         |       10 |    自增ID    |
| user_id    |      int |    用户ID    |
| post_id    |      int |    文章ID    |
| puser_id   |      int | 文章的原作者 |
| status     |    tyint |     状态     |
| ...                  ||              |
| created_at | datetime |   创建时间   |
| updated_at | datetime |   更新时间   |
| deleted_at | datetime |  软删除时间  |

    /ustore/

### 好友列表( friends )
---

表字段

|   字段名   |   字段类型   |    注释    |
| :--------- | -----------: | :--------: |
| id         |           10 |   自增ID   |
| user_id    |          int |   用户ID   |
| refer_uid  |          int |   朋友ID   |
| status     |        tyint |    状态    |
| sharepost  | varchar(200) | 分享文章ID |
| created_at |     datetime |  创建时间  |
| updated_at |     datetime |  更新时间  |
| deleted_at |     datetime | 软删除时间 |


### 个人设置 ( setting )
---

表字段

|   字段名    | 字段类型 |       注释       |
| :---------- | -------: | :--------------: |
| id          |       10 |      自增ID      |
| user_id     |      int |      用户ID      |
| lastsetting |     text | 最后一次设置备份 |
| setting     |     text |     当前设置     |
| created_at  | datetime |     创建时间     |
| updated_at  | datetime |     更新时间     |
| deleted_at  | datetime |    软删除时间    |

    /setting/

## 通过模块复用和低耦合的方式去开发一个项目。。。拒绝机械的代码搬运

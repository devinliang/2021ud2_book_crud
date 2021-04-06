# 資料庫重建步驟:

1. 建立資料庫與使用者
   - 資料庫: bookstore
   - 使用者: bookstore
   - 密碼: abc123

2. 匯入 book.sql 到 bookstore 資料庫

3. 下載php程式使用

# 檔案說明

- dblist.php - 列出 book 資料表 的所有項目
- db_add.php - 新增 book 資料表 單筆項目
- db_show.php - 顯示 book 資料表 單筆詳細資料
- db_edit.php - 修改 book 資料表 單筆資料
- db_delete.php - 刪除 book 資料表的一筆項目


# XAMPP 設定虛擬主機

- c:/windows/system32/drivers/etc/hosts

127.0.0.1 2021ud2.com


- c:/xampp/apache/conf/extra/httpd-vhosts.conf

```
    <VirtualHost *:80>
        DocumentRoot "C:\xampp\htdocs"
        ServerName localhost
    </VirtualHost>
    
    <VirtualHost *:80>
        DocumentRoot "D:\devin\Github\2021ud2_book_crud"
        ServerName 2021ud2.com
    </VirtualHost>
    
    <Directory "D:\devin\Github\2021ud2_book_crud">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
    </Directory>
```

# 資料表欄位說明

## book fields:

 - 書名:    文字(100)
 - 作者:    文字(100)
 - 出版社:  文字(100)
 - 出版日期: 日期
 - 定價:    數字(6)
 - 簡介:    長文字

# SQL 語法

- 刪除一筆資料SQL指令

DELETE FROM `book` WHERE `book`.`bid` = 10

重建步驟:
1. 建立資料庫與使用者
   - 資料庫: bookstore
   - 使用者: bookstore
   - 密碼: abc123

2. 匯入 book.sql 到 bookstore 資料庫

3. 下載php程式

book fields:

 - 書名:    文字(100)
 - 作者:    文字(100)
 - 出版社:  文字(100)
 - 出版日期: 日期
 - 定價:    數字(6)
 - 簡介:    長文字

刪除SQL指令
DELETE FROM `book` WHERE `book`.`bid` = 10
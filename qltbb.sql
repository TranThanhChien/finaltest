create database qltb;

use qltb;
CREATE TABLE `teachers` (
    `id` INT(11) NOT NULL COMMENT 'auto-increment',
    `name` VARCHAR(250) NOT NULL,
    `avatar` VARCHAR(250) NOT NULL COMMENT 'name of avatar file. (don’t to store path of file in DB)',
    description TEXT NOT NULL,
    specialized CHAR(10) NOT NULL COMMENT 'code of specialized (chuyên ngành)',
    degree CHAR(10) NOT NULL COMMENT 'code of degree (bằng cấp)',
    updated DATETIME NOT NULL,
    created DATETIME NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto-increment';
COMMIT;
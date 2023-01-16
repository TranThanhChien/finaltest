create database qltb;

use qltb;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL COMMENT 'auto-increment',
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL COMMENT 'name of avatar file. (don’t to store path of file in DB)',
  `description` text NOT NULL,
  `specialized` char(10) NOT NULL COMMENT 'code of specialized (chuyên ngành)',
  `degree` char(10) NOT NULL COMMENT 'code of degree (bằng cấp)',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto-increment';
COMMIT;
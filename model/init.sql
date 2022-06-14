drop database if exists `sintetiza`;

create database if not exists `sintetiza`;

use `sintetiza`;

create table if not exists `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

create table if not exists `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE if not exists `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` INTEGER NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` LONGTEXT NOT NULL,
  `name` varchar(5000) NOT NULL,
  `avatar` LONGTEXT,
  `CPF` varchar(11),
  `createdAt` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE (`email`),
  CONSTRAINT `fk_user_role` FOREIGN KEY (`roleId`) REFERENCES `role`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE if not exists `userLog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` INTEGER NOT NULL,
  `loginAt` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logoutAt` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userLog_user` FOREIGN KEY (`userId`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE if not exists `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` LONGTEXT NOT NULL,
  `content` LONGTEXT,
  `published` BOOLEAN NOT NULL DEFAULT false,
  `authorId` INTEGER,
  `createdAt` TIMESTAMP NOT NULL DEFAULT now(),
  `updatedAt` TIMESTAMP NOT NULL DEFAULT now(),
  `subjectId` INTEGER,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_authorId` FOREIGN KEY (`authorId`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subjectId` FOREIGN KEY (`subjectId`) REFERENCES `subject`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- CreateIndex
CREATE UNIQUE INDEX `user_email_key` ON `user`(`email`);

-- CreateIndex
CREATE UNIQUE INDEX `userLog_userId_key` ON `userLog`(`userId`);

insert into
  `role` (
    `id`,
    `name`,
    `description`,
    `created_at`,
    `updated_at`
  )
values
  (1, 'admin', 'Administrator', now(), now()),
  (2, 'user', 'User', now(), now());

insert into
  `subject` (
    `id`,
    `name`,
    `description`,
    `created_at`,
    `updated_at`
  )
values
  (
    1,
    'Matemática',
    'Matemática',
    now(),
    now()
  );

insert into
  `user` (
    `id`,
    `roleId`,
    `email`,
    `password`,
    `name`,
    `avatar`,
    `CPF`,
    `createdAt`,
    `updatedAt`
  )
values
  (
    1,
    1,
    'teste@gmail.com',
    '123',
    'https://github.com/diego3g.png',
    '11111111111',
    'Teste',
    now(),
    now()
  ),
  (
    2,
    2,
    'teste2@gmail.com',
    '123',
    'https://github.com/EmiLopes.png',
    '22222222222',
    'Teste2',
    now(),
    now()
  );

insert into
  `post` (
    `id`,
    `title`,
    `content`,
    `published`,
    `authorId`,
    `createdAt`,
    `updatedAt`,
    `subjectId`
  )
values
  (
    1,
    'Primeiro Post',
    'Primeiro Post',
    true,
    1,
    now(),
    now(),
    1
  ),
  (
    2,
    'Segundo Post',
    'Segundo Post',
    true,
    2,
    now(),
    now(),
    1
  );

insert into
  `userLog` (`id`, `userId`, `loginAt`, `logoutAt`)
values
  (1, 1, now(), now());

select
  *
from
  `post`
  inner join `user` on `post`.`authorId` = `user`.`id`
  inner join `subject` on `post`.`subjectId` = `subject`.`id`
where
  `post`.`id` = 1;
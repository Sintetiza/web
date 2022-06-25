-- drop database if exists `sintetiza`;
-- create database if not exists `sintetiza`;
-- use `sintetiza`;
drop table if exists `subject`;

drop table if exists `role`;

drop table if exists `user`;

drop table if exists `userLog`;

drop table if exists `post`;

drop table if exists `aksPost`;

drop table if exists `savePost`;

-- configure timezone
set
  time_zone = '-03:00';

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
  `birthDate` DATE,
  `CPF` varchar(11),
  `postSave` int(11),
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

-- create a table for user ask post
create table if not exists `aksPost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` INTEGER,
  `email` varchar(300) NOT NULL,
  `askPost` LONGTEXT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT now(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_Id` FOREIGN KEY (`userId`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

create table if not exists `savePost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` INTEGER,
  `postId` INTEGER,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_postId` FOREIGN KEY (`postId`) REFERENCES `post`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
    '12201000278@muz.ifsuldeminas.edu.br',
    '$2y$10$IXH9Kjtx4EDTpzXNvwYVleiYbCOW.5fuQRMXTQHpeoJ9qzQh3ORBK',
    'Bhryan Stepenhen',
    'https://github.com/bhryans2.png',
    '33333333333',
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
    'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandae Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandaeLorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandaeLorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandaeLorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandaeLorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandae',
    true,
    1,
    now(),
    now(),
    1
  ),
  (
    2,
    'Segundo Post',
    '
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, reiciendis in qui cupiditate accusamus soluta unde libero! Quos quasi saepe nemo cum? Ratione fugit id sequi repellat suscipit reiciendis explicabo.
    Quo quos atque, provident quam enim commodi possimus voluptatem repellat perspiciatis pariatur totam quia eaque veniam dolorem natus vel, ut velit accusantium corrupti architecto aut eveniet magnam. Laboriosam, laborum pariatur?
    Vitae quo dicta earum cupiditate id recusandae ratione, vero suscipit vel iusto provident at aperiam et commodi in repellat facere veritatis officiis necessitatibus quaerat quis nostrum harum. Dicta, itaque ratione.
    Quo possimus aliquam quae reiciendis facilis maiores fugit architecto ipsam consequuntur et. Libero optio sint animi, nisi aperiam ut ullam doloremque iste nesciunt, accusantium officiis aut quam facilis quos voluptatem.
    Dolore consequatur pariatur voluptatibus nisi maxime sed neque assumenda et aliquam veritatis delectus voluptas, voluptatum ea necessitatibus labore qui nostrum modi, error vel? Reiciendis dolor nostrum deserunt porro eos doloribus!
    Voluptates quibusdam libero voluptate mollitia non et similique. Quisquam repellat et veritatis, natus maxime ipsum minima consequuntur, itaque reiciendis, ipsa fugit rem! Veritatis officiis neque perspiciatis nam dolorum, cupiditate perferendis.
    Ipsa fuga nemo libero vitae sunt explicabo deserunt ullam, veritatis, aliquam labore dolore iure illo sit doloremque placeat voluptatibus, quas autem perspiciatis enim. Eveniet veniam velit non aliquid illum soluta!
    Reiciendis vero repellat dolorum fugiat. Minus, adipisci consectetur in iste tempora labore, quis iure provident fugit laborum blanditiis saepe quo accusantium explicabo rerum voluptatem sed sunt dolorum facilis! Doloribus, dignissimos.
    Optio neque nihil possimus! Aperiam reprehenderit ab mollitia qui placeat laborum, sit dolore fuga numquam sed? Distinctio aspernatur nulla, incidunt porro, eaque deleniti beatae, quod quaerat est ducimus nam architecto.
    Animi nostrum aliquid nemo dolorum voluptate! Debitis ad, error rem animi alias saepe maxime suscipit obcaecati dolorum amet! Recusandae inventore quis culpa impedit et, odit perferendis nisi tenetur reiciendis sit?',
    true,
    1,
    now(),
    now(),
    1
  ),
  (
    3,
    'Terceiro Post',
    '
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, reiciendis in qui cupiditate accusamus soluta unde libero! Quos quasi saepe nemo cum? Ratione fugit id sequi repellat suscipit reiciendis explicabo.
    Quo quos atque, provident quam enim commodi possimus voluptatem repellat perspiciatis pariatur totam quia eaque veniam dolorem natus vel, ut velit accusantium corrupti architecto aut eveniet magnam. Laboriosam, laborum pariatur?
    Vitae quo dicta earum cupiditate id recusandae ratione, vero suscipit vel iusto provident at aperiam et commodi in repellat facere veritatis officiis necessitatibus quaerat quis nostrum harum. Dicta, itaque ratione.
    Quo possimus aliquam quae reiciendis facilis maiores fugit architecto ipsam consequuntur et. Libero optio sint animi, nisi aperiam ut ullam doloremque iste nesciunt, accusantium officiis aut quam facilis quos voluptatem.
    Dolore consequatur pariatur voluptatibus nisi maxime sed neque assumenda et aliquam veritatis delectus voluptas, voluptatum ea necessitatibus labore qui nostrum modi, error vel? Reiciendis dolor nostrum deserunt porro eos doloribus!
    Voluptates quibusdam libero voluptate mollitia non et similique. Quisquam repellat et veritatis, natus maxime ipsum minima consequuntur, itaque reiciendis, ipsa fugit rem! Veritatis officiis neque perspiciatis nam dolorum, cupiditate perferendis.
    Ipsa fuga nemo libero vitae sunt explicabo deserunt ullam, veritatis, aliquam labore dolore iure illo sit doloremque placeat voluptatibus, quas autem perspiciatis enim. Eveniet veniam velit non aliquid illum soluta!
    Reiciendis vero repellat dolorum fugiat. Minus, adipisci consectetur in iste tempora labore, quis iure provident fugit laborum blanditiis saepe quo accusantium explicabo rerum voluptatem sed sunt dolorum facilis! Doloribus, dignissimos.
    Optio neque nihil possimus! Aperiam reprehenderit ab mollitia qui placeat laborum, sit dolore fuga numquam sed? Distinctio aspernatur nulla, incidunt porro, eaque deleniti beatae, quod quaerat est ducimus nam architecto.
    Animi nostrum aliquid nemo dolorum voluptate! Debitis ad, error rem animi alias saepe maxime suscipit obcaecati dolorum amet! Recusandae inventore quis culpa impedit et, odit perferendis nisi tenetur reiciendis sit?',
    true,
    1,
    now(),
    now(),
    1
  ),
  (
    4,
    'Quarto Post',
    '
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, reiciendis in qui cupiditate accusamus soluta unde libero! Quos quasi saepe nemo cum? Ratione fugit id sequi repellat suscipit reiciendis explicabo.
    Quo quos atque, provident quam enim commodi possimus voluptatem repellat perspiciatis pariatur totam quia eaque veniam dolorem natus vel, ut velit accusantium corrupti architecto aut eveniet magnam. Laboriosam, laborum pariatur?
    Vitae quo dicta earum cupiditate id recusandae ratione, vero suscipit vel iusto provident at aperiam et commodi in repellat facere veritatis officiis necessitatibus quaerat quis nostrum harum. Dicta, itaque ratione.
    Quo possimus aliquam quae reiciendis facilis maiores fugit architecto ipsam consequuntur et. Libero optio sint animi, nisi aperiam ut ullam doloremque iste nesciunt, accusantium officiis aut quam facilis quos voluptatem.
    Dolore consequatur pariatur voluptatibus nisi maxime sed neque assumenda et aliquam veritatis delectus voluptas, voluptatum ea necessitatibus labore qui nostrum modi, error vel? Reiciendis dolor nostrum deserunt porro eos doloribus!
    Voluptates quibusdam libero voluptate mollitia non et similique. Quisquam repellat et veritatis, natus maxime ipsum minima consequuntur, itaque reiciendis, ipsa fugit rem! Veritatis officiis neque perspiciatis nam dolorum, cupiditate perferendis.
    Ipsa fuga nemo libero vitae sunt explicabo deserunt ullam, veritatis, aliquam labore dolore iure illo sit doloremque placeat voluptatibus, quas autem perspiciatis enim. Eveniet veniam velit non aliquid illum soluta!
    Reiciendis vero repellat dolorum fugiat. Minus, adipisci consectetur in iste tempora labore, quis iure provident fugit laborum blanditiis saepe quo accusantium explicabo rerum voluptatem sed sunt dolorum facilis! Doloribus, dignissimos.
    Optio neque nihil possimus! Aperiam reprehenderit ab mollitia qui placeat laborum, sit dolore fuga numquam sed? Distinctio aspernatur nulla, incidunt porro, eaque deleniti beatae, quod quaerat est ducimus nam architecto.
    Animi nostrum aliquid nemo dolorum voluptate! Debitis ad, error rem animi alias saepe maxime suscipit obcaecati dolorum amet! Recusandae inventore quis culpa impedit et, odit perferendis nisi tenetur reiciendis sit?',
    true,
    1,
    now(),
    now(),
    1
  ),
  (
    5,
    'QUINTO Post',
    '
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, reiciendis in qui cupiditate accusamus soluta unde libero! Quos quasi saepe nemo cum? Ratione fugit id sequi repellat suscipit reiciendis explicabo.
    Quo quos atque, provident quam enim commodi possimus voluptatem repellat perspiciatis pariatur totam quia eaque veniam dolorem natus vel, ut velit accusantium corrupti architecto aut eveniet magnam. Laboriosam, laborum pariatur?
    Vitae quo dicta earum cupiditate id recusandae ratione, vero suscipit vel iusto provident at aperiam et commodi in repellat facere veritatis officiis necessitatibus quaerat quis nostrum harum. Dicta, itaque ratione.
    Quo possimus aliquam quae reiciendis facilis maiores fugit architecto ipsam consequuntur et. Libero optio sint animi, nisi aperiam ut ullam doloremque iste nesciunt, accusantium officiis aut quam facilis quos voluptatem.
    Dolore consequatur pariatur voluptatibus nisi maxime sed neque assumenda et aliquam veritatis delectus voluptas, voluptatum ea necessitatibus labore qui nostrum modi, error vel? Reiciendis dolor nostrum deserunt porro eos doloribus!
    Voluptates quibusdam libero voluptate mollitia non et similique. Quisquam repellat et veritatis, natus maxime ipsum minima consequuntur, itaque reiciendis, ipsa fugit rem! Veritatis officiis neque perspiciatis nam dolorum, cupiditate perferendis.
    Ipsa fuga nemo libero vitae sunt explicabo deserunt ullam, veritatis, aliquam labore dolore iure illo sit doloremque placeat voluptatibus, quas autem perspiciatis enim. Eveniet veniam velit non aliquid illum soluta!
    Reiciendis vero repellat dolorum fugiat. Minus, adipisci consectetur in iste tempora labore, quis iure provident fugit laborum blanditiis saepe quo accusantium explicabo rerum voluptatem sed sunt dolorum facilis! Doloribus, dignissimos.
    Optio neque nihil possimus! Aperiam reprehenderit ab mollitia qui placeat laborum, sit dolore fuga numquam sed? Distinctio aspernatur nulla, incidunt porro, eaque deleniti beatae, quod quaerat est ducimus nam architecto.
    Animi nostrum aliquid nemo dolorum voluptate! Debitis ad, error rem animi alias saepe maxime suscipit obcaecati dolorum amet! Recusandae inventore quis culpa impedit et, odit perferendis nisi tenetur reiciendis sit?',
    true,
    1,
    now(),
    now(),
    1
  );

insert into
  `userLog` (`id`, `userId`, `loginAt`, `logoutAt`)
values
  (1, 1, now(), now());

insert into
  `savePost` (`id`, `userId`, `postId`)
values
  (1, 1, 2),
  (2, 1, 1),
  (3, 1, 3),
  (4, 1, 4),
  (5, 1, 5);

select
  *
from
  `post`
  inner join `user` on `post`.`authorId` = `user`.`id`
  inner join `subject` on `post`.`subjectId` = `subject`.`id`
where
  `post`.`id` = 1;
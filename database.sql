CREATE TABLE `users` (
  `id` integer PRIMARY KEY,
  `username` varchar(255),
  `position` varchar(255),
  `phone` varchar(255),
  `gender` enum('male','female')
);

CREATE TABLE `ads` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `title` varchar(255),
  `describtion` text,
  `status_id` integer,
  `branch_id` integer,
  `address` varchar(255),
  `price` float,
  `rooms` integer,
  `branch` integer,
  `created_at` timestamp
);

CREATE TABLE `status` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `branch` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `address` varchar(255),
  `created_at` timestamp
);

ALTER TABLE `ads` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `ads` ADD FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
ALTER TABLE `ads` ADD FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);
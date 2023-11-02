-- (A) ROLES
CREATE TABLE `roles` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT;

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Supervisor');

-- (B) PERMISSIONS
CREATE TABLE `permissions` (
  `perm_id` bigint(20) NOT NULL,
  `perm_mod` varchar(5) NOT NULL,
  `perm_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`),
  ADD KEY `perm_mod` (`perm_mod`);

ALTER TABLE `permissions`
  MODIFY `perm_id` bigint(20) NOT NULL AUTO_INCREMENT;

INSERT INTO `permissions` (`perm_id`, `perm_mod`, `perm_desc`) VALUES
(1, 'USR', 'Get users'),
(2, 'USR', 'Save users'),
(3, 'USR', 'Delete users');

-- (C) ROLE PERMISSIONS
CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) NOT NULL,
  `perm_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`perm_id`);

INSERT INTO `roles_permissions` (`role_id`, `perm_id`) VALUES
(1, 1), (1, 2), (1, 3),
(2, 1);

-- (D) USERS
CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `role_id` (`role_id`);

ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT;

INSERT INTO `users` (`user_email`, `user_password`, `role_id`) VALUES
('joe@doe.com', '123456', 1),
('jon@doe.com', '123456', 2);
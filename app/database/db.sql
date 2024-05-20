-- Table structure for table `users`
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fname` varchar(255) NOT NULL,
    `lname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `vote` tinyint(1),
    `username` varchar(255),
    `password` varchar(255) NOT NULL,
    `code` mediumint(50) NOT NULL,
    `status` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `condidats`
CREATE TABLE IF NOT EXISTS `condidats` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `voix` int DEFAULT 0,
    `description` text,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Inserting data to `condidats`
--

INSERT INTO `condidats` (`name`, `voix`, `description`) 
VALUES
    ('Candidate 1', 0, 'Description for Candidate 1'),
    ('Candidate 2', 0, 'Description for Candidate 2'),
    ('Candidate 3', 0, 'Description for Candidate 3'),
    ('Candidate 4', 0, 'Description for Candidate 4'),
    ('Candidate 5', 0, 'Description for Candidate 5'),
    ('Candidate 6', 0, 'Description for Candidate 6'),
    ('Candidate 7', 0, 'Description for Candidate 7'),
    ('Candidate 8', 0, 'Description for Candidate 8'),
    ('Candidate 9', 0, 'Description for Candidate 9'),
    ('Candidate 10', 0, 'Description for Candidate 10');


-- Table structure for table `votes`
CREATE TABLE IF NOT EXISTS `votes` (
    `vote_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `condidat_id` int(11) NOT NULL,
    `vote_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`vote_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`condidat_id`) REFERENCES `condidats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `votes`
ADD CONSTRAINT `unique_user_condidat` UNIQUE (`user_id`, `condidat_id`);


-- Display success message
SELECT 'Sample data inserted successfully.' AS Message;

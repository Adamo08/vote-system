SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `vote_system`
--
CREATE DATABASE `vote_system`;
USE `vote_system`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `cne` char(10) UNIQUE,
    `fname` varchar(255) NOT NULL,
    `lname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `code` mediumint(50) NOT NULL,
    `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Inserting initial data to the table `users`
--

INSERT INTO `users` (`cne`, `fname`, `lname`, `email`, `password`, `code`, `status`) 
    VALUES
        ('CNE1234567', 'John', 'Doe', 'john.doe@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234568', 'Jane', 'Smith', 'jane.smith@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234569', 'Alice', 'Johnson', 'alice.johnson@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'notverified'),
        ('CNE1234570', 'Bob', 'Brown', 'bob.brown@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234571', 'Charlie', 'Davis', 'charlie.davis@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'notverified'),
        ('CNE1234572', 'David', 'Miller', 'david.miller@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234573', 'Eve', 'Wilson', 'eve.wilson@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234574', 'Frank', 'Moore', 'frank.moore@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'notverified'),
        ('CNE1234575', 'Grace', 'Taylor', 'grace.taylor@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'verified'),
        ('CNE1234576', 'Hannah', 'Anderson', 'hannah.anderson@example.com', 'b10a8db164e0754105b7a99be72e3fe5', 0, 'notverified');

        -- Hello World



--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS products (
    id INT(11) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    qty INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Inserting initial data to the table `products`
--

INSERT INTO `products` (`name`, `price`, `description`, `qty`) 
    VALUES 
        ('Laptop', 999.99, '15-inch, 8GB RAM, 512GB SSD', 10),
        ('Smartphone', 599.99, '6.5-inch, 128GB, 5G support', 20),
        ('Headphones', 149.99, 'Wireless Bluetooth headphones', 50),
        ('Tablet', 399.99, '10-inch, 64GB, Wi-Fi only', 15),
        ('Smartwatch', 199.99, 'Fitness tracker with heart rate monitor', 30),
        ('Camera', 449.99, '20MP DSLR camera with kit lens', 12),
        ('Gaming Console', 399.99, 'Next-gen gaming console with 1TB storage', 8),
        ('Printer', 199.99, 'All-in-one printer, scanner, and copier', 25),
        ('External Hard Drive', 129.99, '2TB USB 3.0 external hard drive', 18),
        ('Wireless Router', 79.99, 'Dual-band Wi-Fi router for high-speed internet', 22),
        ('Fitness Tracker', 79.99, 'Track steps, distance, and calories burned', 35),
        ('Portable Speaker', 59.99, 'Waterproof Bluetooth speaker with 10-hour battery life', 40),
        ('Computer Monitor', 249.99, '27-inch LED monitor with Full HD resolution', 17),
        ('Wireless Mouse', 29.99, 'Ergonomic wireless mouse with adjustable DPI', 50),
        ('Keyboard', 49.99, 'Mechanical gaming keyboard with RGB backlighting', 30);

--
-- Table structure for table `votes`
-- 

CREATE TABLE IF NOT EXISTS `votes` (
    `vote_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `vote_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`vote_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `votes`
    MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;



-- Display success message
SELECT 'Sample data inserted successfully.' AS Message;

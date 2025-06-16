-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `date_updated`) VALUES
(1, 'Sample', 'Sample Only', '2020-10-16 14:56:25'),
(2, 'Programming', 'Sample category 2', '2020-10-16 14:57:13'),
(3, 'Others', 'Sed porta nisi quis nunc gravida, ut ornare velit vulputate. Aenean dictum mauris suscipit ante imperdiet tincidunt. Nulla accumsan mauris eu libero semper, eget faucibus mi vulputate. In hac habitasse platea dictumst. Etiam pulvinar quam quis sapien consectetur, ac volutpat risus ultricies. Suspendisse vel hendrerit massa. Nullam tincidunt purus sit amet elit egestas, sit amet tincidunt odio luctus. Nam eget eros dui. In ultricies nisl id tortor elementum feugiat. Mauris et bibendum nisl, in ultricies turpis.', '2020-10-16 14:58:12'),
(4, 'Tag 1', 'In ipsum magna, aliquam ut fringilla id, finibus vitae est. Donec accumsan nec velit ut dapibus. Praesent at mollis diam. Nulla facilisi. Curabitur tempor blandit purus id pellentesque. Quisque sed ligula aliquam nulla luctus sodales. In risus velit, porttitor at lacus et, consectetur ultrices dolor. Phasellus ac venenatis nibh. Suspendisse potenti. Praesent faucibus ligula sit amet ornare varius. Integer sit amet nunc arcu.\r\n\r\n', '2020-10-17 13:15:31'),
(5, 'Tag 2', 'Phasellus vel placerat ante. Cras sollicitudin quis lacus a blandit. Suspendisse vel cursus mauris. Nulla malesuada metus varius, iaculis lacus vel, facilisis nibh. Cras congue viverra erat, ut hendrerit nunc convallis id. Etiam scelerisque sit amet est nec auctor. Curabitur faucibus convallis tellus, a auctor urna efficitur nec. Praesent luctus malesuada fermentum. Maecenas vestibulum nisi sem. Donec non rhoncus tellus.', '2020-10-17 13:15:43'),
(6, 'Tag 3', 'Vestibulum vel maximus dolor. Quisque in accumsan purus. Duis ut sapien nec massa semper elementum auctor eget odio. Donec vulputate hendrerit libero quis sollicitudin. Sed et varius justo. Maecenas consectetur mollis finibus. Integer at lectus vitae ex commodo condimentum in ut lectus. Fusce porttitor commodo eros, ut condimentum neque faucibus sed. Sed tristique luctus suscipit. Cras tincidunt quam metus, a facilisis justo luctus sed.', '2020-10-17 13:16:23'),
(7, 'Nihao', 'Im chinese', '2025-06-16 00:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `topic_id`, `user_id`, `comment`, `date_created`, `date_updated`, `likes`) VALUES
(1, 2, 1, 'Sample Comment', '2020-10-16 16:55:39', '2025-06-16 14:13:29', 2),
(2, 2, 2, 'test', '2020-10-16 17:04:34', '2025-06-16 14:32:58', 5),
(3, 2, 1, '&lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube.com/embed/H2fRcQquKsA?si=zNl81wOmCU2fQSD6&quot; title=&quot;YouTube video player&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share&quot; referrerpolicy=&quot;strict-origin-when-cross-origin&quot; allowfullscreen&gt;&lt;/iframe&gt;', '2020-10-17 08:54:46', '2025-06-16 14:24:22', 2),
(4, 2, 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/OjEg0IBR_ak?si=xSMNpYTuupe4xAW7\" frameborder=\"0\"></iframe>', '2020-10-17 09:42:04', '2025-06-16 13:54:00', 0),
(5, 2, 1, 'Yo: gurt\nGurt: Greetings', '2025-06-16 00:47:33', '2025-06-16 14:24:30', 1),
(6, 1, 4, 'hellow', '2025-06-16 00:52:18', '2025-06-16 00:52:18', 0),
(8, 3, 4, '', '2025-06-16 01:37:15', '2025-06-16 01:37:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_views`
--

CREATE TABLE `forum_views` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_views`
--

INSERT INTO `forum_views` (`id`, `topic_id`, `user_id`) VALUES
(1, 2, 2),
(2, 2, 1),
(3, 2, 3),
(4, 1, 4),
(5, 2, 4),
(6, 3, 1),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructor` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `platform_link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `category_ids` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `live_classes`
--

INSERT INTO `live_classes` (`id`, `title`, `description`, `instructor`, `start_time`, `platform_link`, `created_at`, `created_by`, `category_ids`) VALUES
(2, 'Mathematics', 'wkwkwkkwkw', 'Mathheus Cunha', '2025-06-16 16:11:00', 'https://meet.google.com/urz-budm-wcp?pli=1', '2025-06-16 09:11:16', 4, NULL),
(3, 'dwdknwd', 'wdqwd', 'Aleexandro Garnacho', '2025-06-16 16:43:00', 'https://meet.google.com/urz-budm-wcp?pli=1', '2025-06-16 09:43:13', 4, '7,3,2');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `reply`, `user_id`, `date_created`, `date_updated`) VALUES
(1, 1, 'sample reply', 1, '2020-10-17 09:48:06', '0000-00-00 00:00:00'),
(2, 2, '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nunc bibendum, luctus diam id, tincidunt nisl. Vestibulum turpis arcu, fringilla sed lacus in, eleifend vulputate purus. Mauris sollicitudin metus in risus finibus fringilla.&lt;/span&gt;&lt;br&gt;', 1, '2020-10-17 09:48:57', '0000-00-00 00:00:00'),
(3, 1, 'asdasd&lt;p&gt;asdasd&lt;/p&gt;', 1, '2020-10-17 09:52:02', '0000-00-00 00:00:00'),
(4, 1, 's', 1, '2020-10-17 10:01:00', '0000-00-00 00:00:00'),
(5, 1, 'asdaasd', 1, '2020-10-17 10:01:06', '0000-00-00 00:00:00'),
(6, 1, 'asdasd&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2020-10-17 10:01:53', '0000-00-00 00:00:00'),
(7, 1, 'asdsdsd', 1, '2020-10-17 10:16:09', '0000-00-00 00:00:00'),
(8, 1, '1', 1, '2020-10-17 10:16:13', '0000-00-00 00:00:00'),
(9, 1, '2', 1, '2020-10-17 10:16:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_ids`, `title`, `content`, `user_id`, `date_created`) VALUES
(1, '3,2,1', 'Sample Topic', '&lt;h2 style=&quot;margin-bottom: 0px; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; color: rgb(0, 0, 0); padding: 0px; text-align: justify;&quot;&gt;Sample Topic&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px;&quot;&gt;Sed porta nisi quis nunc gravida, ut ornare velit vulputate. Aenean dictum mauris suscipit ante imperdiet tincidunt. Nulla accumsan mauris eu libero semper, eget faucibus mi vulputate. In hac habitasse platea dictumst. Etiam pulvinar quam quis sapien consectetur, ac volutpat risus ultricies. Suspendisse vel hendrerit massa. Nullam tincidunt purus sit amet elit egestas, sit amet tincidunt odio luctus. Nam eget eros dui. In ultricies nisl id tortor elementum feugiat. Mauris et bibendum nisl, in ultricies turpis. Maecenas elit justo, molestie vel porta sit amet, commodo et sapien. Nulla porta non leo quis suscipit. Integer eu commodo nisi. Fusce eu sodales lacus.&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;text-align: justify;&quot;&gt;&lt;/p&gt;', 1, '2020-10-16 12:25:14'),
(2, '2', 'Topic 2', '&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nunc bibendum, luctus diam id, tincidunt nisl. Vestibulum turpis arcu, fringilla sed lacus in, eleifend vulputate purus. Mauris sollicitudin metus in risus finibus fringilla. Praesent a magna eget arcu pretium consectetur a semper nisi. Quisque ut enim blandit, pellentesque quam a, ullamcorper diam. Suspendisse eget ultrices felis. Donec eu tortor lobortis, luctus quam quis, lobortis purus. Nunc varius sagittis nisi, in posuere mauris accumsan ac. Integer a suscipit risus. Proin ultrices diam ac nulla mattis vehicula. Aliquam metus urna, fringilla a suscipit vehicula, sollicitudin non neque. Integer tincidunt porta neque in bibendum. Ut cursus, nunc vitae consequat ullamcorper, neque neque viverra sem, sed rutrum metus ante non odio. Vivamus leo orci, consequat et sagittis vel, varius eu mi.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Vivamus id odio in diam tincidunt posuere. Morbi tempor, sapien vitae tristique placerat, tortor enim sollicitudin erat, quis ornare erat metus sed ex. Mauris accumsan tristique elit, at tempus odio auctor eget. Nullam ullamcorper convallis orci id condimentum. Donec laoreet est ut feugiat aliquam. Proin porta consectetur hendrerit. Quisque vitae nunc a orci fringilla lobortis. Ut bibendum purus sit amet molestie viverra. Quisque elementum mollis est, sit amet dignissim ligula semper sed. Mauris in nunc mi. Praesent ac felis eget purus ullamcorper porta. Fusce non laoreet mauris. In in sem a sem molestie varius sed id libero.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;pre style=&quot;height: 366px;&quot;&gt;&lt;br&gt;&lt;/pre&gt;', 1, '2020-10-16 16:07:54'),
(3, '7', 'RM ', 'shallom', 4, '2025-06-16 00:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'Sample User', 'suser@gmail.com', '0192023a7bbd73250516f069df18b500', 2),
(3, 'Sample user', 'suser2@gmail.com', '46fd21746f5a5924c7f515fbf6ccc81e', 2),
(4, 'Samuel', 'pamulang', 'e6fb448feb2fa877aab63b3713027775', 2),
(5, 'oswin', 'oswin@gmail.com', 'f6f720b1bc861856f25c482eba7c5ae1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forum_views`
--
ALTER TABLE `forum_views`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

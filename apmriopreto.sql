-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 08, 2021 at 05:51 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apmriopreto`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `url`, `type`) VALUES
(1, 'Veículos', 'veiculos', NULL),
(2, 'Casas', 'casas', NULL),
(3, 'Notebook', 'notebook', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_has_contents`
--

CREATE TABLE `categories_has_contents` (
  `categories_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_has_contents`
--

INSERT INTO `categories_has_contents` (`categories_id`, `contents_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 3),
(2, 5),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `short_description` text,
  `content` longtext,
  `price` decimal(15,2) DEFAULT NULL,
  `announcement_type` int(11) DEFAULT NULL COMMENT '1 - Produto, 2 - Serviço',
  `email` varchar(300) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `type` varchar(45) NOT NULL COMMENT 'post,news,page,page-name',
  `url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `description`, `short_description`, `content`, `price`, `announcement_type`, `email`, `phone`, `type`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Casa', NULL, 'Linda casa no jardim alguma coisa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae tincidunt mauris. Nulla iaculis tempor quam vel consectetur. Nam tincidunt et magna sit amet sodales. Phasellus posuere nec justo ultricies mattis. Vestibulum posuere massa et arcu scelerisque, a semper magna placerat. Pellentesque nec efficitur ex, quis malesuada quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque nulla nulla, tristique et euismod ut, laoreet condimentum tellus.\r\n</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis ante dui, vitae posuere purus vulputate accumsan. Donec at mi lectus. Duis vel urna in neque scelerisque pellentesque. Donec a justo nibh. Aenean ut urna felis. Aenean consequat eros non est ultrices, sed suscipit enim egestas. Integer volutpat pulvinar faucibus. Phasellus id justo tristique, maximus sem pretium, tristique enim. Pellentesque eget consectetur urna. Donec est purus, pretium ac quam congue, cursus congue elit. Etiam libero mi, maximus sit amet pellentesque eu, tempor eget ex. Etiam dapibus convallis porta. Duis risus nisi, euismod blandit ex tincidunt, scelerisque venenatis nibh. Sed facilisis arcu posuere, cursus tellus quis, sagittis dolor.\r\n</p><p>Cras volutpat rhoncus neque a euismod. Aenean lacus risus, eleifend nec ultrices at, elementum iaculis ligula. Ut ut blandit nisl. Cras non purus metus. Donec ullamcorper purus vel pretium tempus. Etiam a lobortis libero. Ut porta bibendum urna quis vulputate. Vestibulum interdum ligula non elit ornare suscipit. Aliquam elementum mi ante, fringilla accumsan nibh molestie quis. Integer volutpat faucibus risus, sed sagittis lectus aliquam eu. Mauris sit amet placerat lacus. Curabitur lobortis lectus tortor, sit amet molestie felis rutrum nec. Pellentesque nisi ex, ullamcorper a dapibus eu, sodales at sapien. Quisque quis posuere lectus. Duis facilisis eros at felis tincidunt, rutrum sagittis justo dictum.</p><p>\r\n</p><p>\r\n</p>', NULL, 1, NULL, NULL, 'products', 'casa', '1617597988606a962413862.jpeg', '2021-04-05 04:38:50', '2021-04-05 04:46:28'),
(3, 'Veiculo usado', NULL, 'asd', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae tincidunt mauris. Nulla iaculis tempor quam vel consectetur. Nam tincidunt et magna sit amet sodales. Phasellus posuere nec justo ultricies mattis. Vestibulum posuere massa et arcu scelerisque, a semper magna placerat. Pellentesque nec efficitur ex, quis malesuada quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque nulla nulla, tristique et euismod ut, laoreet condimentum tellus.\r\n</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis ante dui, vitae posuere purus vulputate accumsan. Donec at mi lectus. Duis vel urna in neque scelerisque pellentesque. Donec a justo nibh. Aenean ut urna felis. Aenean consequat eros non est ultrices, sed suscipit enim egestas. Integer volutpat pulvinar faucibus. Phasellus id justo tristique, maximus sem pretium, tristique enim. Pellentesque eget consectetur urna. Donec est purus, pretium ac quam congue, cursus congue elit. Etiam libero mi, maximus sit amet pellentesque eu, tempor eget ex. Etiam dapibus convallis porta. Duis risus nisi, euismod blandit ex tincidunt, scelerisque venenatis nibh. Sed facilisis arcu posuere, cursus tellus quis, sagittis dolor.\r\n</p><p>Cras volutpat rhoncus neque a euismod. Aenean lacus risus, eleifend nec ultrices at, elementum iaculis ligula. Ut ut blandit nisl. Cras non purus metus. Donec ullamcorper purus vel pretium tempus. Etiam a lobortis libero. Ut porta bibendum urna quis vulputate. Vestibulum interdum ligula non elit ornare suscipit. Aliquam elementum mi ante, fringilla accumsan nibh molestie quis. Integer volutpat faucibus risus, sed sagittis lectus aliquam eu. Mauris sit amet placerat lacus. Curabitur lobortis lectus tortor, sit amet molestie felis rutrum nec. Pellentesque nisi ex, ullamcorper a dapibus eu, sodales at sapien. Quisque quis posuere lectus. Duis facilisis eros at felis tincidunt, rutrum sagittis justo dictum.</p><p>\r\n</p><p>\r\n</p>', '99999999.99', 1, 'enzo.nagata@gmail.com', NULL, 'products', 'veiculo-usado', '1617598476606a980c1300e.jpeg', '2021-04-05 04:54:35', '2021-04-06 04:16:01'),
(5, 'Encanador', NULL, 'asd as das', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed magna quis elit suscipit rhoncus id vel massa. Ut neque diam, pretium sed lorem sed, vulputate porttitor purus. Proin venenatis massa non malesuada aliquet. Curabitur interdum tincidunt finibus. Phasellus congue justo lectus, vitae faucibus nulla viverra quis. Phasellus vitae neque mi. Vestibulum dictum arcu eget auctor auctor. Suspendisse ac porta eros. Morbi eu turpis scelerisque, aliquet ex eget, pellentesque nulla. Curabitur sed orci accumsan, faucibus eros id, congue eros. Morbi tempus quam massa, a egestas enim rhoncus in.\r\n</p><p>Mauris a lectus sit amet ipsum lacinia blandit a ultrices est. Donec feugiat tincidunt fermentum. Duis nec dolor neque. Donec in tortor quis mauris venenatis tempor sit amet non erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac eros sapien. Vivamus viverra tincidunt ultricies.\r\n</p><p>Sed lacinia leo ac eleifend porta. Vestibulum rhoncus urna ligula, id feugiat metus lacinia ac. Vestibulum in hendrerit urna, et pellentesque nulla. Vivamus non tincidunt urna, eu ornare est. Morbi semper vehicula enim sit amet viverra. Nullam volutpat porta pharetra. Vivamus eget tincidunt eros. Proin at neque in turpis cursus pretium non a nisi. Pellentesque faucibus interdum dui et dapibus. Nulla suscipit metus nec malesuada iaculis. Phasellus luctus lacus et ultricies blandit. Cras sit amet consectetur arcu.\r\n</p><p>Proin dapibus, felis quis porta varius, justo massa imperdiet tellus, nec pulvinar massa magna molestie odio. Etiam viverra luctus consectetur. Ut lectus risus, sodales et est vitae, dapibus luctus justo. Nam ac tincidunt tellus. Maecenas nisl nisi, elementum eget scelerisque sit amet, consectetur sit amet neque. Sed fringilla erat non massa mattis, a sollicitudin nisi convallis. Proin vestibulum elit eget tortor condimentum, eu vehicula justo convallis. Sed vitae accumsan lacus. Quisque tellus tellus, accumsan eu molestie vel, volutpat sit amet massa. Sed eu pharetra libero. Morbi vitae pellentesque leo. Etiam at orci at quam semper dapibus.\r\n</p><p>Praesent luctus bibendum neque vitae aliquam. Integer non pellentesque massa. Proin congue porttitor cursus. Fusce suscipit vitae orci at volutpat. Maecenas ultricies viverra enim, pulvinar tristique neque mattis ut. In eu lorem sit amet nisl molestie laoreet vitae a lectus. Ut venenatis lacus ultrices, bibendum erat non, gravida augue. In et eleifend enim. Fusce egestas tellus in volutpat imperdiet. Suspendisse potenti.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, 2, 'contato@contato.com.br', '(17) 99999-9999', 'services', 'encanador', '1617600265606a9f09e9d86.jpeg', '2021-04-05 05:24:25', '2021-04-05 05:24:25'),
(6, 'Noticia 1', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, NULL, NULL, NULL, 'news', 'noticia-1', '1617676018606bc6f2dfa51.jpeg', '2021-04-06 02:26:58', '2021-04-06 02:26:58'),
(7, 'Notícia 2', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, NULL, NULL, NULL, 'news', 'noticia-2', '1617676066606bc722473d4.jpeg', '2021-04-06 02:27:46', '2021-04-06 02:27:46'),
(8, 'Noticia 3', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.\r\n</p><p>Aenean finibus sem quis elit posuere rutrum. Etiam id vestibulum sem. Curabitur ut magna eget odio iaculis condimentum. Aliquam bibendum urna eget felis fringilla aliquam. Nulla pellentesque ex sit amet ante lacinia, vel consequat dolor ullamcorper. Maecenas sed vestibulum nisi. Suspendisse est sem, dapibus id elementum eu, egestas non diam. Etiam fermentum mauris sed sollicitudin commodo. Pellentesque sem leo, ornare eget finibus vitae, volutpat a quam. Mauris a convallis lacus. Aliquam accumsan aliquam volutpat. Phasellus convallis nunc diam, sed venenatis ante hendrerit et. Donec vestibulum turpis quam, sed accumsan magna tincidunt ac. Pellentesque posuere lorem eget velit convallis, ut tincidunt justo tempor. Sed feugiat convallis risus, id ultrices est malesuada et.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, NULL, NULL, NULL, 'news', 'noticia-3', '1617676105606bc74955c09.jpeg', '2021-04-06 02:28:25', '2021-04-06 02:28:25'),
(9, 'Noticia 4', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.\r\n</p><p>Aenean finibus sem quis elit posuere rutrum. Etiam id vestibulum sem. Curabitur ut magna eget odio iaculis condimentum. Aliquam bibendum urna eget felis fringilla aliquam. Nulla pellentesque ex sit amet ante lacinia, vel consequat dolor ullamcorper. Maecenas sed vestibulum nisi. Suspendisse est sem, dapibus id elementum eu, egestas non diam. Etiam fermentum mauris sed sollicitudin commodo. Pellentesque sem leo, ornare eget finibus vitae, volutpat a quam. Mauris a convallis lacus. Aliquam accumsan aliquam volutpat. Phasellus convallis nunc diam, sed venenatis ante hendrerit et. Donec vestibulum turpis quam, sed accumsan magna tincidunt ac. Pellentesque posuere lorem eget velit convallis, ut tincidunt justo tempor. Sed feugiat convallis risus, id ultrices est malesuada et.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, NULL, NULL, NULL, 'news', 'noticia-4', '1617676206606bc7aec015c.jpeg', '2021-04-06 02:30:06', '2021-04-06 02:30:06'),
(10, 'Serviço 1', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.\r\n</p><p>Aenean finibus sem quis elit posuere rutrum. Etiam id vestibulum sem. Curabitur ut magna eget odio iaculis condimentum. Aliquam bibendum urna eget felis fringilla aliquam. Nulla pellentesque ex sit amet ante lacinia, vel consequat dolor ullamcorper. Maecenas sed vestibulum nisi. Suspendisse est sem, dapibus id elementum eu, egestas non diam. Etiam fermentum mauris sed sollicitudin commodo. Pellentesque sem leo, ornare eget finibus vitae, volutpat a quam. Mauris a convallis lacus. Aliquam accumsan aliquam volutpat. Phasellus convallis nunc diam, sed venenatis ante hendrerit et. Donec vestibulum turpis quam, sed accumsan magna tincidunt ac. Pellentesque posuere lorem eget velit convallis, ut tincidunt justo tempor. Sed feugiat convallis risus, id ultrices est malesuada et.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, 2, NULL, NULL, 'ownservices', 'servico-1', NULL, '2021-04-06 02:31:05', '2021-04-06 02:31:05'),
(11, 'Serviço 2', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.\r\n</p><p>Aenean finibus sem quis elit posuere rutrum. Etiam id vestibulum sem. Curabitur ut magna eget odio iaculis condimentum. Aliquam bibendum urna eget felis fringilla aliquam. Nulla pellentesque ex sit amet ante lacinia, vel consequat dolor ullamcorper. Maecenas sed vestibulum nisi. Suspendisse est sem, dapibus id elementum eu, egestas non diam. Etiam fermentum mauris sed sollicitudin commodo. Pellentesque sem leo, ornare eget finibus vitae, volutpat a quam. Mauris a convallis lacus. Aliquam accumsan aliquam volutpat. Phasellus convallis nunc diam, sed venenatis ante hendrerit et. Donec vestibulum turpis quam, sed accumsan magna tincidunt ac. Pellentesque posuere lorem eget velit convallis, ut tincidunt justo tempor. Sed feugiat convallis risus, id ultrices est malesuada et.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum vitae quam eu volutpat. Pellentesque a libero a risus malesuada blandit sit amet porta dui. Nam maximus nibh eu egestas pretium. Donec ut ipsum eget magna pretium vehicula. Ut eget dignissim elit, eget tristique nisi. Donec gravida, massa at venenatis ullamcorper, massa leo viverra turpis, id tincidunt lectus justo a ex. Duis sodales urna quis augue luctus molestie. Phasellus porttitor scelerisque neque, sed fermentum leo ultrices scelerisque. Etiam nec orci a lorem convallis vehicula nec a tellus. Proin vitae nisl molestie, eleifend nulla et, accumsan quam.\r\n</p><p>Maecenas egestas mi eu mi rhoncus hendrerit. Morbi blandit gravida lorem, eget cursus justo. Nunc sed dolor vel lorem efficitur pulvinar. Sed congue in tellus vitae euismod. Curabitur in rhoncus massa. Nulla justo lectus, euismod et purus sed, sodales laoreet lacus. Aenean quis pellentesque tortor.\r\n</p><p>Pellentesque sed risus malesuada, feugiat magna non, varius magna. Aliquam lobortis in nisi eget dignissim. Duis vel lacus nec purus gravida ullamcorper. Praesent sit amet pharetra massa. Quisque faucibus tortor non leo mollis sollicitudin. In non orci malesuada, dapibus tellus posuere, maximus metus. Phasellus accumsan leo quis augue consequat, sit amet rhoncus massa ultricies.\r\n</p><p>Vestibulum molestie eget metus eu facilisis. Sed aliquet maximus augue a rhoncus. Pellentesque eget urna erat. Nullam mi risus, commodo vitae nunc in, fermentum fringilla orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce elit metus, porta in lacinia et, aliquam vel nulla. Ut et malesuada elit. Nunc ultrices ultrices nunc, nec congue libero semper a. Fusce laoreet elementum enim, ut semper augue ornare in. Etiam tristique pretium quam vel facilisis. Donec dolor mauris, efficitur quis magna non, aliquet pharetra sem. Vestibulum id lacus augue. Nam suscipit nibh metus. Maecenas varius diam id nisi rhoncus venenatis. Pellentesque in nulla ipsum.\r\n</p><p>Aenean finibus sem quis elit posuere rutrum. Etiam id vestibulum sem. Curabitur ut magna eget odio iaculis condimentum. Aliquam bibendum urna eget felis fringilla aliquam. Nulla pellentesque ex sit amet ante lacinia, vel consequat dolor ullamcorper. Maecenas sed vestibulum nisi. Suspendisse est sem, dapibus id elementum eu, egestas non diam. Etiam fermentum mauris sed sollicitudin commodo. Pellentesque sem leo, ornare eget finibus vitae, volutpat a quam. Mauris a convallis lacus. Aliquam accumsan aliquam volutpat. Phasellus convallis nunc diam, sed venenatis ante hendrerit et. Donec vestibulum turpis quam, sed accumsan magna tincidunt ac. Pellentesque posuere lorem eget velit convallis, ut tincidunt justo tempor. Sed feugiat convallis risus, id ultrices est malesuada et.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, 2, NULL, NULL, 'ownservices', 'servico-2', NULL, '2021-04-06 02:31:38', '2021-04-06 02:31:38'),
(12, 'Eletricista', NULL, 'asdasdsa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium maximus velit quis feugiat. Phasellus ac lorem lectus. Mauris dapibus ultricies odio at vehicula. Donec vehicula congue augue, fermentum sollicitudin felis laoreet id. Fusce vel gravida lectus, ut pretium lacus. Donec pretium lobortis ligula, vel vestibulum turpis eleifend nec. Nunc nibh ipsum, ultrices ut iaculis eget, maximus eget sapien. Integer accumsan congue erat, quis suscipit lectus malesuada eu. Ut auctor erat vitae velit pharetra sodales. Ut interdum orci at nulla convallis gravida. Morbi mattis tempus condimentum.\r\n</p><p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum dictum non risus vitae malesuada. Vestibulum molestie ac magna at hendrerit. Nullam viverra justo lectus, sit amet feugiat odio posuere eget. Donec metus libero, scelerisque eget velit eget, mattis egestas orci. Suspendisse efficitur, dolor at mollis rhoncus, elit mi feugiat neque, id rutrum erat velit eu justo. Aenean pharetra tellus eu sollicitudin dignissim. Mauris pretium odio arcu, sed ullamcorper risus dictum eu. Curabitur suscipit porta urna ut pulvinar. Quisque nisl metus, blandit in mi at, vestibulum fermentum lectus. Vestibulum et placerat erat, sed sollicitudin diam. Fusce nec quam quis purus viverra fermentum. Ut vitae metus mollis, sollicitudin arcu viverra, consequat eros. Proin sed efficitur felis. Cras tincidunt gravida gravida.\r\n</p><p>Pellentesque enim dui, placerat eu mattis at, convallis nec diam. Quisque a cursus ante. Phasellus lacus augue, feugiat ac ex ut, tempor rutrum ante. Curabitur commodo vitae diam ac interdum. Nullam volutpat luctus volutpat. Etiam placerat eu elit laoreet convallis. Phasellus pulvinar rutrum interdum. Praesent facilisis eros lacus, vitae egestas felis molestie vel. Ut sed eros felis.\r\n</p><p>Donec rhoncus viverra malesuada. Vestibulum tempor sed purus nec hendrerit. In mollis lacus neque. Duis nisi felis, varius eget ipsum vitae, mattis vestibulum tortor. In risus nisi, tempus malesuada ultrices sed, viverra et dui. Donec euismod cursus sollicitudin. Nam arcu tellus, sodales vitae porttitor id, venenatis eget ipsum. Pellentesque ornare posuere sapien, sed euismod augue gravida at. Donec pellentesque elementum nunc, in ullamcorper quam feugiat non.\r\n</p><p>Sed maximus lectus id arcu vestibulum, ut volutpat mi ornare. Curabitur eget gravida erat. Curabitur viverra lectus non risus pellentesque, in dictum lorem bibendum. Sed at enim turpis. Vestibulum eget posuere erat. Pellentesque iaculis nulla in risus vehicula pulvinar. Sed in pretium massa. Maecenas sit amet lectus sed diam tincidunt dapibus sed vitae metus. Morbi mattis metus a consectetur viverra.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', NULL, 2, 'contato@contato.com.br', '(17) 99764-0650', 'services', 'eletricista', '1617684281606be73906435.jpeg', '2021-04-06 04:44:40', '2021-04-06 04:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `contents_has_contents`
--

CREATE TABLE `contents_has_contents` (
  `contents_id` int(11) NOT NULL,
  `contents_child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contents_images`
--

CREATE TABLE `contents_images` (
  `id` int(11) NOT NULL,
  `description` text,
  `type` varchar(45) DEFAULT NULL,
  `order` varchar(45) DEFAULT NULL,
  `image` text,
  `contents_id` int(11) NOT NULL,
  `path` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents_images`
--

INSERT INTO `contents_images` (`id`, `description`, `type`, `order`, `image`, `contents_id`, `path`) VALUES
(1, 'Frente', 'gallery', '0', '1617597530606a945a34b4e.jpeg', 1, '/var/www/html/public/content//1/'),
(2, NULL, 'gallery', '0', '1617598476606a980c2d688.jpeg', 3, '/var/www/html/public/content//3/'),
(3, NULL, 'gallery', '0', '1617600265606a9f09f0b12.jpeg', 5, '/var/www/html/public/content//5/'),
(4, NULL, 'gallery', '0', '1617600266606a9f0a06769.jpeg', 5, '/var/www/html/public/content//5/'),
(5, NULL, 'gallery', '0', '1617600266606a9f0a112af.jpeg', 5, '/var/www/html/public/content//5/'),
(6, NULL, 'gallery', '0', '1617600266606a9f0a1b127.jpeg', 5, '/var/www/html/public/content//5/'),
(7, NULL, 'gallery', '0', '1617600266606a9f0a20695.jpeg', 5, '/var/www/html/public/content//5/'),
(8, NULL, 'gallery', '0', '1617676018606bc6f2e50c1.jpeg', 6, '/var/www/html/public/content//6/'),
(9, NULL, 'gallery', '0', '1617676019606bc6f30919e.jpeg', 6, '/var/www/html/public/content//6/'),
(10, NULL, 'gallery', '0', '1617676019606bc6f31050f.jpeg', 6, '/var/www/html/public/content//6/'),
(11, NULL, 'gallery', '0', '1617676066606bc72252557.jpeg', 7, '/var/www/html/public/content//7/'),
(12, NULL, 'gallery', '0', '1617676066606bc7225a0c8.jpeg', 7, '/var/www/html/public/content//7/'),
(13, NULL, 'gallery', '0', '1617676105606bc7495bc75.jpeg', 8, '/var/www/html/public/content//8/'),
(14, NULL, 'gallery', '0', '1617676105606bc74963dff.jpeg', 8, '/var/www/html/public/content//8/'),
(15, NULL, 'gallery', '0', '1617676206606bc7aec4451.jpeg', 9, '/var/www/html/public/content//9/'),
(16, NULL, 'gallery', '0', '1617676206606bc7aeca395.jpeg', 9, '/var/www/html/public/content//9/'),
(17, NULL, 'gallery', '0', '1617676206606bc7aeceab1.jpeg', 9, '/var/www/html/public/content//9/'),
(18, NULL, 'gallery', '0', '1617684281606be7390e8aa.jpeg', 12, '/var/www/html/public/content//12/'),
(19, NULL, 'gallery', '0', '1617684281606be7391c298.jpeg', 12, '/var/www/html/public/content//12/'),
(20, NULL, 'gallery', '0', '1617684281606be739235cc.jpeg', 12, '/var/www/html/public/content//12/'),
(21, NULL, 'gallery', '0', '1617684281606be7392907b.jpeg', 12, '/var/www/html/public/content//12/');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `address` text,
  `number` varchar(45) DEFAULT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(45) DEFAULT NULL,
  `instagram` text,
  `facebook` text,
  `linkedin` text,
  `twitter` text,
  `pinterest` text,
  `phone1` varchar(45) DEFAULT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `email1` text,
  `email2` text,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `address`, `number`, `complement`, `district`, `zipcode`, `city`, `state`, `whatsapp`, `instagram`, `facebook`, `linkedin`, `twitter`, `pinterest`, `phone1`, `phone2`, `email1`, `email2`, `meta_description`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17 99999-9999', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enzo Nagata', 'enzo.nagata@gmail.com', NULL, '$2y$10$.bPWwZg.UXGSNKQ8.Vw2TeQI8KJWHcFM2Wrr0uIT7ZurhJQovO5eC', NULL, '2021-04-05 01:52:52', '2021-04-05 01:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_has_contents`
--
ALTER TABLE `categories_has_contents`
  ADD PRIMARY KEY (`categories_id`,`contents_id`),
  ADD KEY `fk_categories_has_contents_contents1_idx` (`contents_id`),
  ADD KEY `fk_categories_has_contents_categories1_idx` (`categories_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_UNIQUE` (`url`);

--
-- Indexes for table `contents_has_contents`
--
ALTER TABLE `contents_has_contents`
  ADD PRIMARY KEY (`contents_id`,`contents_child_id`),
  ADD KEY `fk_contents_has_contents_contents2_idx` (`contents_child_id`),
  ADD KEY `fk_contents_has_contents_contents1_idx` (`contents_id`);

--
-- Indexes for table `contents_images`
--
ALTER TABLE `contents_images`
  ADD PRIMARY KEY (`id`,`contents_id`),
  ADD KEY `fk_contents_images_contents_idx` (`contents_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contents_images`
--
ALTER TABLE `contents_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_has_contents`
--
ALTER TABLE `categories_has_contents`
  ADD CONSTRAINT `fk_categories_has_contents_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categories_has_contents_contents1` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contents_has_contents`
--
ALTER TABLE `contents_has_contents`
  ADD CONSTRAINT `fk_contents_has_contents_contents1` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contents_has_contents_contents2` FOREIGN KEY (`contents_child_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contents_images`
--
ALTER TABLE `contents_images`
  ADD CONSTRAINT `fk_contents_images_contents` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

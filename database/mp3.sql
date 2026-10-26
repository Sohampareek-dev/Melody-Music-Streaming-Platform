-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 05:39 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('soham098@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `sn` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ccode` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`sn`, `code`, `title`, `description`, `ccode`) VALUES
(2, 'mUIgXML_2', 'Krishna flow ', 'This album contains songs related to lord krishna which will relax your mind and your soul.', 'vdem293_1'),
(4, 'KAOaeFg_4', 'We Can !!', 'This album include energetic songs which will bring your confidence to the peak level.', 'LlswAVT_3'),
(5, 'IwgRFlk_5', 'Ganesh Flow', 'This album is devoted to the  Lord of intelligence lord Ganesh. ', 'vdem293_1'),
(6, 'EFZpdg3_6', 'Nothing Impossible ', 'This album includes Bollywood energetic songs which will encourage you to fight against worst conditions.', 'LlswAVT_3'),
(7, 'HyeS2xh_7', 'Peaceful Flow', 'This album consists of all relaxing songs and music which will relax your mind and reduce your overthinking .', '67DgjMH_5'),
(8, 'nxc2Ib9_8', 'Arijit Singh ', 'This album consists of most famous Indian singer and musician. His songs are predominantly in Hindi and Bengali.', 'q5zlm3Z_2'),
(9, 'en3sU4w_9', 'Indian Classic', 'This album contains the Classical music of India by instruments like sitar , veena and tanpura.', 'bNvc4xh_4'),
(10, 'DGKlSNa_10', 'Rajasthani Folk', 'This album contains the Rajasthani traditional songs and music sang or played by the ancestors of this land of sand.', 'bNvc4xh_4'),
(11, 'qUpRxOm_11', 'Ar Rahman', 'A. R. Rahman, born Allah-Rakha Rahman, is a highly acclaimed Indian composer, singer, songwriter, and music director, known for his blend of Indian classical, electronic, world, and traditional orchestral music. He is also a philanthropist. ', 'q5zlm3Z_2'),
(12, '7wtG26z_12', 'Sonu Nigam ', 'Sonu Nigam is an Indian singer, actor, and voice-over artist. He was born on July 30, 1973 in Faridabad, Haryana. He is known for his unique voice, versatility, and stage presence. \r\n', 'q5zlm3Z_2'),
(13, 'zBNn5pH_13', 'Sanam Teri Kasam ', 'Sanam Teri Kasam has some enticing elements in the orchestration like violin solo and bass but Anki Tiwariâ€™s vocals bog down a lot whereas Palak Muchhalâ€™s sweet vocal brings some respite in this conventionally tuned song. Mohammed Irfan sounds better in the songâ€™s reprise version. ', 'q5zlm3Z_2'),
(14, 'Nl4svVI_14', 'Aigiri Nandini', 'This Entire album is filled with the songs Maa Durga and energizes your soul.', 'vdem293_1'),
(15, 'P1NTxeF_15', 'Hope', 'This album contains songs which will make your hopes strong and complete.', 'LlswAVT_3'),
(16, 'dmOiDav_16', 'Dream Weaver', 'This album contains songs which will make your mind to  achieve your dreams.', 'LlswAVT_3'),
(17, 'CbB956g_17', 'Shiv Bhajan', 'This Album contains Lord Shivs mantra , sholaks and bhajans.', 'vdem293_1'),
(18, 'izZTeFj_18', 'Lord Vishnu', 'This Album contains mantra , shloks and bhajans of  Lord Vishnu.', 'vdem293_1'),
(19, 'dihsqUw_19', 'Classical Beats', 'This playlist consists of famous classical music by professional Musicians.', 'bNvc4xh_4');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `sn` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sn`, `code`, `category`) VALUES
(1, 'vdem293_1', 'Spiritual'),
(2, 'q5zlm3Z_2', 'Romantic'),
(3, 'LlswAVT_3', 'Energetic'),
(4, 'bNvc4xh_4', 'Traditional'),
(5, '67DgjMH_5', 'Relaxing');

-- --------------------------------------------------------

--
-- Table structure for table `liked_album`
--

CREATE TABLE IF NOT EXISTS `liked_album` (
  `acode` varchar(100) NOT NULL,
  `ccode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked_album`
--

INSERT INTO `liked_album` (`acode`, `ccode`, `email`) VALUES
('P1NTxeF_15', 'LlswAVT_3', 'soham098@gmail.com'),
('CbB956g_17', 'vdem293_1', 'soham098@gmail.com'),
('zBNn5pH_13', 'q5zlm3Z_2', 'mamta098@gmail.com'),
('nxc2Ib9_8', 'q5zlm3Z_2', 'anuj098@gmail.com'),
('zBNn5pH_13', 'q5zlm3Z_2', 'divya098@gmail.com'),
('izZTeFj_18', 'vdem293_1', 'divya098@gmail.com'),
('dmOiDav_16', 'LlswAVT_3', 'divya098@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `liked_song`
--

CREATE TABLE IF NOT EXISTS `liked_song` (
  `sn` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked_song`
--

INSERT INTO `liked_song` (`sn`, `code`, `email`) VALUES
(2, 'CbB956g_17', 'anuj098@gmail.com'),
(3, 'EFZpdg3_6', 'mamta098@gmail.com'),
(1, 'Nl4svVI_14', 'anuj098@gmail.com'),
(1, 'nxc2Ib9_8', 'mamta098@gmail.com'),
(2, 'IwgRFlk_5', 'mamta098@gmail.com'),
(2, 'IwgRFlk_5', 'vyom098@gmail.com'),
(4, 'nxc2Ib9_8', 'vyom098@gmail.com'),
(2, 'IwgRFlk_5', 'anuj098@gmail.com'),
(2, 'nxc2Ib9_8', 'anuj098@gmail.com'),
(1, 'mUIgXML_2', 'anuj098@gmail.com'),
(2, '7wtG26z_12', 'anuj098@gmail.com'),
(1, 'en3sU4w_9', 'anuj098@gmail.com'),
(5, 'zBNn5pH_13', 'anuj098@gmail.com'),
(2, 'IwgRFlk_5', 'soham098@gmail.com'),
(1, 'CbB956g_17', 'soham098@gmail.com'),
(5, 'zBNn5pH_13', 'mamta098@gmail.com'),
(1, 'CbB956g_17', 'divya098@gmail.com'),
(4, 'nxc2Ib9_8', 'divya098@gmail.com'),
(5, 'nxc2Ib9_8', 'divya098@gmail.com'),
(1, 'dmOiDav_16', 'divya098@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `sn` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdescription` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`sn`, `code`, `pname`, `pdescription`, `email`) VALUES
(2, 'hnlfp2_2', 'Lofi Music', 'This playlist is for sweet melody music.', 'anuj098@gmail.com'),
(3, 'wp49al_3', 'Chill On', 'This playlist is for Party Vibes !', 'anuj098@gmail.com'),
(1, 'Znlek5_1', 'Bhakti Bhajan', 'This Playlist is for Spirituality and positivity ', 'mamta098@gmail.com'),
(1, 'CUqPVk_1', 'Morning Bhajans', 'it will contain all the morning songs that i often listen to ', 'soham098@gmail.com'),
(4, '9YQBPH_4', 'Dhun', 'lovely Music for sweet core...!', 'anuj098@gmail.com'),
(2, 'QOKlrf_2', 'Chill On', 'this playlist consists of my favorite songs and beats that makes me feel Chilling and Relaxed!', 'divya098@gmail.com'),
(5, '1cuATI_5', 'Bhakti time', 'This playlist Consists of Spiritual Music.', 'divya098@gmail.com'),
(6, 'glK3fu_6', 'Vibes', 'This Playlist consists of songs for party vibes!', 'divya098@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_song`
--

CREATE TABLE IF NOT EXISTS `playlist_song` (
  `sn` int(11) NOT NULL,
  `acode` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_song`
--

INSERT INTO `playlist_song` (`sn`, `acode`, `pcode`, `email`) VALUES
(2, '7wtG26z_12', 'wp49al_3', 'anuj098@gmail.com'),
(1, 'IwgRFlk_5', 'Znlek5_1', 'mamta098@gmail.com'),
(1, 'P1NTxeF_15', 'hnlfp2_2', 'anuj098@gmail.com'),
(1, 'HyeS2xh_7', 'hnlfp2_2', 'anuj098@gmail.com'),
(2, 'IwgRFlk_5', 'wp49al_3', 'anuj098@gmail.com'),
(1, 'Nl4svVI_14', 'hnlfp2_2', 'anuj098@gmail.com'),
(4, 'zBNn5pH_13', 'wp49al_3', 'anuj098@gmail.com'),
(1, 'CbB956g_17', 'CUqPVk_1', 'soham098@gmail.com'),
(1, 'Nl4svVI_14', 'CUqPVk_1', 'soham098@gmail.com'),
(1, 'EFZpdg3_6', 'Znlek5_1', 'mamta098@gmail.com'),
(2, 'mUIgXML_2', 'Znlek5_1', 'mamta098@gmail.com'),
(5, 'nxc2Ib9_8', '9YQBPH_4', 'anuj098@gmail.com'),
(2, '7wtG26z_12', 'yBUA90_1', 'divya098@gmail.com'),
(2, 'qUpRxOm_11', 'yBUA90_1', 'divya098@gmail.com'),
(2, 'qUpRxOm_11', 'yBUA90_1', 'divya098@gmail.com'),
(1, 'Nl4svVI_14', 'mR62ts_4', 'divya098@gmail.com'),
(1, 'IwgRFlk_5', '1cuATI_5', 'divya098@gmail.com'),
(4, 'nxc2Ib9_8', 'glK3fu_6', 'divya098@gmail.com'),
(1, 'zBNn5pH_13', 'QOKlrf_2', 'divya098@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `sn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `acode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`sn`, `title`, `description`, `acode`) VALUES
(1, 'Krishna Flute theme', 'This theme will connect you to Krishna and take you to world of Vrindavan. This flute music will calm your mind and soul. Listening to this theme will let you free to feel the presence of Krishna around you.', 'mUIgXML_2'),
(2, 'Mahabharat theme ', 'This theme will connect you to the Mahabharat time. By listening to this music you can connect yourself with Krishna Gita Gyan.', 'mUIgXML_2'),
(1, 'Ganesh Mantra ', 'This mantra will increase your concentration ability and sharpen your Brain.', 'IwgRFlk_5'),
(2, 'Ganesh Prayer', 'This is the stuti or prayer of lord Ganesh. ', 'IwgRFlk_5'),
(1, 'Aarambh Hai Prachand ', 'This song is from Gulaal movie. In the voice of Piyush Mishra. This song will encourage you to fight the worst situations.', 'EFZpdg3_6'),
(1, 'Suzume ', ' A song about love, the search for meaning in life, and the struggles of everyday life. The song s title translates to sparrow in Japanese and the sparrow is a metaphor for the singer s search for meaning.', 'HyeS2xh_7'),
(1, 'Yahi Dube dil Mera ', 'This song is from Ek Tha Villain movie. It contains the  dialog of the actress and the song. ', 'nxc2Ib9_8'),
(2, 'Sawan Aaya Hai ', 'Tony Kakkar composed and wrote the song. Arijit Singh sang the song. This song is form Creature movie.', 'nxc2Ib9_8'),
(3, 'Sanam Re', 'This song is from Sanam Re movie. "Sanam Re" is an Indian Hindi-language song written and composed by Mithoon from the 2016 soundtrack album to the film of the same name. The song is sung by Arijit Singh. The track was officially released on 22 December 2015.', 'nxc2Ib9_8'),
(4, 'Samjhawan ', 'This song is a romantic song from the 2014 Hindi film  Humpty Sharma Ki Dulhania .', 'nxc2Ib9_8'),
(2, 'Ae Watan ', 'This song is a patriotic Hindi song from the 2018 Bollywood film Raazi. The song was sung by Arijit Singh and Sunidhi Chauhan, with music composed by Shankarâ€“Ehsaanâ€“Loy and lyrics by Gulzar and Allama Iqbal.', 'EFZpdg3_6'),
(5, 'To Se Naina ', '"Tose Naina" is a Hindi song from the 2013 album Mickey Virus. This song is from Saawariya film.', 'nxc2Ib9_8'),
(1, 'Sitar And Tanpura', 'This background music contains instrumental sounds of Sitar and Tanpura in Indian Style.', 'en3sU4w_9'),
(6, 'Tere Pyaar Mein', 'Lyrics by Amitabh Bhattacharya ultimate music by Pritam or copyright owner T-Series.', 'nxc2Ib9_8'),
(7, 'Apna Bana Le (Bhediya)', 'Apna Bana Le (Bhediya) mp3 by Arijit Singh upload on 2022 . Apna Bana Le (Bhediya) lyrics written by Amitabh Bhattacharya ultimate music by Sachin-Jigar or copyright owner Zee Music Company.', 'nxc2Ib9_8'),
(8, 'Jo Tum Saath Ho', ' Jo Tum Saath Ho lyrics written by Mithoon ultimate music by Mithoon or copyright owner Zee Music Company.', 'nxc2Ib9_8'),
(1, 'Tum Tak', 'Song of Raanjhanaa movie.\r\nTum Tak mp3 by Kirti Sagathia, A.V. Pooja, Javed Ali, A.R. Rahman upload on 2013 .Tum Tak lyrics written by Irshad Kamil ultimate music by A.R. Rahman or copyright owner Sony Music Entertainment.', 'qUpRxOm_11'),
(2, 'Tere Bina ', 'Tere Bina mp3 by A.R. Rahman Feat. A.R. Rahman; Chinmaye , Murtuza Qadir upload on 2013.Tere Bina lyrics written by Kailash Kher ultimate music by Paresh Kamath or copyright owner Sony Music.', 'qUpRxOm_11'),
(9, 'Enna Sona ', 'Enna Sona (OK Jaanu) mp3 by Arijit Singh, Arijit Singh, A.R. Rahman, A.R. Rahman upload on 2016. Lyrics written by Gulzar ultimate music by A.R. Rahman or copyright owner Sony Music Entertainment.', 'nxc2Ib9_8'),
(3, 'Jaane Tu', 'Jaane Tu mp3 by A.R. Rahman, Arijit Singh, Irshad Kamil upload on 2025 from Chhaava.Jaane Tu lyrics written by Irshad Kamil ultimate music by A.R. Rahman or copyright owner .', 'qUpRxOm_11'),
(1, 'Tere Bin', ' Tere Bin mp3 by Sonu Nigam upload on 2013. Tere Bin lyrics written by Faaiz Anwar ultimate music by Sajid-Wajid or copyright owner T-Series.', '7wtG26z_12'),
(2, 'Meri Duniya Hai ', ' Meri Duniya Hai mp3 by Sonu Nigam upload on 2013 .Meri Duniya Hai lyrics written by Faaiz Anwar ultimate music by Sajid-Wajid or copyright owner T-Series.', '7wtG26z_12'),
(3, 'Aaya Re Toofan', 'Aaya Re Toofan Mp3 Song Download from New Hindi Mp3 Songs Album,Aaya Re Toofan Song sung by Irshad Kamil, Kshitij Patwardhan, A.R. Rahman, Vaishali Samant, This Latest Song Music composed By A.R. Rahman and Lyrics written by Irshad Kamil. Aaya Re Toofan (From "Chhaava") mp3 song in 320Kbps, 128Kbps and 192Kbps in HD High Quality Audio Music.', 'EFZpdg3_6'),
(1, 'Sanam Teri Kasam ', '"Sanam Teri Kasam" is a song from the 2016 Bollywood film of the same name, known for its soulful and emotional lyrics, and is sung by Ankit Tiwari and Palak Muchhal. ', 'zBNn5pH_13'),
(2, 'Tera Chehra', 'It is a popular song, known for its soulful melody and heartfelt lyrics. Sung by Arijit Singh and featured in the movie "Sanam Teri Kasam".', 'zBNn5pH_13'),
(3, 'Bewajah ', '"Bewajah," a song by Harshvardhan Rane and Neeti Mohan, is a Hindi song that explores the emotional journey of a couple navigating relationship challenges, with the music video offering a glimpse into two parallel universes of their lives. ', 'zBNn5pH_13'),
(4, 'Kheech Meri Photo', '"Kheech Meri Photo," a fun and peppy song from the movie "Sanam Teri Kasam," sung by Neeti Mohan, Akasa Singh, and Darshan Raval, received positive reviews for its playful and energetic vibe, with critics praising its "repeat value" and "desi" flavor. ', 'zBNn5pH_13'),
(5, 'Haal-E-Dil(Female Version)', '"Haal-E-Dil" is a Hindi song from the 2016 movie "Sanam Teri Kasam," featuring Neeti Mohan and Sreerama Chandra, known for its romantic and emotional lyrics, and a music video that captures a sweet and pleasant atmosphere. ', 'zBNn5pH_13'),
(6, 'Ek Number', 'The "Ek Number" song, released in 2016, is a Hindi track from the album "Sanam Teri Kasam" and is composed by Himesh Reshammiya, sung by Kumar Sanu and Alka Yagnik.', 'zBNn5pH_13'),
(1, 'Aashayein', ' Aashayein - Kk mp3 by upload on 2008 from album Indias s No1 s.. Aashayein - Kk lyrics written by ultimate music by or copyright owner Times Music.', 'P1NTxeF_15'),
(2, 'Kar Har Maidaan Fateh', '"Kar Har Maidaan Fateh," which translates to "Conquer Every Field," is an inspirational song from the Bollywood film Sanju (2018), a biopic about Sanjay Dutt, that tells the story of his struggles with drug addiction and his journey to overcome it. ', 'P1NTxeF_15'),
(1, 'Land Of Dreams', 'The album Land of Dreams contains pure and sweet songs .Can be listened at night.', 'dmOiDav_16'),
(2, 'Cyber Dreams', 'It is a energetic song which will keep you energetic and relexing.', 'dmOiDav_16'),
(1, 'Aigiri Nandini', 'Aigiri Nandini is a stuti/ prayer of Maa Durga describing her power, elegance and beauty.', 'Nl4svVI_14'),
(1, 'Shiv Tandav Rock Version', 'This song is sung by Sachet Tandon and Parampara Tandon. Lyrics of this Track is penned by Yogesh Dubey.', 'CbB956g_17'),
(2, 'Har Har Shambhu ', 'This Song Har Har Shambhu  is sung by Jubin Nautial composed by Payal Dev.', 'CbB956g_17'),
(1, 'Kautilya', 'Kautilya Music is a premier independent record label dedicated to preserving and promoting the rich heritage of Indian classical music alongside cutting-edge folk and fusion sounds.', 'dihsqUw_19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('vyom098@gmail.com', 'vyom'),
('anuj098@gmail.com', 'anuj'),
('mamta098@gmail.com', 'mamta'),
('raghu098@gmail.com', 'raghu'),
('soham098@gmail.com', '123'),
('divya098@gmail.com', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 12:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookworms`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `KodeBuku` int(11) NOT NULL,
  `NamaBuku` varchar(50) NOT NULL,
  `KodePenulis` int(11) NOT NULL,
  `KodeKategori` varchar(11) NOT NULL,
  `HargaBuku` bigint(20) NOT NULL,
  `StokBuku` varchar(11) NOT NULL,
  `CoverBuku` varchar(50) NOT NULL,
  `Synopsis` text NOT NULL,
  `DateAdded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`KodeBuku`, `NamaBuku`, `KodePenulis`, `KodeKategori`, `HargaBuku`, `StokBuku`, `CoverBuku`, `Synopsis`, `DateAdded`) VALUES
(9, 'Kisaragi-san has a Piercing Gaze', 2, '7,4,11,3', 40000, '36', '6565b82f5dbae.jpg', 'Haruki Satou is a carefree second-year high school student who enjoys soccer and all things fun. He is also interested in Nozomu Kisaragi, his mysterious seatmate known for her long bangs that fall over her eyes. Ever since their first year, Haruki has longed to catch a glimpse of Nozomu\'s bare face.\r\n\r\nWhile cleaning up the classroom after school, Haruki opens a window and lets a strong breeze in, revealing Nozomu surprisingly strong, piercing gaze and attractive features. Flustered, Nozomu explains that her intimidating look is the reason she hides behind her hair. However, Nozomu turns out to be Haruki ideal type, and he quickly falls for her, thus beginning his quest to get close to her and eventually confess his feelings.', '2023-10-09'),
(10, 'Arknights Artbook Vol.1', 3, '9', 500000, '1', '6590dd0364559.jpg', 'Arknights Official Artworks Vol.1 Set, comes with exclusive bonuses including Amiya in-game outfit and more.', '2023-11-17'),
(11, 'I sold my life for ten thousand yen per year', 4, '7,13', 50000, '0', '6590e4732edf9.jpg', 'Helpless and struggling for cash, 20-year-old Kusunoki sells the last of his possessions to buy food. Noticing his poverty, an old shop owner directs him to a store that supposedly purchases lifespan, time, and health. While not completely believing the mans words, Kusunoki nevertheless finds himself at the address out of desperation and curiosity. Kusunoki is crushed when he finds out the true monetary value of his lifespan—totaling a meager three hundred thousand yen. Deciding to sell the next 30 years of his life for ten thousand yen per year, Kusunoki is left with only three months to live. After heading home with the money, he is greeted by an unexpected visitor: the same store clerk he sold his lifespan to. She introduces herself as Miyagi, the one tasked with the job of observing him until the last three days of his life. Jumyou wo Kaitotte Moratta. Ichinen ni Tsuki, Ichimanen de. follows the remaining three months of Kusunoki\'s life as he confronts lingering regrets from the past and discovers what truly gives life value.', '2023-12-01'),
(12, 'Kaguya-sama: Love Is War', 5, '7,11,3', 50000, '9', '6565c912b05c6.jpg', 'Considered a genius due to having the highest grades in the country, Miyuki Shirogane leads the prestigious Shuchiin Academy student council as its president, working alongside the beautiful and wealthy vice president Kaguya Shinomiya. The two are often regarded as the perfect couple by students despite them not being in any sort of romantic relationship. However, the truth is that after spending so much time together, the two have developed feelings for one another. unfortunately, neither is willing to confess, as doing so would be a sign of weakness. With their pride as elite students on the line, Miyuki and Kaguya embark on a quest to do whatever is necessary to get a confession out of the other. Through their daily antics, the battle of love begins!', '2023-12-12'),
(13, 'Spice & Wolf', 6, '7,15,13', 50000, '33', '6565d185bd5ac.jpg', 'Dreaming of someday owning his own shop, traveling merchant Kraft Lawrence spends his days looking for trade opportunities. One day, however, Lawrences adventure takes an unexpected turn when he discovers a naked wolf girl asleep in his wagon.\r\n\r\nThe charming girl claims to be Holo, the wolf deity of the nearby town Pasloe. Having grown weary of the ungrateful locals, she requests Lawrence to take her back to her hometown of Yoitsu, located farther north. In return, she will help him with his mercantile affairs, lending him her shrewd mind and keen judgement.\r\n\r\nThe pair now travels from town to town, dealing with various people and the troubles they come with. But as their hearts and destination grow closer, their days of companionship are numbered.', '2024-01-24'),
(14, 'Fahrenheit 451', 7, '1,16,17', 90000, '23', '65955c300cf57.jpg', 'Sixty years after its original publication, Ray Bradbury’s internationally acclaimed novel Fahrenheit 451 stands as a classic of world literature set in a bleak, dystopian future. Today its message has grown more relevant than ever before.\r\n\r\nGuy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.', '2024-01-03'),
(15, 'Harry Potter and the Sorcerer’s Stone', 8, '1,17,14', 120000, '4', '65955dce0ea55.jpg', '\"Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter H.\"\r\n\r\nHarry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harrys eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!', '2024-01-03'),
(16, 'Harry Potter and the Prisoner of Azkaban', 8, '1,17,14', 120000, '22', '65955e9b5e900.jpg', 'Harry Potter, along with his best friends, Ron and Hermione, is about to start his third year at Hogwarts School of Witchcraft and Wizardry. Harry cant wait to get back to school after the summer holidays. (Who wouldnt if they lived with the horrible Dursleys?) But when Harry gets to Hogwarts, the atmosphere is tense. Theres an escaped mass murderer on the loose, and the sinister prison guards of Azkaban have been called in to guard the school...', '2024-01-03'),
(17, '1984', 9, '1,18,17', 120000, '87', '6595853b2d00b.jpg', 'A masterpiece of rebellion and imprisonment where war is peace freedom is slavery and Big Brother is watching Thought Police Big Brother Orwellian These words have entered our vocabulary because of George Orwell s classic dystopian novel 1984 The story of one man s nightmare odyssey as he pursues a forbidden love affair through a world ruled by warring states and a power structure that controls not only information but also individual thought and memory 1984 is a prophetic haunting tale More relevant than ever before 1984 exposes the worst crimes imaginable the destruction of truth freedom and individuality With a foreword by Thomas Pynchon With a foreword by Thomas Pynchon A masterpiece of rebellion and imprisonment where war is peace freedom is slavery and Big Brother is watching View our feature on George Orwell s 1984 Thought Police Big Brother Orwellian These words have entered our vocabulary because of George Orwell s classic dystopian novel 1984 The story of one man s nightmare odyssey as he pursues a forbidden love affair through a world ruled by warring states and a power structure that controls not only information but also individual thought and memory 1984 is a prophetic haunting tale More relevant than ever before 1984 exposes the worst crimes imaginable the destruction of truth freedom and individuality This beautiful paperback edition features deckled edges and french flaps a perfect gift for any occasion', '2024-01-03'),
(18, 'Spice & Wolf, Vol. 01', 6, '1,6,11', 50000, '34', '6595871523984.jpg', 'The life of a traveling merchant is a lonely one, a fact with which Kraft Lawrence is well acquainted. Wandering from town to town with just his horse, cart, and whatever wares have come his way, the peddler has pretty well settled into his routine-that is, until the night Lawrence finds a wolf goddess asleep in his cart. Taking the form of a fetching girl with wolf ears and a tail, Holo has wearied of tending to harvests in the countryside and strikes up a bargain with the merchant to lend him the cunning of \"Holo the Wisewolf\" to increase his profits in exchange for taking her along on his travels. What kind of businessman could turn down such an offer? Lawrence soon learns, though, that having an ancient goddess as a traveling companion can be a bit of a mixed blessing. Will this wolf girl turn out to be too wild to tame?', '2024-01-03'),
(21, 'Where the Crawdads Sing', 10, '1,17', 50000, '120', '65958ad2efe70.jpg', 'For years, rumors of the “Marsh Girl” haunted Barkley Cove, a quiet fishing village. Kya Clark is barefoot and wild; unfit for polite society. So in late 1969, when the popular Chase Andrews is found dead, locals immediately suspect her.\r\n\r\nBut Kya is not what they say. A born naturalist with just one day of school, she takes lifes lessons from the land, learning the real ways of the world from the dishonest signals of fireflies. But while she has the skills to live in solitude forever, the time comes when she yearns to be touched and loved. Drawn to two young men from town, who are each intrigued by her wild beauty, Kya opens herself to a new and startling world—until the unthinkable happens.\r\n\r\nIn Where the Crawdads Sing, Owens juxtaposes an exquisite ode to the natural world against a profound coming of age story and haunting mystery. Thought-provoking, wise, and deeply moving, Owens’s debut novel reminds us that we are forever shaped by the child within us, while also subject to the beautiful and violent secrets that nature keeps.\r\n\r\nThe story asks how isolation influences the behavior of a young woman, who like all of us, has the genetic propensity to belong to a group. The clues to the mystery are brushed into the lush habitat and natural histories of its wild creatures.', '2024-01-03'),
(22, 'The Great Alone', 11, '1,17,19,11', 50000, '472', '65958c14124c1.jpg', 'Alaska, 1974.\r\nUnpredictable. Unforgiving. Untamed.\r\nFor a family in crisis, the ultimate test of survival.\r\n\r\nErnt Allbright, a former POW, comes home from the Vietnam war a changed and volatile man. When he loses yet another job, he makes an impulsive decision: he will move his family north, to Alaska, where they will live off the grid in America’s last true frontier.\r\n\r\nThirteen-year-old Leni, a girl coming of age in a tumultuous time, caught in the riptide of her parents’ passionate, stormy relationship, dares to hope that a new land will lead to a better future for her family. She is desperate for a place to belong. Her mother, Cora, will do anything and go anywhere for the man she loves, even if it means following him into the unknown.\r\n\r\nAt first, Alaska seems to be the answer to their prayers. In a wild, remote corner of the state, they find a fiercely independent community of strong men and even stronger women. The long, sunlit days and the generosity of the locals make up for the Allbrights’ lack of preparation and dwindling resources.\r\n\r\nBut as winter approaches and darkness descends on Alaska, Ernt’s fragile mental state deteriorates and the family begins to fracture. Soon the perils outside pale in comparison to threats from within. In their small cabin, covered in snow, blanketed in eighteen hours of night, Leni and her mother learn the terrible truth: they are on their own. In the wild, there is no one to save them but themselves.\r\n\r\nIn this unforgettable portrait of human frailty and resilience, Kristin Hannah reveals the indomitable character of the modern American pioneer and the spirit of a vanishing Alaska―a place of incomparable beauty and danger. The Great Alone is a daring, beautiful, stay-up-all-night story about love and loss, the fight for survival, and the wildness that lives in both man and nature.', '2024-01-03'),
(23, 'Wrong Way', 1, '1,17', 50000, '68', '65958c8bd69b6.jpg', 'For years, Teresa has passed from one job to the next, settling into long stretches of time, struggling to build her career in any field or unstick herself from an endless cycle of labor. The dreaded move from one gig to another is starting to feel unbearable. When a recruiter connects her with a contract position at AllOver, it appears to check all her prerequisites for a “good” job. It’s a fintech corporation with progressive hiring policies and a social justice-minded mission statement. Their new service for premium a functional fleet of driverless cars. The future of transportation. As her new-hire orientation reveals, the distance between AllOver’s claims and its actions is wide, but the lure of financial stability and a flexible schedule is enough to keep Teresa driving forward.\r\n\r\nJoanne McNeil, who often reports on how the human experience intersects with labor and technology brings blazing compassion and criticism to Wrong Way , examining the treacherous gaps between the working and middle classes wrought by the age of AI. Within these divides, McNeil turns the unsaid into the unignorable, and captures the existential perils imposed by a nonstop, full-service gig economy.', '2024-01-03'),
(24, 'Lumine Volume One', 13, '2,6,14', 50000, '55', '65958d4e4ce42.jpg', 'A runaway werewolf meets a witch boy, and their lives will never be the same.\r\n\r\nIn a world where weredogs, witches, and humans live side by side, Lumine is a down-on-his-luck weredog with nowhere to turn…until he meets antisocial witch boy Kody.\r\n\r\nOne causes trouble wherever he goes, and the other attracts trouble like a magnet. So of course, the two forces end up colliding.\r\n\r\nLumine has a big, fluffy he is a werewolf , a rare and powerful type of magical being thought to be extinct. Except…he can’t transform properly. When robbers attack the two boys, Lumine shifts into his other form, a tiny, fierce, and ridiculously cute puppy dog. How is he supposed to instill fear in their enemies like that?!\r\n\r\nImpressed with the small but mighty pup, Kody’s dad hires Lumine to be his son’s bodyguard. Tensions are high in the supernatural community; witch kids have been going missing, and Kody’s father is worried. Lumine is determined to both protect Kody and become his friend, but the secretive witch does everything in his power to keep Lumine at arm’s length.\r\n\r\nWhen Lumine persists, he realizes that Kody has his reasons for being so he can’t control his magic, other witches at school are bullying him, and an evil spirit in the shape of a cat is haunting him at every step.\r\n\r\nWithout realizing, Lumine has stumbled paws first into a family full of their own secrets. Kody is plagued by shadows, and his father’s motivations for hiring Lumine aren’t nearly as simple as they seem. Things are far more dangerous than Lumine bargained for, and this is only the beginning.\r\n', '2024-01-03'),
(25, 'uru-chan', 1, '2,6,15,14', 35000, '60', '65958df1dba45.jpg', 'From WEBTOON, the #1 digital comic platform, comes unOrdinary , the popular, action-packed series about John, an ordinary teen trying to survive high school in a world where superpowers dictate social status, and betrayal and conspiracies make up every turn.  Nobody pays much attention to John—just a normal teenager at a high school where the social elite happen to possess unthinkable powers and abilities. John prefers it that way. The more he stays under the radar, and stays close to the Royal’s most powerful Ace, Seraphina, the safer he is in the halls of Wellston High. But John has a secret past that threatens to bring down the school’s whole social order—and much more. And when the other students start to suspect John has something to hide, he becomes their latest target. Suddenly, John is pulled into a world of turf wars, betrayals, and deadly conspiracies. ', '2024-01-03'),
(26, 'Where Theres Smoke', 15, '1,22,23', 50000, '96', '65958f15e5511.jpg', 'In this fast-paced thriller, eighteen-year-old Calli finds herself alone after the loss of her father—until a bruised and broken girl shows up on her property, forcing her to face the present, rethink her future, and unearth the skeletons of her own past.\r\n\r\nLife has never been easy in the small desert town of Harmony, but even on the day Calli Christopher buries her father, she knows she is surrounded by people who care about her. But after the funeral, when everyone has finally gone home, Calli discovers a girl on her property. A girl who’s dirty and bruised and unable to speak. And petrified.\r\n\r\nCalli keeps the girl secret—well, almost secret. She calls her Ash and begins to nurture her back to health. But word spreads in a small town, and soon a detective comes around asking questions about a missing girl from another town. But these only raise more questions--about Ash and about the people Calli knows well. Still, she must is Ash in danger…or is she the danger?', '2024-01-03'),
(27, 'Fadeaway', 15, '1,22,23,17', 50000, '24', '65958fb365aad.jpg', 'When a high school basketball star goes missing, a town’s secrets are exposed in this edge-of-your seat, addictive read.\r\n\r\nAt 8:53 pm, thousands of people watched as Jake Foster secured the state title for his basketball team with his signature fadeaway. But by the next morning, he’s disappeared without a trace. Nobody has any idea where he is: not his best friend who knows him better than anyone else, not his ex-girlfriend who may still have feelings for him, not even his little brother who never expected Jake to abandon him. Rumors abound regarding Jake’s whereabouts. Was he abducted? Did he run away to try to take his game to the next level? Or is it something else, something darker—something they should have seen coming?\r\n\r\nTold from the points of view of those closest to Jake, this gripping, suspenseful novel reminds us that the people we think we know best are sometimes hiding the most painful secrets.', '2024-01-03'),
(29, 'Menara 7 warna', 16, '1', 75000, '34', '659df06cea353.jpg', 'This novel tells the story of a boy named Alif from Minangkabau, Bukit Tinggi, West Sumatra. When Alif was in MTs (the same level as junior high school), Alif had a friend named Randai. Randai is Alifs close friend and a rival at school', '2024-01-10'),
(30, '5cm', 17, '15', 80000, '20', '659df182c86c8.jpg', '5 cm is a 2005 novel by Donny Dhirgantoro published by Grasindo. This novel tells about the journey of 5 friends, namely Arial, Riani, Zafran, Ian and Genta. The novel teaches about hope, dreams, determination, love and friendship.', '2024-01-10'),
(31, 'Nebula', 18, '15', 25000, '50', '659df276eb101.jpg', 'Tells Who Raibs Parents Are in the Parallel World Adventure Series', '2024-01-10'),
(32, 'Pulang-Pergi', 18, '11', 36500, '47', '659df38107282.jpg', 'The novel Round Trip tells the story of Bujang who doesnt know where to go after going home and going. Bujang who was visiting his parents grave received a mysterious message. It reads a message from Krestniy Otets, leader of the Bratva brotherhood', '2024-01-10'),
(33, 'Hilmy Milan', 19, '6,11', 46750, '76', '659df5c10a154.jpg', 'Hilmy Milans novel tells the story of the romance between two people named Hilmy and Milan, who are said to be studying college', '2024-01-10'),
(34, 'tujuh kelana', 21, '1,11', 54750, '65', '659df84a1e2b5.jpg', ' Zarra and Dion are two humans who accidentally find a red gem that turns out to be a key fragment for a gate.', '2024-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `KodeDetailPesanan` int(11) NOT NULL,
  `KodePesanan` int(11) NOT NULL,
  `KodeBuku` int(11) NOT NULL,
  `JumlahBuku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`KodeDetailPesanan`, `KodePesanan`, `KodeBuku`, `JumlahBuku`) VALUES
(15, 19, 21, 1),
(16, 19, 10, 1),
(17, 19, 15, 1),
(36, 17, 9, 1),
(39, 17, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KodeKategori` int(11) NOT NULL,
  `NamaKategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`KodeKategori`, `NamaKategori`) VALUES
(18, ' Classics'),
(16, ' Science Fiction'),
(21, 'Action'),
(15, 'Adventure'),
(9, 'Art Book'),
(3, 'Comedy'),
(13, 'Drama'),
(6, 'Fantasy'),
(17, 'Fiction'),
(19, 'Historical'),
(10, 'Horror'),
(2, 'Komik'),
(7, 'Manga'),
(8, 'Manwha'),
(22, 'mystery'),
(20, 'Non-fiction'),
(1, 'Novel'),
(12, 'Oneshot'),
(4, 'Slice of life'),
(14, 'Supernatural'),
(23, 'thriller');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `KodePelanggan` int(11) NOT NULL,
  `EmailPelanggan` varchar(50) NOT NULL,
  `PasswordPelanggan` varchar(40) NOT NULL,
  `AlamatPelanggan` text NOT NULL,
  `CardNumber` varchar(20) NOT NULL,
  `CardExp` date DEFAULT NULL,
  `CardCvv` int(4) DEFAULT NULL,
  `Level` enum('A','U') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`KodePelanggan`, `EmailPelanggan`, `PasswordPelanggan`, `AlamatPelanggan`, `CardNumber`, `CardExp`, `CardCvv`, `Level`) VALUES
(3, 'Trancend@gmail.com', 'rrr', '', 'Indonesia', NULL, NULL, 'A'),
(4, 'LandauFamily@Gmail.com', 'Algebra', 'Belobog', '43215678876543321', '2024-05-29', 554, 'U'),
(9, 'someguy@gmail.com', 'a', 'trench', '0987098709870987', '2300-03-17', 348, 'U');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `KodePenulis` int(11) NOT NULL,
  `NamaPenulis` varchar(50) NOT NULL,
  `EmailPenulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`KodePenulis`, `NamaPenulis`, `EmailPenulis`) VALUES
(1, 'Anggoro jati praktikum', 'anggorojatiprtikto004@gmail.com'),
(2, 'Shirakawa, Miabi', 'Shirakawasan@Gmail.com'),
(3, 'Yostar', 'Store.cs@yostar.app'),
(4, 'Taguchi, Shouichi', 'Taguchi@Yahoo.co.id'),
(5, 'Akasaka, Aka', 'Akasaka@Gmail.com'),
(6, ' Hasekura, Isuna', 'hasekuraisuna@Gmail.com'),
(7, 'Ray Bradbury', 'Raybrad@gmail.com'),
(8, 'J.K. Rowling', 'Potterowling@Gmail.com'),
(9, 'George Orwell', 'orwellwrite@gmail.com'),
(10, 'Delia Owens', 'owens@gmail.com'),
(11, 'Kristin Hannah', 'hannah.family@gmail.com'),
(12, 'Joanne McNeil', 'mcneil@gmail.com'),
(13, 'Emma Krogell', 'EmmaKrogell@gmail.com'),
(14, 'uru-chan', 'uruchan@gmail.com'),
(15, 'E.B. Vickers', 'vickers@gmail.com'),
(16, 'Ahmad Fuadi', 'Ahmdfuadii@gmail.com'),
(17, 'Donny dirgantoro', 'Donnydgtr@gmail.com'),
(18, 'tereliye', 'tereliye@gmail.com'),
(19, 'Nadia ristivani', 'ristivani@gmail.com'),
(20, 'Ria sw', 'omriasw@gmail.com'),
(21, 'nella neva', 'nellaneva@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `KodePesanan` int(11) NOT NULL,
  `KodePelanggan` int(11) NOT NULL,
  `TanggalPesanan` date DEFAULT NULL,
  `StatusPesanan` enum('K','T','P','S','CB') NOT NULL COMMENT 'Keranjang, Transaksi, Proses, Selesai',
  `HargaPesanan` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`KodePesanan`, `KodePelanggan`, `TanggalPesanan`, `StatusPesanan`, `HargaPesanan`) VALUES
(17, 4, '2024-01-10', 'P', 540000),
(19, 9, NULL, 'K', NULL),
(20, 3, NULL, 'K', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`KodeBuku`),
  ADD KEY `KodePenulis` (`KodePenulis`);

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`KodeDetailPesanan`),
  ADD KEY `KodePesanan` (`KodePesanan`),
  ADD KEY `KodeBuku` (`KodeBuku`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KodeKategori`),
  ADD UNIQUE KEY `NamaKategori` (`NamaKategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`KodePelanggan`),
  ADD UNIQUE KEY `EmailPelanggan` (`EmailPelanggan`),
  ADD UNIQUE KEY `CardNumber` (`CardNumber`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`KodePenulis`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`KodePesanan`),
  ADD KEY `KodePelanggan` (`KodePelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `KodeBuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `KodeDetailPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `KodeKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `KodePelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `KodePenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `KodePesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`KodePenulis`) REFERENCES `penulis` (`KodePenulis`) ON UPDATE CASCADE;

--
-- Constraints for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `detailpesanan_ibfk_1` FOREIGN KEY (`KodePesanan`) REFERENCES `pesanan` (`KodePesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpesanan_ibfk_2` FOREIGN KEY (`KodeBuku`) REFERENCES `buku` (`KodeBuku`) ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggan` (`KodePelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

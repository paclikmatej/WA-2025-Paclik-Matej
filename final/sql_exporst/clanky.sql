SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Struktura tabulky `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `article`
--

INSERT INTO `article` (`id`, `name`, `author`, `title`, `category`, `subcategory`, `description`, `user_id`) VALUES
(15, 'Optimalizace výkonu', 'Admin', 'O čem je optimalizace', 'Problematika', 'Optimalizace', 'Mobilní aplikace musí být efektivní a responzivní, což znamená minimalizovat čas odezvy a spotřebu energie. Vývojáři se musí vypořádat s omezenými výpočetními prostředky na mobilních zařízeních a optimalizovat kód, aby byl co nejefektivnější.', 51),
(16, 'Řízení paměti', 'Admin', 'Proč je to důležité?', 'Problematika', 'Paměť', 'Správné řízení paměti je klíčové pro mobilní aplikace, protože mobilní zařízení mají omezenou operační paměť a nesprávné používání paměti může vést k pádu aplikace nebo zpomalení zařízení. Vývojáři musí správně alokovat a uvolňovat paměť a minimalizovat úniky paměti.', 51),
(17, 'Android', 'Testovaci', 'Proč ano? Proč ne?', 'Platformy', 'Android', 'Vývoj mobilních aplikací pro Android přináší určité výhody, jako je vyšší flexibilita a možnost přístupu k souborovému systému. Android také dominuje na trhu s mnoha zařízeními a umožňuje dosáhnout širšího okruhu uživatelů. Nicméně, vývoj aplikací pro Android může být složitější kvůli rozmanitosti zařízení, obtížnější optimalizaci a testování. Uživatelé Androidu často neaktualizují svůj operační systém, což vyžaduje podporu starších verzí a zvyšuje náklady na vývoj a údržbu aplikací. Zabezpečení je také důležitým aspektem, protože otevřenost platformy může zvýšit riziko bezpečnostních hrozeb.', 52);

--
-- Indexy pro tabulku `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

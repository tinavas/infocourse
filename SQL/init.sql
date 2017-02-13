--USE	`Infocourse`;
CREATE TABLE `Infocourse`.`Seminars` ( `ID` TEXT NOT NULL ,  `Name` TEXT NOT NULL ,  `Link` TEXT NOT NULL , `Source` TEXT NOT NULL , `Label` TEXT NOT NULL) ENGINE = InnoDB;
CREATE TABLE `Infocourse`.`Tracks` ( `ID` TEXT NOT NULL ,  `Name` TEXT NOT NULL ,  `Folder` TEXT NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `Infocourse`.`Courses` ( `ID` TEXT NOT NULL ,  `Track` TEXT NOT NULL ,  `Link` TEXT NOT NULL , `Label` TEXT NOT NULL) ENGINE = InnoDB;
CREATE TABLE `Infocourse`.`Videos` ( `ID` TEXT NOT NULL ,  `Course` TEXT NOT NULL ,  `Link` TEXT NOT NULL , `Source` TEXT NOT NULL , `Label` TEXT NOT NULL) ENGINE = InnoDB;
CREATE TABLE `Infocourse`.`Exams` ( `ID` TEXT NOT NULL ,  `Course` TEXT NOT NULL ,  `Link` TEXT NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `Infocourse`.`Comments` (`ID` TEXT NOT NULL, `Author` TEXT NOT NULL , `Text` TEXT NOT NULL, `Link` TEXT NOT NULL, `Time` TEXT NOT NULL) ENGINE = InnoDB;
ALTER TABLE `Comments` ADD UNIQUE (`ID`(33));

INSERT INTO `Tracks`(`ID`, `Name`, `Folder`) VALUES ("2","PHP","/tracks/PHP");
INSERT INTO `Courses`(`ID`, `Track`, `Link`, `Label`) VALUES
("PHP Fundamentals","PHP","/courses/PHP1", ""),
("PHP Advanced","PHP","/courses/PHP2", "");
INSERT INTO `Videos`(`ID`, `Course`, `Link`, `Source` , `Label`) VALUES 
("Preparing...","PHP1","/courses/PHP/videos/0", "https://www.youtube.com/embed/heXKR7KDt-c", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Basics","PHP1","/courses/PHP/videos/1", "https://www.youtube.com/embed/dztfsg2tQDs", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Arrays&amp;Conditional Statements - Group A","PHP1","/courses/PHP/videos/2", "https://www.youtube.com/embed/rKdvAiYdh7I", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Arrays&amp;Conditional Statements - Group B","PHP1","/courses/PHP/videos/3", "https://www.youtube.com/embed/OytP2CQWjvY", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Loops<br>Group A","PHP1","/courses/PHP/videos/4", "https://www.youtube.com/embed/CTziiSKich8", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Loops<br>Group B","PHP1","/courses/PHP/videos/5", "https://www.youtube.com/embed/zWdqNpzOPhw", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Loops - Group C","PHP1","/courses/PHP/videos/6", "https://www.youtube.com/embed/2ldFC-senNE", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Live Solving","PHP1","/courses/PHP/videos/7", "https://www.youtube.com/embed/_J8sFWQKIS4", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Hosting. ICN.Bg","PHP1","/courses/PHP/videos/8", "https://www.youtube.com/embed/ynwybdVp6Nk", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Forms<br>Group A","PHP1","/courses/PHP/videos/9", "https://www.youtube.com/embed/9mn_cnvdBVY", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Forms<br>Group B","PHP1","/courses/PHP/videos/10", "https://www.youtube.com/embed/DeS7xOxywl4", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Cookies. Sessions - Group C","PHP1","/courses/PHP/videos/11", "https://www.youtube.com/embed/9bOBM5Z_Nr0", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Exercise<br>Part 1","PHP1","/courses/PHP/videos/12", "https://www.youtube.com/embed/OQoDRBdSiqc", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Exercise<br>Part 2","PHP1","/courses/PHP/videos/13", "https://www.youtube.com/embed/AS3CUMmTqmI", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("DataBases","PHP2","/courses/PHP/videos/14", "https://www.youtube.com/embed/UCabYNOFUqw", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("MySQL &amp; phpMyAdmin","PHP2","/courses/PHP/videos/15", "https://www.youtube.com/embed/raDNElaW6F", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("MySQL @ PHP","PHP2","/courses/PHP/videos/16", "https://www.youtube.com/embed/MMPMpQEuDT8", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Functions. Good Practices","PHP2","/courses/PHP/videos/17", "https://www.youtube.com/embed/2LdLm4oV1Lk", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Functions","PHP2","/courses/PHP/videos/18", "https://www.youtube.com/embed/Ulix9SAcTxU", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("OOP basics","PHP2","/courses/PHP/videos/19", "https://www.youtube.com/embed/HHXmedW45ms", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Inheritance, Magic Methods, Publicity.","PHP2","/courses/PHP/videos/20", "https://www.youtube.com/embed/I4dWkBamRYs", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Inheritance, Magic Methods, Publicity. - Group B","PHP2","/courses/PHP/videos/21", "https://www.youtube.com/embed/XUwyfQ7WTnI", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("<small>Autoloading, namespaces, parent::, Interfaces - Group A</small>","PHP2","/courses/PHP/videos/22", "https://www.youtube.com/embed/BHkIIzJFti8", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("<small>Autoloading, namespaces, parent::, Interfaces - Group B</small>","PHP2","/courses/PHP/videos/23", "https://www.youtube.com/embed/_FA0tuK78ik", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Exceptions","PHP2","/courses/PHP/videos/24", "https://www.youtube.com/embed/Av8VNukyj0U", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("MVC. Laravel","PHP2","/courses/PHP/videos/25", "https://www.youtube.com/embed/t522p2BwZ_g", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("<small>Eloquent ORM. Routing. Middlewares. Views. Blade Templating</small>","PHP2","/courses/PHP/videos/26", "https://www.youtube.com/embed/fedrAcbCboI", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Phonebook - Part 1","PHP2","/courses/PHP/videos/27", "https://www.youtube.com/embed/ee-dFlCWKj4", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
,("Phonebook - Part 2","PHP2","/courses/PHP/videos/28", "https://www.youtube.com/embed/XP3W5XqTrPM", "Author: Yasen Georgiev (<a href='http://yasen.me'>yasen.me</a>)")
;

INSERT INTO `Tracks`(`ID`, `Name`, `Folder`) VALUES ("0","C++","/tracks/C++");
INSERT INTO `Courses`(`ID`, `Track`, `Link`, `Label`) VALUES
("C++ Fundamentals","C++","/courses/C++1", ""),
("C++ Advanced","C++","/courses/C++2", "");
INSERT INTO `Videos`(`ID`, `Course`, `Link`, `Source` , `Label`) VALUES 
("Introduction to C++","C++1","/courses/C++/videos/Introduction+to+C%2b%2b", "https://www.youtube.com/embed/Ot3Uxh6bZxU", "Alex Tsvetanov"),
("I/O Stream","C++1","/courses/C++/videos/IO%20Stream", "https://www.youtube.com/embed/phM0lHrmVnE", "Alex Tsvetanov")
, ("if-else","C++1","/courses/C++/videos/if-else", "https://www.youtube.com/embed/sPV2_eJtgmk", "Evgeni Vasilev")
, ("switch-case","C++1","/courses/C++/videos/switch", "https://www.youtube.com/embed/yBxR6FZKl4E", "Evgeni Vasilev")
, ("while loop","C++1","/courses/C++/videos/switch", "https://www.youtube.com/embed/LFENULP3qeg", "Evgeni Vasilev")
, ("do-while loop","C++1","/courses/C++/videos/switch", "https://www.youtube.com/embed/ji6xvgGmiKc", "Evgeni Vasilev")
, ("for loop","C++1","/courses/C++/videos/switch", "https://www.youtube.com/embed/QQtZD08-15g", "Evgeni Vasilev")
, ("break, continue","C++1","/courses/C++/videos/switch", "https://www.youtube.com/embed/FaISNM23cW0", "Evgeni Vasilev")
, ("Sort function","C++2","/courses/C++/videos/sort_func", "https://www.youtube.com/embed/okiF-XsrSWY", "Marin Shalamanov")
, ("Binary search function","C++2","/courses/C++/videos/binary_search_function", "https://www.youtube.com/embed/slk-hXnrXF0", "Marin Shalamanov")
, ("lower/upper bound","C++2","/courses/C++/videos/bound_functions", "https://www.youtube.com/embed/NJJ3CEKHySU", "Marin Shalamanov")
, ("Cube root function","C++2","/courses/C++/videos/cube_root", "https://www.youtube.com/embed/BtjdITzbvmk", "Marin Shalamanov")
, ("Workshop - sysadmin","C++2","/courses/C++/videos/workshop_sysadmin", "https://www.youtube.com/embed/vl3cAW2Kq6w", "Marin Shalamanov");

INSERT INTO `Tracks`(`ID`, `Name`, `Folder`) VALUES ("0","Algorithms","/tracks/Algorithms");
INSERT INTO `Courses`(`ID`, `Track`, `Link`, `Label`) VALUES
("Sort&amp;Find","Algorithms","/courses/SortFind", ""),
("Graphs","Algorithms","/courses/Graphs", "");
INSERT INTO `Videos`(`ID`, `Course`, `Link`, `Source` , `Label`) VALUES 
("Counting sort","SortFind","/courses/Algorithms/videos/counting_sort", "https://www.youtube.com/embed/wAPHExxXDjo", "Marin Shalamanov"),
("Binary search","SortFind","/courses/Algorithms/videos/binary_search", "https://www.youtube.com/embed/cwmdfliNj5E", "Marin Shalamanov"),
("Introduction in Graphs","Graphs","/courses/Algorithms/videos/Introduction_to_Graphs", "https://www.youtube.com/embed/wXv3VEMzEBM", "Marin Shalamanov"),
("List of neighbours","Graphs","/courses/Algorithms/videos/List_of_neighbours", "https://www.youtube.com/embed/xqRLrrxjM-U", "Marin Shalamanov"),
("BFS","Graphs","/courses/Algorithms/videos/BFS", "https://www.youtube.com/embed/qax90KL-lMk", "Marin Shalamanov"),
("Min path with BFS","Graphs","/courses/Algorithms/videos/Min_path_in_Graph", "https://www.youtube.com/embed/igAboBxH4YE", "Marin Shalamanov"),
("DFS","Graphs","/courses/Algorithms/videos/DFS", "https://www.youtube.com/embed/dSqZZqjoDjA", "Marin Shalamanov");

INSERT INTO `Seminars`(`ID`, `Name`, `Link` , `Source` , `Label`) VALUES 
("0","C++17","/seminars/C++17", "https://www.youtube.com/embed/ZGxFkMTm27M", "By Alex Tsvetanov &amp; Dimo Chanev in SoftUni");

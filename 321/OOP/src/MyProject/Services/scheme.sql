CREATE TABLE IF NOT EXISTS Articles (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  text VARCHAR(1000) NOT NULL,
  user_id INT,
  date DATE NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE IF NOT EXISTS Users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS Comments (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  article_id INT,
  text VARCHAR(2000) NOT NULL,
  date DATE NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(id)
  FOREIGN KEY (article_id) REFERENCES Article(id)
);
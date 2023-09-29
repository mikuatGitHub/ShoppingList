DROP TABLE IF EXISTS items;

CREATE TABLE items(
  id INT NOT NULL AUTO_INCREMENT,
  is_done BOOL DEFAULT false,
  title TEXT,
  PRIMARY KEY(id)
);

-- INSERT INTO items(title)VALUES('aaa');
-- INSERT INTO items(title,is_done)VALUES('bbb',true);

SELECT * FROM items;

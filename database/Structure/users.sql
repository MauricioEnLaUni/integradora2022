CREATE USER 'ficticho_visitor'@'localhost' IDENTIFIED BY 'e9C99Z4C1qoE7oGTb2mcOw2KZhW9hrUE';
GRANT SELECT ON ficticho_fict.users TO 'ficticho_visitor'@'localhost';
GRANT SELECT ON ficticho_fict.email TO 'ficticho_visitor'@'localhost';
GRANT SELECT ON ficticho_fict.phone TO 'ficticho_visitor'@'localhost';
GRANT SELECT ON ficticho_fict.stock TO 'ficticho_visitor'@'localhost';
FLUSH PRIVILEGES;
CREATE USER 'ficticho_admin'@'localhost' IDENTIFIED BY '55Mn7c0WOtJtidL9Fg3c5UPkB2yXt0JI';
GRANT ALL PRIVILEGES ON *.* TO 'ficticho_admin'@'localhost';

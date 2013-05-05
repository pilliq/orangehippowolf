DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS instructor;
//one for messages?

CREATE TABLE user (
    username varchar(127) primary key, /* netid */
    password char(127),
    email varchar(127),
    first_name varchar(255),
    last_name varchar(255),
    instructor bit(1),
    created timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE student (
    ruid int(11) unsigned primary key,
    netid varchar(127) references user,
    gradDate date,
    majorCreditsCompleted int(11),
    creditsCompleted int(11),
    gpa decimal(10,3),

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE instructor (
    tid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    netid varchar(127) references user,
    department varchar(127)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE messages (
    sender int(11) unsigned NOT NULL FOREIGN KEY REFERENCES user (username),
    receiver int(11) unsigned NOT NULL FOREIGN KEY REFERENCES user (username),
    subject varchar(63),
    body varchar (1023),
    msgtime not null default CURRENT_TIMESTAMP primary key
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


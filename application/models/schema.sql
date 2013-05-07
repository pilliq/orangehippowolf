DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS instructor;
DROP TABLE IF EXISTS messages;
<<<<<<< HEAD
=======
DROP TABLE IF EXISTS room;
DROP TABLE IF EXISTS building;
DROP TABLE IF EXISTS course_offering;
DROP TABLE IF EXISTS request;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS user;
>>>>>>> a746c0cafa63d0f89aca06c68b5d3abc69122579

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
    ruid char(11) primary key,
    netid varchar(127) references user,
    gradMonth varchar(127),
    gradYear varchar(127),
    majorCredits int(11),
    credits int(11),
    gpa decimal(10,3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE instructor (
    tid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    netid varchar(127) references user,
    department varchar(127)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE messages (
    mid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    sender int(11) unsigned NOT NULL FOREIGN KEY REFERENCES user (username),
    receiver int(11) unsigned NOT NULL FOREIGN KEY REFERENCES user (username),
    subject varchar(63),
    body varchar (1023),
    created timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE course (
    cid varchar(127) primary key,
    unit varchar(127),
    subject varchar(127),
    course_number varchar(127),
    title varchar(127),
    credits int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE course_offering (
    cid varchar(127),
    year varchar(127),
    term varchar(127),
    section varchar(127),
    instructor varchar(127),
    foreign key (cid) references course(cid),
    primary key (cid,section)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE building (
    code varchar(127) primary key,
    name varchar(127),
    campus varchar(127)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE room (
    number varchar(127),
    building varchar(127) references building,
    capacity int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* 
CREATE TABLE registration (
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE request (
    rid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    student varchar(127),
    course varchar(127),
    status varchar(127),
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student) REFERENCES user(username),
    FOREIGN KEY (course) REFERENCES course(cid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

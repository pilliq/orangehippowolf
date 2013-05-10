DROP TABLE IF EXISTS registration;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS major;
DROP TABLE IF EXISTS rank_algorithm;
DROP TABLE IF EXISTS instructor;
DROP TABLE IF EXISTS permission;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS room;
DROP TABLE IF EXISTS building;
DROP TABLE IF EXISTS request;
DROP TABLE IF EXISTS prereq;
DROP TABLE IF EXISTS course_offering;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS user;

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
    ruid varchar(11) primary key,
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
    mid int(11) not null auto_increment primary key,
    sender varchar(127) NOT NULL,
    receiver varchar(127) NOT NULL,
    subject varchar(63),
    body text,
    created timestamp not null default CURRENT_TIMESTAMP,
    FOREIGN KEY (sender) REFERENCES user (username),
    FOREIGN KEY (receiver) REFERENCES user (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE course (
    cid varchar(127) primary key,
    unit varchar(127),
    subject varchar(127),
    course_number varchar(127),
    title varchar(127),
    credits int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE prereq (
    pid int(11) not null auto_increment primary key,
    course_id varchar(127),
    prereq_id varchar(127),
    FOREIGN KEY (course_id) REFERENCES course(cid),
    FOREIGN KEY (prereq_id) REFERENCES course(cid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE course_offering (
    cid varchar(127),
    year varchar(127),
    term varchar(127),
    section varchar(127),
    instructor varchar(127),
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    foreign key (instructor) references user(username),
    foreign key (cid) references course(cid),
    primary key (cid,section)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE rank_algorithm (
    cid varchar(127),
    section varchar(127),
    credits_completed int(11),
    major_credits_completed int(11),
    declared_major int(11),
    gpa int(11),
    prereq_gpa int(11),
    other_majors int(11),
    failed_basic int(11),
    failed_prereq int(11),
    no_use_permission int(11),
    FOREIGN KEY (cid,section) REFERENCES course_offering(cid,section)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE building (
    code varchar(127) primary key,
    name varchar(127),
    campus varchar(127)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE room (
    rid int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY, /* this is needed because many instructors may use the same room and have different capacity requirements for it */
    number varchar(127),
    building varchar(127),
    capacity int(11),
    foreign key (building) references building(code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
CREATE TABLE registration (
    NAME varchar(31),
    RU_ID varchar(11) not null,
    YEAR varchar(4) not null,
    TERM char(1) not null,
    UNIT_CD varchar(2) not null,
    SUBJ_CD varchar(3) not null,
    COURSE_NO varchar(3) not null,
    SECTION_NO varchar(2),
    GRADE varchar(3),
    BLDG_CD varchar(3),
    ROOM_NO varchar(4),
    FOREIGN KEY (RU_ID) REFERENCES student(ruid),
    PRIMARY KEY (RU_ID,YEAR,TERM,UNIT_CD,SUBJ_CD,COURSE_NO)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE permission ( 
    pid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    number varchar(127),
    cid varchar(127),
    section varchar(127),
    assigned varchar(127),
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned) REFERENCES user(username),
    FOREIGN KEY (cid,section) REFERENCES course_offering(cid,section)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE major (
    student varchar(127),
    major varchar(127),
    FOREIGN KEY (student) REFERENCES user(username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE request (
    rid int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
    rank int(11),
    student varchar(127),
    course varchar(127),
    section varchar(127),
    comment text,
    reason text,
    status varchar(127) default 'pending',
    sp varchar(127),
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student) REFERENCES user(username),
    FOREIGN KEY (course,section) REFERENCES course_offering(cid,section)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

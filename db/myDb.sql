Drop table if exists assignments;
Drop table if exists courses;
Drop table if exists students;
CREATE TABLE students (
    id          SERIAL PRIMARY KEY,
    name        varchar(64),
    username    varchar(64) UNIQUE NOT NULL,
    password    varchar(64) NOT NULL
);

CREATE TABLE courses (
    id          SERIAL PRIMARY KEY,
    name        varchar(64),
    studentid       INT REFERENCES students (id)
);

CREATE TABLE assignments (
    id          SERIAL PRIMARY KEY,
    name        varchar(64),
    duedate     date,
    courseid      int REFERENCES courses (id) NOT NULL,
    studentid     int REFERENCES students (id) NOT NULL
);



INSERT INTO students (name, username, password) VALUES
    ('Jossy', 'jossy202187', 'longtry');

INSERT INTO courses (name, studentid) VALUES
    ('Web Backend Development I', 1),
    ('Web Backend Developmet II', 1),
    ('Web Frontend Development II', 1);
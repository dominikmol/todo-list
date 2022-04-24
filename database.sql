CREATE TABLE tasks (
    id INTEGER,
    task TEXT,
    is_done BOOLEAN,
    PRIMARY KEY(id)
);

INSERT INTO tasks (task, is_done) VALUES ('create project', 0);
INSERT INTO tasks (task, is_done) VALUES ('create database', 0);
INSERT INTO tasks (task, is_done) VALUES ('some scripting / coding', 0);
INSERT INTO tasks (task, is_done) VALUES ('check project', 0);
INSERT INTO tasks (task, is_done) VALUES ('make lunch', 0);


SELECT * FROM tasks WHERE is_done == 0;
UPDATE tasks SET is_done = NOT is_done WHERE id == 2;
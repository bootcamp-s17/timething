# Timething - another thing we made

## Create the user and database (as ADMIN)

create user timeuser with password 'time';

create database timedb_dev owner timeuser;

## Create the tables (AS TIMEUSER)

CREATE TABLE clients (
    id SERIAL PRIMARY key,
    name varchar(100) UNIQUE NOT NULL,
    create_date TIMESTAMP DEFAULT now(),
    last_update TIMESTAMP DEFAULT now()    
);

CREATE TABLE categories (
    id SERIAL PRIMARY key,
    name varchar(100) NOT NULL,
    client_id INTEGER REFERENCES clients(id),
    rate INTEGER,
    create_date TIMESTAMP DEFAULT now(),
    last_update TIMESTAMP DEFAULT now()
);

CREATE TABLE activities (
    id serial PRIMARY key,
    starttime INT NOT NULL,
    endtime INT,
    comment text NOT NULL,
    create_date TIMESTAMP DEFAULT now(),
    last_update TIMESTAMP DEFAULT now()
);

CREATE TABLE activity_category (
    activity_id INT REFERENCES activities(id),
    category_id INT REFERENCES categories(id),
    create_date TIMESTAMP DEFAULT now(),
    last_update TIMESTAMP DEFAULT now()
);

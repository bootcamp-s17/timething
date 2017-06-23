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

## SQL commands:

SELECT * FROM clients; -- everything in table in database's choice of order

SELECT * FROM clients ORDER BY name; -- everything in table in name order, ascending (implicit)

SELECT * FROM clients ORDER BY name ASC; -- everything in table in name order, ascending (explicit)

SELECT * FROM clients ORDER BY name DESC; -- everything in table in name order, descending

-- Changing names of columns
SELECT id AS client_id, name AS client_name, CREATE_date AS date_client_created, last_update AS last_time_client_updated
FROM clients
ORDER BY name ASC;

## Remember!

When asking PostgreSQL to insert or delete data, use this pattern:

    $stmt = "";
    pg_query($db, $stmt);

When asking PostgreSQL to return data to display on the webpage, use this pattern:

    $stmt = "";
    $request = pg_query($db, $stmt);
    return pg_fetch_all($request);






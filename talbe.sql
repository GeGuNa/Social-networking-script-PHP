SET timezone = 'Asia/Tbilisi';


CREATE TABLE test1 (
	id bigserial PRIMARY KEY, 
	name VARCHAR(1024),
	surn VARCHAR(1024),
	birth_yy integer default 0,
	birth_mm integer  default 0,
	birth_dd integer  default 0,
);

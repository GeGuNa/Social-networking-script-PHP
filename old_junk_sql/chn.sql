ALTER TABLE table_name 
RENAME COLUMN old_column_name1 TO new_col_name1,
RENAME COLUMN old_column_name2 TO new_col_name2,
RENAME COLUMN old_column_name3 TO new_col_name3;

  

ALTER TABLE user CHANGE ank_g_r birth_year bigint(64),CHANGE ank_m_r birth_month bigint(64),CHANGE ank_d_r birth_day  bigint(64);


ALTER TABLE user Change pol gender set('male','female','other','none');

birth_year         | bigint(64)  
birth_month        | bigint(64)   
birth_day          | bigint(64)    


| gender             | set('male','female','other','none') | YES  |     | NULL         |                |

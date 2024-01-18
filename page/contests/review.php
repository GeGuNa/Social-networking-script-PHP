<?php


$ReviewingData31s = $pdo->query("SELECT 
*,
`contests`.`cid` as IdOfContest,
`contest_participants`.`likes` as LikesfOFtheuser,
`contest_participants`.`user_id` as usrid1,
`contests`.`prize` as winnersPrize


FROM `contest_participants`  
	JOIN  
	`contests` 
		ON 
	`contests`.`cid` = `contest_participants`.`object_id` 
	
	WHERE
		`contests`.`end` < ? and `contests`.`contest_status` != 'closed'  ORDER BY `contest_participants`.`likes` DESC LIMIT 1;", [$time]);

while ($qq31zzwe = $ReviewingData31s->fetch()) {

	//var_dump($qq31zzwe);

	$qwqe3qzq12 = get_user($qq31zzwe['usrid1']);

	$pdo->query("update `contests` set `thewinner` = ?,`contest_status` = ? where `cid` = ?", [
		$qwqe3qzq12['id'], 
		"closed", 
		$qq31zzwe['IdOfContest']
	]);


$pdo->query("update `user` set `balls` = ? where `id` = ?", [abs((int)$qwqe3qzq12['balls']+$qq31zzwe['winnersPrize']), $qwqe3qzq12['id']]);


}

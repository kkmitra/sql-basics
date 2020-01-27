-- 1: Get Team captains
select team_name, captain_name from team_details inner join captain_details using(team_id);

-- 2: Get match fixture
select match_number, T2.team_name TeamA, T3.team_name TeamB from ((match_details T1 inner join team_details T2 on T1.team_a=T2.team_id) inner join team_details T3 on T1.team_b=T3.team_id);


-- 3: Get winner of each match
select match_number, team_name Winner from match_details inner join team_details on match_details.match_won_by=team_details.team_id;

-- 4: which team won the maximum matches
select team_name Team, count(match_number) total from match_details T1 inner join team_details T2 on T1.match_won_by=T2.team_id group by team_id;

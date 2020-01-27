create table if not exists team_details (
	team_id int(5) auto_increment,
	team_name varchar(20) not null,
	primary key(team_id));

create table if not exists match_details(
	match_number int(5) auto_increment,
	team_a int(5) not null,
	team_b int(5) not null,
	toss_won_by int(5),
	match_won_by int(5),
	primary key(match_number)
);

create table if not exists captain_details (
	team_id int(5),
	match_number int(5),
	captain_name varchar(30),
	primary key (team_id, match_number)
);

create table if not exists venue_details (
	match_number int(5),
	match_date date,
	match_venue varchar(30),
	primary key(match_number)
);

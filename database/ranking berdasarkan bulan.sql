select 
s.user_id, ass.session_id,group_concat(ass.total_score) as scores_std,group_concat(ass.assigment_id)
,count(1) as sessions_count#,(select concat(year(s.created_at),'-',month(s.created_at))) as yearmonth
from sessions s
inner join assigment_sessions ass on ass.session_id=s.id
inner join users u on u.id=s.user_id

where 
	ass.total_score is not null and
	year(s.created_at)='2021' and month(s.created_at)='7'
group by s.user_id
#order by sessions_count desc

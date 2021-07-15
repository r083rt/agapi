select 
	t.user_id,
	t.session_count,
    t.name,
    t.avatar,
    t.grade_id,
    t.scores_sum/(t.session_count*100) as score,
    t.created_at
from(
	select 
		s.user_id, 
        u.name,
        u.avatar,
        p.grade_id,
		count(1) as session_count,   
        sum(ass.total_score) as scores_sum,
		s.created_at
	from sessions s
	inner join assigment_sessions ass on ass.session_id=s.id
	inner join users u on u.id=s.user_id
    inner join profiles p on p.user_id=u.id 
	where 
		ass.total_score is not null
		#and year(s.created_at)='2021' and month(s.created_at)='07'
        and grade_id=6
        
	group by s.user_id
	#order by session_count asc
) t
order by t.session_count desc
#limit 10000

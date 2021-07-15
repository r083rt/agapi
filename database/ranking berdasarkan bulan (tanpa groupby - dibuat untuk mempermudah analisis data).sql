select 
	s.user_id, 
	ass.session_id,
	ass.assigment_id,
    ass.total_score as scores_sum,
	assigment_question_lists_count.question_lists_total as question_lists_total_sum,
	s.created_at
from sessions s
inner join assigment_sessions ass on ass.session_id=s.id
inner join users u on u.id=s.user_id
inner join (
	select 
		count(1) as question_lists_total,aql.assigment_id 
    from assigment_question_lists aql group by aql.assigment_id
) assigment_question_lists_count on assigment_question_lists_count.assigment_id=ass.assigment_id
where 
	ass.total_score is not null and
	year(s.created_at)='2021' and month(s.created_at)='7'
    #and s.user_id=318
    #group by s.user_id
#order by sessions_count desc

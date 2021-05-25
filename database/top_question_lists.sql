select ql.id,aql.creator_id,ql.name,tql2.score as latest_score,tql2.created_at 
from question_lists ql 
inner join (
	select created_at,question_list_id,max(id) as max_id from top_question_lists group by question_list_id
) as tql on tql.question_list_id=ql.id
inner join top_question_lists tql2 on tql2.id=tql.max_id
inner join assigment_question_lists	aql on aql.question_list_id=ql.id
where
	tql2.score is not null
   and (ql.is_paid=-1 or ql.is_paid is null)
order by tql2.score desc
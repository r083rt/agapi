select 
 a.id,a.user_id,a.topic,a.teacher_id,(
	select group_concat(ql.ref_id) from assigment_question_lists aql 
		inner join question_lists ql on ql.id=aql.question_list_id
	where aql.assigment_id=a.id
 ) as master_question_list_ids,
 (
  select group_concat(a2.id) from assigments a2 
  where 
	exists (
		select group_concat(ql2.ref_id) as master_question_list_ids2 from assigment_question_lists aql2 inner join question_lists ql2 on ql2.id=aql2.question_list_id
        where aql2.assigment_id=a2.id
        having master_question_list_ids2=master_question_list_ids
    )
	and a2.teacher_id is not null #soal yg dishare
	and a2.user_id=a.user_id
 ) as shared_assigment_ids
from assigments a 
where 
	a.teacher_id is null #master soal
having master_question_list_ids is not null
order by a.id desc

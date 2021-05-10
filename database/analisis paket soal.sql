#paket soal adalah assigments dengan kondisi teacher_id IS NULL dan is_publish=1
select a.id,a.user_id,g.description,a.code,a.name,(
	select group_concat(ql.id) from assigment_question_lists aql inner join question_lists ql on aql.question_list_id=ql.id where aql.assigment_id=a.id
)  as question_list_ids, (
	select group_concat(ass.total_score) from assigment_sessions ass where ass.assigment_id=a.id
) as scores,(
	select count(ass.total_score) from assigment_sessions ass where ass.assigment_id=a.id
) as scores_count,(
	select group_concat(a2.id) from assigments a2 
	where 
		a2.teacher_id is not null and a2.is_publish=1
) as slave_assigment_id,
a.created_at
	from assigments a 
		inner join grades g on a.grade_id=g.id
where 
	a.is_publish=1 
    and a.teacher_id is null
    and a.id=7758
#having scores is not null
order by scores_count desc
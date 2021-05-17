#paket soal adalah assigments dengan kondisi teacher_id IS NULL dan is_publish=1
select a.id,u.name as user_name,a.user_id,g.description,a.code,a.name,
(
	select group_concat(ql.ref_id) 
    from assigment_question_lists aql inner join question_lists ql on aql.question_list_id=ql.id 
    where aql.assigment_id=a.id
)  as master_question_list_ids, 
(
	select group_concat(ass.total_score) from assigment_sessions ass 
    inner join assigments a2 on a2.id=ass.assigment_id
    where 
		a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
        and a2.ref_id=a.id
) as scores, (
	select count(ass.total_score) from assigment_sessions ass 
    inner join assigments a2 on a2.id=ass.assigment_id
    where 
		a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
        and a2.ref_id=a.id
) as scores_count,
(
	select group_concat(a2.id) from assigments a2 
	where a2.ref_id=a.id
) as slave_assigment_ids,
a.created_at
	from assigments a 
		inner join grades g on a.grade_id=g.id
        inner join users u on u.id=a.user_id
where 
	a.is_publish=1 
    and a.teacher_id is null #teacher_id NULL adalah master soal
#having scores is not null
order by scores_count desc
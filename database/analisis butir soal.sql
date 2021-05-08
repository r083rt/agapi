select aql.id,aql.question_list_id,aql.assigment_id,u.name as user_name,g.description as grade,ql.name as question_list_name,ql.created_at,(
	select group_concat(if(q.score is null,0,q.score)) from questions q 
		inner join question_lists ql2 on q.question_list_id=ql2.id 
        inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
        inner join assigments a2 on a2.id=aql2.assigment_id
	where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
) as scores,
(
	select count(1) from questions q 
		inner join question_lists ql2 on q.question_list_id=ql2.id 
        inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
        inner join assigments a2 on a2.id=aql2.assigment_id
	where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
) as scores_count
 from assigment_question_lists aql 
	inner join assigments a on a.id=aql.assigment_id 
    inner join question_lists ql on ql.id=aql.question_list_id
    inner join users u on u.id=a.user_id
    inner join grades g on g.id=a.grade_id
where 
	#exists(select 1 from assigment_types where id=assigment_type_id and (`description`='textarea' or `description`='textfield')) AND #hanya memilih soal yang uraian/teks
	a.user_id=aql.creator_id
    AND a.is_publish=0 
#having scores is not null
    
    
ORDER BY scores_count desc
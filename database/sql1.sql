select aql.*,ql.name,(
	select group_concat(q.score) from questions q where exists(
		select 1 from question_lists ql2 where ql2.id=q.question_list_id and ql2.ref_id=ql.id
    )
) as scores from assigment_question_lists aql 
	inner join assigments a on a.id=aql.assigment_id 
    inner join question_lists ql on ql.id=aql.question_list_id
where 
	exists(select 1 from assigment_types where id=assigment_type_id and (`description`='textarea' or `description`='textfield')) AND #hanya memilih soal yang uraian/teks
	a.user_id=aql.creator_id AND 
    a.is_publish=0 #is_publish = 0 yaitu butir soal
    
    
ORDER BY aql.id desc
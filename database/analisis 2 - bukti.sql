select a2.id,(
select group_concat(ql2.ref_id) as master_question_list_ids2 from assigment_question_lists aql2 inner join question_lists ql2 on ql2.id=aql2.question_list_id
        where aql2.assigment_id=a2.id
) as tets
 from assigments a2 
  where 
	exists (
		select group_concat(ql2.ref_id) as master_question_list_ids2 from assigment_question_lists aql2 inner join question_lists ql2 on ql2.id=aql2.question_list_id
        where aql2.assigment_id=a2.id
    )
	and a2.teacher_id is not null #soal yg dishare
	#and a2.user_id=1
    and a2.id=7777
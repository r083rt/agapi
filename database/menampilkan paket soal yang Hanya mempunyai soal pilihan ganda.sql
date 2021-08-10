select * from assigments a
where a.teacher_id is null #master paket soal
and a.is_publish=0
and not exists(
	select 1 from assigment_question_lists aql 
    inner join assigment_types ats on ats.id=aql.assigment_type_id 
    where ats.description!='selectoptions'
    and aql.assigment_id=a.id
)
order by id desc
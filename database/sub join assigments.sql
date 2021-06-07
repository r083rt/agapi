select a.id,a.name,a.semester,a.grade_id,X.scores_count from assigments a inner join (
	select a2.ref_id as assigment_id,count(1) as scores_count from assigment_sessions ass 
		inner join assigments a2 on a2.id=ass.assigment_id
		where 
			a2.is_publish=1 and a2.teacher_id is not null #assigment dengan teacher_id NOT NULL adalah slave soal dari master soal
			and a2.ref_id is not null
		group by a2.ref_id )  X  on X.assigment_id=a.id

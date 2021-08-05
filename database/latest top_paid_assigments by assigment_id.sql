select
a.id,a.is_paid,latest_scoring.max_id,tpa.created_at
from assigments a 
inner join (
	select assigment_id,max(id) as max_id from top_paid_assigments group by assigment_id
) latest_scoring on latest_scoring.assigment_id=a.id
inner join top_paid_assigments tpa on tpa.id=latest_scoring.max_id
where 
	a.is_paid>0
    and a.teacher_id is null
    

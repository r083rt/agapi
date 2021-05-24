SELECT ta.*, count(1) as scores_count FROM top_assigments ta 
inner join assigments a on ta.assigment_id=a.id
where 
	(a.is_paid=0 or a.is_paid is null) #hanya cari assigments yg belum diset berbayar
    group by ta.assigment_id
    
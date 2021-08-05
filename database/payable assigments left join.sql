/*menampilkan semua paket soal berdasarkan grade*/
select 
assigments.*,
purchased_assigments.payment_id,
purchased_assigments.status,
purchased_assigments.created_at as payment_created_at
 from assigments 
left join (
	select 
		purchased_items.purchased_item_id,
		purchased_items.purchased_item_type,
		purchased_items.payment_id,
		payments.status,
        payments.created_at
    from purchased_items 
    inner join payments on payments.id=purchased_items.payment_id
    where 
		purchased_item_type='App\\Models\\Assigment'
        and payments.status  in ('success','pending')
) purchased_assigments on purchased_assigments.purchased_item_id=assigments.id 
where 
	assigments.is_paid>0

	and assigments.grade_id=1
	
    
	

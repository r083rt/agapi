/*menampilkan semua pembelian paket soal yang pending*/
select 
assigments.*,
purchased_assigments.payment_id,
purchased_assigments.status,
purchased_assigments.created_at as payment_created_at
 from assigments 
inner join (
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
        and payments.status ='pending'
) purchased_assigments on purchased_assigments.purchased_item_id=assigments.id 
where 
	assigments.is_paid>0
    

	
    
	

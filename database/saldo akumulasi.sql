select
	u.id,u.name,u.email,
    (
		select sum(payments.value) from payments where payment_type='App\\Models\\User' and payment_id=u.id and type='IN'
    ) as total_in,
    (
		select sum(payments.value) from payments where payment_type='App\\Models\\User' and payment_id=u.id and type='OUT'
    ) as total_out,
    (select total_in-if(total_out is null,0,total_out)) as balance
 from users as u
where u.id=22811
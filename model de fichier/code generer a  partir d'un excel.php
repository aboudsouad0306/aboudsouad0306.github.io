<?php

/*le site : http://www.xls2mysql.com/*/
if($_POST['submit']=="") { 
?>
<form method="post">
<p>Database host: <input type="text" name="dbhost" value="localhost"/></p>
<p>Database name: <input type="text" name="dbname"/></p>
<p>Database username: <input type="text" name="dbusername"/></p>
<p>Database password: <input type="text" name="dbpassword"/></p>
<input type="submit" name="submit" value="Create"/>
</form>
<?php } else { 
$pdo = new PDO("mysql:host=".$_POST['dbhost'].";dbname=".$_POST['dbname'],$_POST['dbusername'],$_POST['dbpassword']);
$pdo->query("drop table pharmacie if exists; ");
$pdo->query("create table pharmacie ( `id` int(11) AUTO_INCREMENT PRIMARY KEY, `pharmacie`  varchar(255), `adresse`  varchar(255), `tel`  varchar(255), `fax`  varchar(255), `grant`  varchar(255), `email`  varchar(255)  );");
$statement = $pdo->prepare("insert into pharmacie (`pharmacie`,`adresse`,`tel`,`fax`,`grant`,`email`) values (?,?,?,?,?,?)");
$data = unserialize(gzuncompress(base64_decode("eJytl91u2zgQhV9l4KstUBQkRZGSe0VZdMRakgNJDja9U1FvY6BJALe5KBZ99x36V4rjrQQMEMDK2B4dneE3M26nnOvpv5sp+9hO1f7ix5Sz6cTkDgpjZpmbfNxMOUalxuidLVcWuK2gXN7ZIqlss2m365/vYf8Kf3H57j2Y79+2mzX4rwqfUEwnTCqQHLQEzXw8uBKXGMf7+8vwePnbK+gKjKaTwma2SB2YJLX5wqS26gqducZCYmeZrcxy5aBkcpRQCSKAKL4Q2olfESq6QgWfTpar3KZQLDNT4Gv6yeXo7VFrEE8nmXFgc0hMWo3SKEChbyeNBy1XZAU9//CuxjWAkpar1KAoU6Csk4HhdFJhmbH+1XI1B5Oh8rHSInRqmDTZcwyjiS3BNLYwpYXG1LVJXXPUFh603WToqylMnpsMz+KqsmnqyrGnUQmQA1WGPQPlTqVJsKILU7ni7B0mT1JwCWryJXX1SOO0Bj1QkupJEntJdW6wrumnk2FnGvLcwh16lzRQggBze+tfR+qLOAThMH36dWEX2TL9ZBtY2DoxgPZ1Dx0yzRXggUOtqYV6ubpZ2dVYJFCekMPkRRctxSzw9nXtvFcLM7PFycQAxWlIPMt3pkphXtnK1lAbfzZHd0Al3u6A+/gVufHrahd2sfBNOncL08VjV+1zvzFZjjz5mstgpJlxBPyyWXfi15p1b5wI1ISeFhXi0qAw5PZ+37aR3VP51Z5rrDwe4Ds3a5Zu4HAJThZGCqIQhlWf9ycKNurGZAbusROWZzv5oRPaunK73u2bN9jbfD7SSpwc8eU46cSvyezNE/+sjckTB7PMZC49C2XHll05C7PcoHnYfu7tMH7OFirl/wZaGLyedQiI8WgfT1+DCpJTiYNjiWuvs7mv6vl2/fS1HWgiA81BRhcmduLXhPZGjEckc/OedztmbOGqzj5RP798e1m/bAfKC/w4Fm+NY4EtuHhcAyZ8bH+10LTf11/gr5tt+/Rz/Q4u1PZHDX75s6mwrm+tOvHeUj8G/Zpz8H20ciGBhRfGduLXjL0cQaijdDDH+Z1dGIzNP8FHwfZa+s3MzUfWP1YQXvYjrD/7/9bJ9cXwXq4+O79foHM2784gAQfgF7hOIEJ4VKqRMhUbPIN49LrW6M2+ByEjJQ7B3lrrpb06pUX78HXzB20iOmhTEAhgsnj+wrQOgGmIQxCXSB0+dxS+07V++tU+bp5aKNZPP55ftsdH8af7y/HND4/7Nx+efz62m+8f/tnuH7M3vAT2elumrrAFmBs8C7u2n+Ka6c9Od5Pq/tBI24fH55enzcBWhpt66Gfq6dneeuPaDs9eb8sLWzo8CaVHbJE1SGNvWxYMzsPr1ri/xzY29tZ06MSvCe0NMRUcfU3Blk1lbytXW9yzGrcsTb53GRfSyiUrH/L/42fdDHtG2eA2c3t+KGzms10OnMWISNU+PL/86Zh1LMZJLIaOEdH/yST8nuhQM25Xc4d2ZqYqzMzZnuE7v29WrlnuIB60hB3uPUBRb7AdPsDPl+OSScpkIWUyRZlMUyaLKJPFhMkCRpmMUyYTlMkoCQgoCQgoCQgoCQgoCQgoCQgoCZCUBEhKAiQlAZKSAElJgKQkQFISICkJkJQESEoCQkoCQkoCQkoCQkoCQkoCQkoCQkoCQkoCQkoCQkoCFCUBipIARUmAoiRAURKgKAlQlAQoSgIUJQGKkgBNSYCmJEBTEqApCdCUBGhKAjQlAZqSAE1JgKYkIKIkIKIkIKIkIKIkIKIkIKIkIKIkIKIkIKIkIKIkIKYkIKYkIKYkIKYkIKYkIKYkIKYkIKYkIKYkIKYkgDNKBDijZIAzSgg4o6SAM0oMOKPkgDNKEDijJIEzShQ4I2WBk7LASVngpCxwUhY4KQuclAVOx8Lv/wBErfYE")));
foreach($data as $row) { $statement->execute($row); }
echo "Table created and ".count($data)." rows inserted.";
}

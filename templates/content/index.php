<div id="app-content-container">
    <h1>Moje wydatki</h1>
    <h2><a href="#">Dodaj nowy</a></h2>
    <table>
    <tr>
		<th>Data</th>
		<th>Kategoria</th>
		<th>Odbiorca</th>
		<th>Opis</th>
		<th>Kwota</th>
        <th>Operacje</th>
	</tr>
	<tr><form action="/index.php/apps/mattwithomebudget/expenses" method="post" autocomplete="off">
		<td><input type="date" name="date" placeholder="date" autofocus required></td>
		<td><input list="browsers" name="category" placeholder="category">
			<datalist id="browsers">
			<option value="Internet Explorer">
			<option value="Firefox">
			<option value="Chrome">
			<option value="Opera">
			<option value="Safari">
			</datalist> 
		</td>
		<td><input type="text" name="recipient" placeholder="recipient"></td>
		<td><input type="text" name="description" placeholder="description"></td>
		<td><input type="text" name="amount" placeholder="amount" required></td>
        <td><input type="submit" value="Dodaj"></td>
	</form></tr>
	<?php
	foreach ($_['expensesFromDb'] as $expense => $raw) {
		$rawContent = '<tr>';
		$rawContent .= '<td>'.$raw['date'].'</td>';
		$rawContent .= '<td>'.$raw['categoryId'].'</td>';
		$rawContent .= '<td>'.$raw['recipient'].'</td>';
		$rawContent .= '<td>'.$raw['description'].'</td>';
		$rawContent .= '<td>'.$raw['amount'].'</td>';
		$rawContent .= "<td><a href='/index.php/apps/mattwithomebudget/expenses/{$raw['id']}'><input type='submit' value='Edytuj'></a></td>";
		$rawContent .= '</tr>';
		print_unescaped($rawContent);
	}
	?>
	<tr>
		<td>2019-01-26</td>
		<td>Podstawowe</td>
		<td>JMP SA BIEDRONKA 2557 GDANSK PL</td>
		<td>Płatność kartą 24.01.2019 Nr karty 4246xx3744</td>
		<td>-99,75</td>
        <td><input type="submit" value="Edytuj"></td>
	</tr>
	<tr>
		<td>2019-01-26</td>
		<td>Samochód</td>
		<td>STACJA PALIW POD ZA GDYNIA PL</td>
		<td> Płatność kartą 24.01.2019 Nr karty 4246xx0585</td>
		<td>-69,90</td>
        <td><input type="submit" value="Edytuj"></td>
	</tr>
	<tr>
		<td>2019-01-24</td>
		<td>Ciuchy</td>
		<td> LPP RESERVED 1912040 GDANSK PL</td>
		<td> Płatność kartą 22.01.2019 Nr karty 4246xx3744</td>
		<td>-124,96
        <td><input type="submit" value="Edytuj"><input type="submit" value="Edytuj"></td>
</td>
	</tr>
    <tr>
		<th></th>
		<th></th>
		<th></th>
        <th>Suma:</th>
        <th>294,61</th>
		<th></th>
		
	</tr>
    </table>
</div>
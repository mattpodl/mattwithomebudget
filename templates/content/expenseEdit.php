<div id="app-content-container">
    <h1>Edycja wydatku</h1>
    <table>
    <tr>
		<th>Data</th>
		<th>Kategoria</th>
		<th>Odbiorca</th>
		<th>Opis</th>
		<th>Kwota</th>
        <th>Operacje</th>
	</tr>
	<tr><form action="/index.php/apps/mattwithomebudget/expenses/<?php p($_['expensesFromDb']['id']); ?>" method="post" autocomplete="off">
		<td><input type="date" name="date" autofocus required value="<?php p($_['expensesFromDb']['date']);?>"></td>
		<td><input list="browsers" name="category" value="<?php p($_['expensesFromDb']['categoryId']);?>">
			<datalist id="browsers">
			<option value="Internet Explorer">
			<option value="Firefox">
			<option value="Chrome">
			<option value="Opera">
			<option value="Safari">
			</datalist> 
		</td>
		<td><input type="text" name="recipient" value="<?php p($_['expensesFromDb']['recipient']);?>"></td>
		<td><input type="text" name="description" value="<?php p($_['expensesFromDb']['description']);?>"></td>
		<td><input type="text" name="amount" required value="<?php p($_['expensesFromDb']['amount']);?>"></td>
        <td><input type="hidden" name="action" value="update"><input type="submit" value="Zapisz"></td>
	</form></tr>
    </table>
</div>